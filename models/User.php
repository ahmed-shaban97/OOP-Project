<?php
namespace Model;
class User extends Database
{

    public function create($name, $email, $password, $role_id)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password, role_id) 
                VALUES (:name, :email, :password, :role_id)";
        $params = [
            ':name' => $name,
            ':email' => $email,
            ':password' => $hashedPassword,
            ':role_id' => $role_id
        ];
        return $this->execute($sql, $params);
    }

    public function getAll()
    {
        $sql = "SELECT users.*, roles.name AS role_name 
                FROM users 
                LEFT JOIN roles ON users.role_id = roles.id
                ORDER BY users.id DESC";
        return $this->fetchAll($sql);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        return $this->fetch($sql, [':id' => $id]);
    }

    public function update($id, $name, $email, $role_id)
    {
        $sql = "UPDATE users 
            SET name = :name, email = :email, role_id = :role_id
                WHERE id = :id";
        $params = [
            ':id' => $id,
            ':name' => $name,
            ':email' => $email,
            ':role_id' => $role_id
        ];
        return $this->execute($sql, $params);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        return $this->execute($sql, [':id' => $id]);
    }
    public function getByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        return $this->fetch($sql, [':email' => $email]);
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $user = $this->fetch($sql, [':email' => $email]);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
public function loginAdmin($email, $password)
{
    $sql = "SELECT * FROM users WHERE email = :email AND role_id = :role_id LIMIT 1";
    $user = $this->fetch($sql, [
        ':email' => $email,
        ':role_id' => 1
    ]);

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }

    return false;
}
public function countUsers()
{
    $sql = "SELECT COUNT(*) AS total FROM users WHERE role_id = 2";
    $result = $this->fetch($sql);
    return $result ? $result['total'] : 0;
}

public function getLatestUsers($limit = 5)
{
    $sql = "SELECT * FROM users 
            WHERE role_id = 2
            ORDER BY id DESC
            LIMIT :limit";
    return $this->fetchAll($sql, [':limit' => $limit]);
}


}