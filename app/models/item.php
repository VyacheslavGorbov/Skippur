<?php

    class item extends Model
    {
        var $name;

        public function get()
        {
            $SQL = 'SELECT * FROM item';
            $stmt = self::$_connection->prepare($SQL);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'item');
            return $stmt->fetchAll();
        }

        public function create()
        {
            $SQL = 'INSERT INTO item(name) VALUE(:name)';
            $stmt = self::$_connection->prepare($SQL);
            $stmt->execute(['name'=>$this->name]);
            return $stmt->rowCount();
        }
    }

?>