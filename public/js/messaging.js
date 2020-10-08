const defaultChat = "default";
let selectedChat = defaultChat;
const inboxChats = new Set();

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
      console.log(data);
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
  }
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

setInterval(getNewChats, 5000);


function getNewChats() {

  $.ajax({
    type: "GET",
    data: {},
    url: "http://localhost/PostOffice/ChatBoxController/loadChats",
    success: function (data) {
      displayNewChats(JSON.parse(data));
    },
  });
}

function displayNewChats(chats) {
  chats.pop();
  let received = chats.pop();
  let newChats = new Set();
  for (element of received) {
    if (!inboxChats.has(element["sender_name"])) {
      inboxChats.add(element["sender_name"]);
      newChats.add(element["sender_name"]);
    }
  }

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




}

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