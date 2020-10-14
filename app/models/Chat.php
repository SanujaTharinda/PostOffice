<?php 

require_once APPROOT .'/config/config.php';
class Chat{

    private $database;
    private $messagesTable;
    private $inboxChatsTable;
    private $chatsTable;

    public function __construct(){
        $this->database = new Database();
        $this->messagesTable = TB_MESSAGES;
        $this->inboxChatsTable = TB_INBOX_CHATS;
        $this->chatsTable = TB_CHATS;
    }


    public function getChats($username){
        
        $this->database->query("SELECT id,sender_name FROM $this->messagesTable WHERE reciever_name=:reciever_name");
        $this->database->bind(":reciever_name", $username);
        $this->database->execute();
        $result = $this->database->resultSet();
        return array($result, $this->getSentChats($username));
    }

    public function getSentChats($username){
        $this->database->query("SELECT id,reciever_name FROM $this->messagesTable WHERE sender_name=:sender_name");
        $this->database->bind(":sender_name", $username);
        $this->database->execute();
        $result = $this->database->resultSet();
        return $result;
    }

    public function getReceivedMessages($username, $reciever){
        $this->database->query("SELECT id,sender_name,message FROM $this->messagesTable WHERE ( (sender_name = :username AND reciever_name = :reciever ) OR (reciever_name = :username AND sender_name = :reciever ))");
        $this->database->bind(":username", $username);
        $this->database->bind(":reciever", $reciever);
        
        $this->database->execute();
        $result = $this->database->resultSet();

        return $result;


    }

    public function sendMessage($sender, $receiver, $content){
        $this->database->query("INSERT INTO $this->messagesTable (sender_name,reciever_name,message) VALUES (:sender_name,:reciever_name,:message)");
        $this->database->bind(":sender_name", $sender);
        $this->database->bind(":reciever_name", $receiver);
        $this->database->bind(":message", $content);
        $this->database->execute();



    }


    public function getInboxChatNames($username){
        $this->database->query("SELECT inbox_chats FROM $this->inboxChatsTable WHERE username = :username");
        $this->database->bind(":username", $username);
        $this->database->execute();
        $result = $this->database->resultSet();
        return $result;

    }

    public function logChatName($username, $chatName){
        $chats = $this->getInboxChatNames($username);
        if(count($chats) == 0){
            $this->database->query("INSERT INTO $this->inboxChatsTable (username,inbox_chats) VALUES (:username,:chatName)");
            $this->database->bind(":username", $username);
            $this->database->bind(":chatName", $chatName);
            $this->database->execute();
            return;
           
        }
        
        $chatNames =  array_shift($chats)->inbox_chats;
        
        if($chatNames == ""){
            $chatNames = $chatNames."$chatName";
        }else{
            $chatNames = $chatNames.",$chatName";
        }
    
        $this->database->query("UPDATE $this->inboxChatsTable SET inbox_chats='$chatNames' WHERE username = :username");
        $this->database->bind(":username", $username);
        $this->database->execute(); 

    }


    public function getLastChatId($receiver, $sender){
        $this->database->query("SELECT MAX(id) FROM $this->messagesTable WHERE (sender_name = :sender_name AND reciever_name = :reciever_name )");
        $this->database->bind(":sender_name", $sender);
        $this->database->bind(":reciever_name", $receiver);
        $this->database->execute(); 
        return $this->database->resultSet();
    }


    public function getLastRecordedChatId($receiver, $sender){
        $this->database->query("SELECT last_id FROM $this->chatsTable WHERE (sender_name = :sender_name AND receiver_name = :reciever_name )");
        $this->database->bind(":sender_name", $sender);
        $this->database->bind(":reciever_name", $receiver);
        $this->database->execute(); 
        return $this->database->resultSet();
    }

    public function recordChat($sender,$receiver){
        $lastRecordedChatId = $this->getLastChatId($receiver, $sender);
        $array = get_object_vars(array_shift($lastRecordedChatId));
        $id = intval(array_shift($array));
        
        $this->database->query("INSERT INTO $this->chatsTable (sender_name,receiver_name,last_id) VALUES (:sender_name,:receiver_name,:last_id)");
        $this->database->bind(":sender_name", $sender);
        $this->database->bind(":receiver_name", $receiver);
        $this->database->bind(":last_id", $id);
        $this->database->execute();

        $this->database->bind(":sender_name", $receiver);
        $this->database->bind(":receiver_name", $sender);
        $this->database->bind(":last_id", 0);
        $this->database->execute();
    }


    public function recordLastChatId($sender, $receiver){
        $lastId = $this->getLastChatId($receiver, $sender);
        $array = get_object_vars(array_shift($lastId));
        $id = intval(array_shift($array));
        //Change Here.......................
        $this->database->query("UPDATE $this->chatsTable SET last_id=$id WHERE (sender_name=:sender_name AND receiver_name=:receiver_name)");
        $this->database->bind(":sender_name", $sender);
        $this->database->bind(":receiver_name", $receiver);
        $this->database->execute(); 

    }
















}