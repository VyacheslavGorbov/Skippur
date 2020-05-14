<?php

class Referrals extends Model
{
    public $referral_code;
    public $customer_id;
    public $referral_uses;

    public function get()
    {
        $SQL = 'SELECT * FROM referrals';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'referrals');
        return $stmt->fetchAll();
    }

    public function insert()
    {
        $SQL = 'INSERT INTO referrals(referral_code, customer_id) VALUES(:referral_code, :customer_id)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['referral_code'=>$this->referral_code, 'customer_id'=>$this->customer_id]);
        return self::$_connection->lastInsertId();
    }

    public function getReferralByCode($code)
    {
        $SQL = 'SELECT * FROM referrals WHERE referral_code = :referral_code';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['referral_code'=>$code]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'referrals');
        return $stmt->fetch();
    }

    public function getReferralsById($id)
    {
        $SQL = 'SELECT * FROM referrals WHERE customer_id = :customer_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['customer_id'=>$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'referrals');
        return $stmt->fetch();
    }

    public function updateUses()
    {
        $SQL = 'UPDATE referrals SET referral_uses = :referral_uses WHERE referral_code = :referral_code';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['referral_uses'=>$this->referral_uses, 'referral_code'=>$this->referral_code]);
        return $stmt->rowCount();
    }

    public function delete()
    {
        $SQL = 'DELETE FROM referrals WHERE referral_code = :referral_code';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['referral_code'=>$this->referral_code]);
        return $stmt->rowCount();
    }
}

?>