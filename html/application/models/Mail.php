<?php

Class Mail extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  public function getInboxMessages($user_id, $limit, $offset){
    $user_result = $this->db->query("SELECT Mailbox.id as mailbox_id, Message.content as content, User.username as `from`, Message.date_time FROM `Mailbox` JOIN `Message` ON Mailbox.message_id = Message.id JOIN `User` ON Message.from=User.id where Mailbox.mailbox=1 and Mailbox.user_id=? ORDER BY Mailbox.id DESC LIMIT ?,?", array($user_id, $offset, $limit));
    return array("inbox"=> $user_result->result());
  }
   public function getOutboxMessages($user_id, $limit, $offset){
    $user_result = $this->db->query("SELECT Mailbox.id as mailbox_id, Message.content as content, User.username as `to`, Message.date_time FROM `Mailbox` JOIN `Message` ON Mailbox.message_id = Message.id JOIN `User` ON Message.to=User.id where Mailbox.mailbox=0 and Mailbox.user_id=? ORDER BY Mailbox.id DESC LIMIT ?,?", array($user_id, $offset, $limit));
    return array("outbox"=> $user_result->result());
  }
   public function sendMessage($message, $to, $from){
        $this->db->insert('Message', array("content"=>$message, "to"=>$to, "from"=>$from));
        $message_id = $this->db->insert_id(); 
        $this->db->insert('Mailbox', array("user_id"=>$to, "mailbox"=>1, "message_id"=>$message_id));
        $this->db->insert('Mailbox', array("user_id"=>$from, "mailbox"=>0, "message_id"=>$message_id));
   }
   public function deleteMessage($user_id, $mailbox_id){
        $this->db->delete('Mailbox', array("user_id"=>$user_id, "id"=>$mailbox_id));
   }
   public function getIdFromUsername($username){
        $query = $this->db->query("SELECT id from User where username=?", array("username"=>$username));
        if ($query->row() !=null)
           return $query->row()->id;
        return null;
   }
}


?>
