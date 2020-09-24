<?php 

require_once APPROOT .'/config/config.php';
class Chat{

    private $database;
    private $messagesTable;

    public function __construct(){
        $this->database = new Database();
        $this->messagesTable = TB_MESSAGES;
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
        $this->database->query("SELECT id,sender_name,message FROM messages WHERE ( (sender_name = :username AND reciever_name = :reciever ) OR (reciever_name = :username AND sender_name = :reciever ))");
        $this->database->bind(":username", $username);
        $this->database->bind(":reciever", $reciever);
        
        $this->database->execute();
        $result = $this->database->resultSet();

        return $result;


    }

    public function sendMessage($sender, $receiver, $content){
        $this->database->query("INSERT INTO messages (sender_name,reciever_name,message) VALUES (:sender_name,:reciever_name,:message)");
        $this->database->bind(":sender_name", $sender);
        $this->database->bind(":reciever_name", $receiver);
        $this->database->bind(":message", $content);
        $this->database->execute();



    }

















}