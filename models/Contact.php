<?php
namespace Model;

require_once __DIR__ . '/../vendor/autoload.php';

class Contact extends Database
{
    public function getAll()
    {
        $sql = "SELECT contact.*, users.name AS user_name
                FROM contact
                LEFT JOIN users ON contact.user_id = users.id
                ORDER BY contact.id DESC";
        return $this->fetchAll($sql);
    }

    public function create($user_id, $name, $email, $message)
    {
        $sql = "INSERT INTO contact (user_id, name, email, message) 
                VALUES (:user_id, :name, :email, :message)";
        return $this->execute($sql, [
            ':user_id' => $user_id,
            ':name' => $name,
            ':email' => $email,
            ':message' => $message
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM contact WHERE id = :id";
        return $this->execute($sql, [':id' => $id]);
    }
}