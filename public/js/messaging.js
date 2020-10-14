const defaultChat = "default";
let selectedChat = defaultChat;
const inboxChats = new Set();
const sentChats = new Set();
const messagesCount = new Map();
let numberOfNewChats = 0;
let numberOfNewMessagesChats = 0; 


/* CHAT BOX OPEN AND CLOSE */
$("#message-button").on("click", function () {
  if ($(".chat-box").hasClass("chat-box-shown")) {
    $(".chat-box").removeClass("chat-box-shown");
    setTimeout(function () {
      $(".chat-container").css("z-index", -1);
    }, 300);
    unselectChat("chat-" + selectedChat);
    clearChatMessages();
    hideReplyTextArea();
    selectedChat = defaultChat;
  } else {
    $(".chat-box").addClass("chat-box-shown");
    $(".chat-container").css("z-index", 1);
    numberOfNewChats = 0;
    let button = document.getElementById("message-button");
    button.style.color = "red";
  }
});

function hideReplyTextArea() {
  document.getElementById("reply-box").style.display = "none";
}

function showReplyTextArea() {
  document.getElementById("reply-box").style.display = "inline-block";
}

/* NEW CHAT */

$("#new-message-icon").on("click", function () {
  $("#new-message-box").css("display", "inline-block");
});

$("#cancel-button").on("click", function () {
  $("#new-message-box").css("display", "none");
  clearNewChatBox();
});

function clearNewChatBox() {
  document.getElementById("message-status").innerHTML = "";
  document.getElementById("to-input").value = "";
  document.getElementById("message-body-text-area").value = "";
}

function listUsers(username) {
  $.ajax({
    type: "POST",
    data: {
      name: username,
    },
    url: "http://localhost/PostOffice/ChatBoxController/getUsers",
    success: function (data) {
      updateListUsers(JSON.parse(data));
    },
  });
}

function updateListUsers(data) {
  let usersExist = false;
  if (data.length > 0) {
    usersExist = true;
  }

  triggerSendButton(usersExist);
  let list = document.getElementById("browse-users");
  list.innerHTML = "";
  for (user of data) {
    let option = document.createElement("option");
    option.value = user["email"];
    list.appendChild(option);
  }
}

function triggerSendButton(exists) {
  if (exists) {
    $(".send-button").attr("disabled", false);
    $(".send-button").addClass("send-button-enabled");
  }
  if ($.trim($("#to-input").val()) == "") {
    $(".send-button").attr("disabled", true);
    $(".send-button").removeClass("send-button-enabled");
  }
}

function sendMessageToNewChat() {
  let message = document.getElementById("message-body-text-area").value;
  let to = document.getElementById("to-input").value;
  $.ajax({
    type: "POST",
    async:false,
    data: {
      receiver: to,
      content: message,
    },
    url: "http://localhost/PostOffice/ChatBoxController/sendReply",
    success: function (data) {
      updateMessageStatus(data);
      getChats();
      clearChatMessages();
      
    },
  });
  recordChat(to);
  sentChats.add(to);
  inboxChats.add(to);
  
}

function recordChat(name){
  $.ajax({
    type: "POST",
    data: {
      receiver: name
    },
    url: "http://localhost/PostOffice/ChatBoxController/recordChat",
    success: function (data) {
    },
  });
}

function clearChatMessages() {
  document.getElementById("chat-messages").innerHTML = "";
}

function updateMessageStatus(message) {
  document.getElementById("message-status").innerHTML = message;
}

//Send Reply on Reply Icon Click...
$("#reply-send").on("click", function () {
  sendReply($("#reply-area").val());
});

//Send Reply on Enter Press...

$("#reply-area").keypress(function (e) {
  if (e.which == 13) {
    sendReply($("#reply-area").val());
  }
});

/* CHATS */

//Display chats...
$(document).ready(getChats);

function getChats() {
  $.ajax({
    type: "GET",
    data: {},
    url: "http://localhost/PostOffice/ChatBoxController/loadChats",
    success: function (data) {
      displayChats(JSON.parse(data));
    },
  });
}

function displayChats(data) {
  let sent = data.pop();
  let received = data.pop();
  for (send of sent) {
    data.push(send);
  }

  for (receive of received) {
    data.push(receive);
  }

  data.sort(function (first, second) {
    if (first.id > second.id) return -1;
    if (first.id < second.id) return 1;
    return 0;
  });
  let interactors = new Set();
  let chats = document.getElementById("messages-tab");
  chats.innerHTML = "";
  for (interact of data) {
    if ("sender_name" in interact) {
      var interactName = interact["sender_name"];
      inboxChats.add(interactName);
    } else {
      var interactName = interact["reciever_name"];
    }

    if (interactors.has(interactName)) {
      continue;
    }
    interactors.add(interactName);
    let id = "chat-" + interactName;

    let chat = document.createElement("div");
    chat.innerHTML = "<p>" + interactName + "</p>";
    chat.classList.add("chat");
    chat.setAttribute("id", id);
    chat.addEventListener("click", function () {
      chatClick(id);
    });
    chats.appendChild(chat);
  }

  findUnrecordedChats();
}


function findUnrecordedChats(){

  var myArray = [...inboxChats];
  if(myArray.length > 0){
    $.ajax({
      type: "POST",
      data: {
        inbox: myArray
      },
    
      url: "http://localhost/PostOffice/ChatBoxController/getInboxChats",
      success: function (data) {
        if(!(data == null && data == undefined)){
          displayNewUnrecordedChats(JSON.parse(data));
        }
        
      },
    });
  
  }
 

}


function displayNewUnrecordedChats(chats){
  for (name of chats) {
    let id = "chat-" + name;
    let chat = document.getElementById(id);
    chat.classList.add("chat-new");
    chat.remove();
    let chats = document.getElementById("messages-tab");
    chats.prepend(chat);
  }
  notifyNewChats(chats.length)

}

function notifyNewChats(numberOfChats){
  numberOfNewChats = numberOfNewChats + numberOfChats;
}


function unselectChat(chat) {
  if (selectedChat != "default") {
    document.getElementById(chat).classList.remove("chat-active");
  }
}

function selectChat(chat) {
  document.getElementById(chat).classList.add("chat-active");
}

function markChatAsRead(chatId) {
  let chat = document.getElementById(chatId);
  if (chat.classList.contains("chat-new")) {
    chat.classList.remove("chat-new");
    numberOfNewChats = numberOfNewChats - 1;
    recordNewInboxChat(chatId);
    recordMessagesAsRead(chatId.replace("chat-", ""));
  }

  if(chat.classList.contains("chat-new-messages")){
    chat.classList.remove("chat-new-messages");
    recordMessagesAsRead(chatId.replace("chat-", ""));
  }
}

function recordMessagesAsRead(chatName){

  $.ajax({
    type: "POST",
    data: {
      sender: chatName
    },
    url: "http://localhost/PostOffice/ChatBoxController/recordMessagesAsRead",
    success: function (data) {
    },
  });




}




function recordNewInboxChat(chatId){
  let name = chatId.replace("chat-", "");
  $.ajax({
    type: "POST",
    data: {
      chatName: name
    },
    url: "http://localhost/PostOffice/ChatBoxController/recordChatName",
    success: function (data) {
    },
  });


}

function chatClick(chatId) {
  markChatAsRead(chatId);
  showReplyTextArea();
  if (selectedChat != defaultChat) {
    unselectChat("chat-" + selectedChat);
  }
  selectChat(chatId);
  chatId = chatId.replace("chat-", "");
  selectedChat = chatId;
  getMessagesFromSelectedChat(chatId);
}

function getMessagesFromSelectedChat(chatId) {
  $.ajax({
    type: "POST",
    data: {
      receiver: chatId,
    },
    url: "http://localhost/PostOffice/ChatBoxController/getChatMessages",
    success: function (data) {
      displayChatMessages(JSON.parse(data), chatId);
    },
  });
}

function displayChatMessages(data, chatId) {
  let messages = document.getElementById("chat-messages");
  messages.innerHTML = "";

  for (message of data) {
    let content = message["message"];
    let senderName = message["sender_name"];

    let body = document.createElement("p");
    body.innerHTML = content;
    if (senderName == chatId) {
      body.classList.add("received-message");
    } else {
      body.classList.add("sent-message");
    }

    messages.appendChild(body);
  }

  updateMessagesScroll();
}

function updateMessagesScroll() {
  var element = document.getElementById("chat-messages");
  element.scrollTop = element.scrollHeight;
}

//Update New Chats...

$(document).ready(setInterval(function(){
  getNewChats();
  getNewMessagesCount();
}, 5000));

function getNewMessagesCount(){
  let newMessages = 0;
  for(name of inboxChats){
    let lastId = getLastChatId(name);
    let lastRecordedId = getLastRecordedChatId(name);
    if(lastId > lastRecordedId){
      newMessages = newMessages + 1;
      let chat = document.getElementById("chat-" + name);
      chat.classList.add("chat-new-messages");
    }
  }
  notifyNewMessages(newMessages);
}

function notifyNewMessages(messages){
   numberOfNewMessagesChats = messages;
}

function getLastRecordedChatId(name){
  window.lastRecordedId = 0;
  $.ajax({
    type: "POST",
    async:false,
    data: {
      sender: name
    },
    url: "http://localhost/PostOffice/ChatBoxController/getLastRecordedChatId",
    success: function (data) {
      if(data != "[]"){
        window.lastRecordedId = Object.values(JSON.parse(data).pop()).pop();
      }
    },
  });

  return window.lastRecordedId;
  


}


function getLastChatId(name){
  

  $.ajax({
    type: "POST",
    async:false,
    data: {
      sender: name
    },
    url: "http://localhost/PostOffice/ChatBoxController/getLastChatId",
    success: function (data) {
      window.lastId = Object.values(JSON.parse(data).pop()).pop();
      
    },
  });

  return window.lastId;

}


function getNewChats() {

  $.ajax({
    type: "GET",
    async:false,
    data: {},
    url: "http://localhost/PostOffice/ChatBoxController/loadChats",
    success: function (data) {
      if(data != "[]"){
        displayNewChats(JSON.parse(data));
      }
      
    },
  });
}

function displayNewChats(chats) {
  chats.pop();
  let received = chats.pop();
  let newChats = new Set();
  for (element of received) {
    if (!inboxChats.has(element["sender_name"]) && !sentChats.has(element["sender_name"])) {
      console.log("Adding new Chat from " + element);
      inboxChats.add(element["sender_name"]);
      newChats.add(element["sender_name"]);
    }
  }

  prependNewChats(newChats);

}

function prependNewChats(newChats){
  for (name of newChats) {
    let id = "chat-" + name;
    let chat = document.createElement("div");
    chat.innerHTML = "<p>" + name + "</p>";
    chat.classList.add("chat", "chat-new");
    chat.setAttribute("id", id);
    chat.addEventListener("click", function () {
      chatClick(id);
    });
    let chats = document.getElementById("messages-tab");
    chats.prepend(chat);
  }

  notifyNewChats(newChats.size);
}

//Update Currenctly Selected Chat

$(document).ready(setInterval(function(){
  if(selectedChat != defaultChat){
    getMessagesFromSelectedChat(selectedChat);
  }
  
}, 100));

//Chat Reply...

function checkReplyContent(text) {
  let withoutSpace = text.trim();
  if (withoutSpace.length > 0) {
    appearSendIcon();
  } else {
    disappearSendIcon();
  }
}

function sendReply(message) {
  $.ajax({
    type: "POST",
    data: {
      content: message,
      receiver: selectedChat,
    },
    url: "http://localhost/PostOffice/ChatBoxController/sendReply",
    success: function (data) {
      displaySentMessage(message);
      clearReplyBox();
      disappearSendIcon();
    },
  });
}

function displaySentMessage(message) {
  let messages = document.getElementById("chat-messages");
  let body = document.createElement("p");
  body.innerHTML = message;
  body.classList.add("sent-message");
  messages.appendChild(body);
  updateMessagesScroll();
}

function clearReplyBox() {
  document.getElementById("reply-area").value = "";
}

function appearSendIcon() {
  document.getElementById("reply-send").style.display = "inline";
}

function disappearSendIcon() {
  document.getElementById("reply-send").style.display = "none";
}


//Notify New Messages or Chats

setInterval(function(){
  if(numberOfNewChats > 0 || numberOfNewMessagesChats > 0){
    console.log("New Messages Here look...");
    let button = document.getElementById("message-button");
    button.style.color = "blue";
  }
}, 6000);