<?php

class Reviews extends Model
{
    public $review_id;
    public $site_id;
    public $customer_id;
    public $review_rating;
    public $review_message;

    public function get()
    {
        $SQL = 'SELECT * FROM reviews';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'reviews');
        return $stmt->fetchAll();
    }

    public function insert()
    {
        $SQL = 'INSERT INTO reviews(site_id, customer_id, review_rating, review_message) VALUES(:site_id, :customer_id, :review_rating, :review_message)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['site_id'=>$this->site_id, 'customer_id'=>$this->customer_id, 'review_rating' => $this->review_rating, 'review_message' => $this->review_message]);
        return self::$_connection->lastInsertId();
    }

    public function getReviewsBySiteId($id)
    {
        $SQL = 'SELECT * FROM reviews WHERE site_id = :site_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['site_id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'reviews');
        return $stmt->fetchAll();
    }
}
