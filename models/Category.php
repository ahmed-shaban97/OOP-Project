<?php
// namespace models;

// use Config\Database;
require_once __DIR__ . "/../config/Database.php";

class Category extends Database
{
    public function getAll(){
        $sql="SELECT * FROM categories";
        return $this->fetchAll($sql);
    }

    

    public function getById($id) {
        $sql = "SELECT * FROM categories WHERE id = :id";
        return $this->fetch($sql, ['id' => $id]);
    }

    public function create($data){
        $sql="INSERT INTO categories (name) VALUES ( :name) ";
        $this->execute($sql,['name'=> $data['name']]);
        return $this->lastInsertId();
        
    }

    public function update($id,$data){
        $sql="UPDATE categories SET name = :name  WHERE id = :id";
        $param=[
            ':id'=>$id,
            ':name'=>$data['name']
        ];
        
        return $this->execute($sql,$param);
    }

    public function delete($id){
        $sql="DELETE FROM categories WHERE id =:id";
        return $this->execute($sql,[':id'=>$id]);
    }
}