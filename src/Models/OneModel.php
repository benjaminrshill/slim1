<?php

namespace App\Models;

session_start();

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

    public function sortOnes($done): array
    {
        $completed = $done;
        $query = $this->db->prepare('SELECT * FROM `one` WHERE `completed` = :completed ORDER BY `due`');
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
    }

    public function uncheckOne($updateData)
    {
        foreach ($updateData as $key => $id) {
            $query = $this->db->prepare('UPDATE one SET completed = 0 WHERE id = :id;');
            $query->bindParam(':id', $key);
            $query->execute();
        }
    }

    public function addOne($addData)
    {
        $item = $addData['name'];
        $due = $addData['due'];
        $completed = 0;
        $query = $this->db->prepare('INSERT INTO one (name, completed, due) VALUE (:name, :off, :due);');
        $query->bindParam(':name', $item);
        $query->bindParam(':off', $completed);
        $query->bindParam(':due', $due);
        $query->execute();
    }

    public function deleteOne($delData)
    {
        foreach ($delData as $key => $id) {
            $query = $this->db->prepare('DELETE FROM one WHERE id = :id;');
            $query->bindParam(':id', $key);
            $query->execute();
        }
    }
}