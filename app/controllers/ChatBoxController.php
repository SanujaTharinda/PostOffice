<?php


require_once APPROOT .'/models/Chat.php'; 

class ChatBoxController extends Controller{
    private $chatModel;

    public function __construct(){
        $this->chatModel = new Chat();
    }

    public function loadChats(){
        session_start();
        $username = $_SESSION['username'];
        echo json_encode($this->chatModel->getChats($username));

    }

    public function getChatMessages(){
        session_start();
        $username = $_SESSION['username'];
        $receiver = $_POST['receiver'];
        $data = $this->chatModel->getReceivedMessages($username, $receiver);
        echo json_encode($data);
    }

    public function sendReply(){
        session_start();
        $sender = $_SESSION['username'];
        $content = $_POST['content'];
        $receiver = $_POST['receiver'];
        $this->chatModel->sendMessage($sender,$receiver, $content);
    }










}