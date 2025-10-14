<?php
namespace Model;

use Model\Database;


class Role extends Database
{
    public function getAll(){
        $sql="SELECT * FROM roles";
        return $this->fetchAll($sql);
    }

    
    public function getById($id) {
        $sql = "SELECT * FROM roles WHERE id = :id";
        return $this->fetch($sql, ['id' => $id]);
    }
    public function create($data){
        $sql="INSERT INTO roles (name) VALUES (:name) ";
        $this->execute($sql,['name'=> $data['name']]);
        return $this->lastInsertId();
        
    }
    public function update($id,$data){
        $sql="UPDATE roles SET name = :name WHERE id =:id ";
        $param=[
            ':id'=>$id,
            ':name'=>$data['name']
        ];
        
        return $this->execute($sql,$param);
    }

    public function delete($id){
        $sql="DELETE FROM roles WHERE id =:id";
        return $this->execute($sql,[':id'=>$id]);
    }
}