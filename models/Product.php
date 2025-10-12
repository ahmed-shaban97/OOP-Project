<?php
require_once __DIR__ . "/../config/Database.php";
class Product extends Database
{
        public function getAll()
        {
                $sql = "SELECT products .*, categories.name 
                FROM products
                JOIN categories ON products.category_id = categories.id";
                return $this->fetchAll($sql);
        }

        public function getById($id)
        {
                $sql = "SELECT * FROM products WHERE id =:id";
                return $this->fetch($sql, ['id' => $id]);
        }

        public function create($data)
        {
                $sql = "INSERT INTO products (name,price,image,description,stock_qty,category_id,brand_id) 
                VALUES (:name,:price,:image,:description,:stock_qty,:category_id,:brand_id)";
                $params = [
                        'name' => $data['name'],
                        'price' => $data['price'],
                        'image' => $data['image'],
                        'stock_qty' => $data['stock_qty'],
                        'description' => $data['description'],
                        'category_id' => $data['category_id'],
                        'brand_id' => $data['brand_id']
                ];
                $this->execute($sql, $params);
                return $this->lastInsertId();
        }


        public function update($id, $data)
        {
                $sql = "UPDATE products 
            SET 
                name = :name,
                price = :price,
                image = :image,
                description = :description,
                stock_qty = :stock_qty,
                category_id = :category_id,
                brand_id = :brand_id
            WHERE id = :id";

                $params = [
                        ':id' => $id,
                        ':name' => $data['name'],
                        ':price' => $data['price'],
                        ':image' => $data['image'],
                        ':description' => $data['description'],
                        ':stock_qty' => $data['stock_qty'],
                        ':category_id' => $data['category_id'],
                        ':brand_id' => $data['brand_id']
                ];

                return $this->execute($sql, $params);
        }


        public function delete($id)
        {
                $sql = "DELETE FROM products WHERE id = :id";
                return $this->execute($sql, ['id' => $id]);
        }
}