<?php

class Messages extends Model
{
    public $message_id;
    public $sender_id;
    public $receiver_id;
    public $message;
    public $time_sent;

    public function get()
    {
        $SQL = 'SELECT * FROM messages';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'messages');
        return $stmt->fetchAll();
    }

    public function insert()
    {
        $SQL = 'INSERT INTO messages(sender_id, receiver_id, message, time_sent) VALUES(:sender_id, :receiver_id, :message, :time_sent)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['sender_id'=>$this->sender_id, 'receiver_id'=>$this->receiver_id, 'message'=>$this->message, 'time_sent'=>$this->time_sent]);
        return self::$_connection->lastInsertId();
    }

    public function getUsersMessages($id)
    {
        $SQL = 'SELECT DISTINCT receiver_id FROM messages WHERE sender_id = :sender_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['sender_id'=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'messages');
        return $stmt->fetchAll();
    }

    public function getUserMessagesWithSite($customer_id, $manager_id)
    {
        $SQL = 'SELECT * FROM messages WHERE sender_id = :sender_id AND receiver_id = :receiver_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['sender_id'=>$customer_id, 'receiver_id'=>$manager_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'messages');
        return $stmt->fetchAll();
    }
}

?>