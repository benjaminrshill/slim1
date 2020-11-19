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
            $query = $this->db->prepare('UPDATE one SET completed = 1 WHERE id = :id;');
            $query->bindParam(':id', $key);
            $query->execute();
        }
        return $message = 'Successfully checked!';
    }

    public function addOne($addData)
    {
        $item = $addData['name'];
        $completed = 0;
        $query = $this->db->prepare('INSERT INTO one (name, completed) VALUE (:name, :off);');
        $query->bindParam(':name', $item);
        $query->bindParam(':off', $completed);
        $query->execute();
        return $message = 'Successfully added!';
    }
}