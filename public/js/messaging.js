//Open and close message box
$("#message-button").on("click", function () {
  if ($(".chat-box").hasClass("chat-box-shown")) {
    $(".chat-box").removeClass("chat-box-shown");
  } else {
    $(".chat-box").addClass("chat-box-shown");
  }
});

//Reply Icon
$("#reply-send").on("click", function () {
  sendReply($("#reply-area").val());
});

//Display Chats...
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

function chatClick(chatId) {
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

  $("#reply-box").on('keypress', function (e) {
    if (e.which == 13) {
      alert('You pressed enter!');
    }
  });
}

function displayChatMessages(data, chatId) {
  // data.sort(function (first, second) {
  //   if (first.id > second.id) return -1;
  //   if (first.id < second.id) return 1;
  //   return 0;
  // });

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
}

function checkReplyContent(text) {
  let withoutSpace = text.trim();
  if (withoutSpace.length > 0) {
    document.getElementById("reply-send").style.display = "inline";
  } else {
    document.getElementById("reply-send").style.display = "none";
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
    },
  });
  document.getElementById("reply-send").style.display = "none";
}

function displaySentMessage(message) {
  let messages = document.getElementById("chat-messages");
  let body = document.createElement("p");
  body.innerHTML = message;
  body.classList.add("sent-message");
  messages.appendChild(body);
}

function clearReplyBox() {

  document.getElementById("reply-area").value = "";

}