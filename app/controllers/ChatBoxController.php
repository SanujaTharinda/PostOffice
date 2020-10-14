<?php


require_once APPROOT .'/models/Chat.php'; 
require_once APPROOT .'/models/User.php'; 

class ChatBoxController extends Controller{
    private $chatModel;
    private $userModel;

    public function __construct(){
        $this->chatModel = new Chat();
        $this->userModel = new User();
    }

    public function loadChats(){
        session_start();
        $username = $_SESSION['username'];
        echo json_encode($this->chatModel->getChats($username));

    }

    public function getInboxChats(){
       
        session_start();
        $username = $_SESSION['username'];
        $chatsArray = $_POST['inbox'];
        $newChats = array();
        
        $recordedChats = $this->chatModel->getInboxChatNames($username);
      
        if(count($recordedChats) > 0){
            $recordedChatsArray = explode(",",array_shift($recordedChats)->inbox_chats);
            foreach($chatsArray as $name){
                if(!in_array($name, $recordedChatsArray)){
                    array_push($newChats, $name);
                }
            }
        }else{
            $newChats = $chatsArray;
        }
        
        echo json_encode($newChats);

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
        if($sender == $receiver){
            echo "Please Enter A Valid Username";
          
        }else{
            $this->chatModel->sendMessage($sender,$receiver, $content);
            echo "Message Sent Successfully...";
        }
    }   
       

    public function getUsers(){
        $username = $_POST['name'];
        $list = $this->userModel->getUsersList($username);
        echo json_encode($list);
       


    }

    public function checkUserExist(){
        $username = $_POST['name'];
        if(!isset($username)){
            echo false;
            return;
        }
        $exists = $this->userModel->userExists($username);
        echo $exists;
    }


    public function recordChatName(){
        session_start();
        $username = $_SESSION['username'];
        $chatName = $_POST['chatName'];
        echo json_encode($this->chatModel->logChatName($username, $chatName));

    }

    public function getLastChatId(){
        session_start();
        $receiver = $_SESSION['username'];
        $sender = $_POST['sender'];

        echo json_encode($this->chatModel->getLastChatId($receiver, $sender));

    }

    public function getLastRecordedChatId(){
        session_start();
        $receiver = $_SESSION['username'];
        $sender = $_POST['sender'];
        echo json_encode($this->chatModel->getLastRecordedChatId($receiver, $sender));



    }

    public function recordChat(){
        session_start();
        $sender = $_SESSION['username'];
        $receiver = $_POST['receiver'];
        echo json_encode($this->chatModel->recordChat($sender,$receiver));
        


    }

    public function recordMessagesAsRead(){
        session_start();
        $receiver = $_SESSION['username'];
        $sender = $_POST['sender'];
        echo json_encode($this->chatModel->recordLastChatId($sender, $receiver));
      


    }










}