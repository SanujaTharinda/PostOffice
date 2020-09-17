//Open and close message box
$("#message-button").on("click", function () {
    if ($(".chat-box").hasClass("chat-box-shown")) {
        $(".chat-box").removeClass("chat-box-shown");
    } else {
        $(".chat-box").addClass("chat-box-shown");
    }
});