<?php
require_once __DIR__ . "/../config/Database.php";
// namespace models;

// use Config\Database;

class User extends Database
{
    public function getAll()
    {
        $sql = "SELECT users.*, roles.name 
                FROM users
                JOIN roles ON users.role_id = roles.id";
        return $this->fetchAll($sql);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        return $this->fetch($sql, ['id' => $id]);
    }

    public function getByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        return $this->fetch($sql, ['email' => $email]);
    }

    public function register($data)
    {
            $hashedPassword=password_hash($data['password'],PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (name, email, password, phone, role_id) 
                VALUES (:name, :email, :password, :phone, :role_id)";

        $params = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $hashedPassword,
            'phone' => $data['phone'],
            'role_id' => $data['role_id']
        ];

        $this->execute($sql, $params);
        return $this->lastInsertId();
    }

    public function login($password ,$email){
        $user=$this->getByEmail($email);
        if($user && password_verify($password,$user['password'])){
                return true;
        }
        return false;
    }

    public function update($id, $data)
    {
        $sql = "UPDATE users 
                SET 
                    name = :name,
                    email = :email,
                    password = :password,
                    phone = :phone,
                    role_id = :role_id
                WHERE id = :id";

        $params = [
            'id' => $id,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'phone' => $data['phone'],
            'role_id' => $data['role_id']
        ];

        return $this->execute($sql, $params);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        return $this->execute($sql, ['id' => $id]);
    }


}