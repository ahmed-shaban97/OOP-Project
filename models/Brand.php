<?php
// namespace models;

// use Config\Database;
namespace Model;

class Brand extends Database
{
    public function getAll(){
        $sql="SELECT * FROM brands";
        return $this->fetchAll($sql);
    }

    
    public function getById($id) {
        $sql = "SELECT * FROM brands WHERE id = :id";
        return $this->fetch($sql, ['id' => $id]);
    }
    public function create($data){
        $sql="INSERT INTO brands (name) VALUES (:name) ";
        $this->execute($sql,['name'=> $data['name']]);
        return $this->lastInsertId();
        
    }
    public function update($id,$data){
        $sql="UPDATE brands SET name = :name WHERE id =:id ";
        $param=[
            ':id'=>$id,
            ':name'=>$data['name']
        ];
        
        return $this->execute($sql,$param);
    }

    public function delete($id){
        $sql="DELETE FROM brands WHERE id =:id";
        return $this->execute($sql,[':id'=>$id]);
    }
}