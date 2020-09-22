//Open and close message box
$("#message-button").on("click", function () {
  if ($(".chat-box").hasClass("chat-box-shown")) {
    $(".chat-box").removeClass("chat-box-shown");
    setTimeout(function () {
      $('.chat-container').css("z-index", -1);
    }, 300);

  } else {
    $(".chat-box").addClass("chat-box-shown");
    $('.chat-container').css("z-index", 1);



  }
});

//Reply Icon
$("#reply-send").on("click", function () {
  sendReply($("#reply-area").val());
});

//Send Reply on Enter Press..

$("#reply-area").keypress(function (e) {
  if (e.which == 13) {
    sendReply($("#reply-area").val());
  }
});

//Display Chats...
$(document).ready(getChats);

function getChats() {
  document.getElementById("reply-box").setAttribute("display", "inline-block");
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
  data.sort(function (first, second) {
    if (first.id > second.id) return -1;
    if (first.id < second.id) return 1;
    return 0;
  });
  let senders = new Set();
  let chats = document.getElementById("messages-tab");
  chats.innerHTML = "";
  for (sender of data) {
    let senderName = sender["sender_name"];
    if (senders.has(senderName)) {
      continue;
    }
    senders.add(senderName);
    let id = "chat-" + senderName;

    let chat = document.createElement("div");
    chat.innerHTML = "<p>" + sender["sender_name"] + "</p>";
    chat.classList.add("chat");
    chat.setAttribute("id", id);
    chat.addEventListener("click", function () {
      chatClick(id);
    });
    chats.appendChild(chat);
  }
}

let selectedChat = "default";

function unselectChat(chat) {
  if (selectedChat != "default") {
    console.log("Unselecting...");
    document.getElementById(chat).classList.remove("chat-active");
  }
}

function selectChat(chat) {
  console.log("Selecting...");
  document.getElementById(chat).classList.add("chat-active");
}


function chatClick(chatId) {
  document.getElementById("reply-box").style.display = "inline-block";
  unselectChat("chat-" + selectedChat);
  selectChat(chatId);
  chatId = chatId.replace("chat-", "");
  selectedChat = chatId;

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

function checkReplyContent(text) {
  let withoutSpace = text.trim();
  if (withoutSpace.length > 0) {
    appearSendIcon();
  } else {
    disappearSendIcon();
  }
}

//Send Reply

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