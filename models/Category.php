<?php
// namespace models;

// use Config\Database;
namespace Model;


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

    
    public function getProductsByCategory($category_id)
{
    $sql = "
        SELECT p.*, c.name AS category_name, b.name AS brand_name
        FROM products p
        JOIN categories c ON p.category_id = c.id
        JOIN brands b ON p.brand_id = b.id
        WHERE p.category_id = :category_id
    ";
    return $this->fetchAll($sql, ['category_id' => $category_id]);
}

}