<?php


namespace App\Models;


class OneModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getOnes($done): array
    {
        $completed = $done;
        $query = $this->db->prepare('SELECT * FROM `one` WHERE `completed` = :completed');
        $query->bindParam(':completed', $completed);
        $query->execute();
        return $query->fetchAll();
    }

    public function checkOne($updateData)
    {
        foreach ($updateData as $key => $id) {
            $completed = $key['1'] ? 0 : 1;
            $query = $this->db->prepare('UPDATE one SET completed = :completed WHERE id = :id;');
            $query->bindParam(':id', $key);
            $query->bindParam(':completed', $completed);
            $query->execute();
        }
    }

    public function addOne($addData)
    {
        $item = $addData['name'];
        $completed = 0;
        $query = $this->db->prepare('INSERT INTO one (name, completed) VALUE (:name, :off);');
        $query->bindParam(':name', $item);
        $query->bindParam(':off', $completed);
        $query->execute();
    }
}