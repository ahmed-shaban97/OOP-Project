<?php
namespace Model;
require_once __DIR__ . '/../vendor/autoload.php';

class Product extends Database
{
    public function getAll()
    {
        $sql = "SELECT 
                    products.*, 
                    categories.name AS category_name, 
                    brands.name AS brand_name
                FROM products
                JOIN categories ON products.category_id = categories.id
                JOIN brands ON products.brand_id = brands.id";
        return $this->fetchAll($sql);
    }

    public function getById($id)
    {
        $sql = "SELECT 
                    products.*, 
                    categories.name AS category_name, 
                    brands.name AS brand_name
                FROM products
                JOIN categories ON products.category_id = categories.id
                JOIN brands ON products.brand_id = brands.id
                WHERE products.id = :id";
        return $this->fetch($sql, ['id' => $id]);
    }

    public function create($data)
    {
        $sql = "INSERT INTO products (name, price, image, description, stock_qty, category_id, brand_id) 
                VALUES (:name, :price, :image, :description, :stock_qty, :category_id, :brand_id)";
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

    public function getBrandByProductId($id)
    {
        $sql = "SELECT brands.name 
                FROM products 
                JOIN brands ON products.brand_id = brands.id 
                WHERE products.id = :id";
        $result = $this->fetch($sql, ['id' => $id]);
        return $result ? $result['name'] : null;
 }
 public function getOldPrice($price)
{
    $oldPrice = $price + ($price * 0.20);
    return number_format($oldPrice, 2);
}
public function getTop3MostAddedToCart()
{
    $sql = "
        SELECT 
            p.id,
            p.name,
            p.price,
            p.image,
            b.name AS brand_name,
            SUM(ci.quantity) AS total_added
        FROM cart_item AS ci
        JOIN products AS p ON ci.product_id = p.id
        JOIN brands AS b ON p.brand_id = b.id
        GROUP BY p.id
        ORDER BY total_added DESC
        LIMIT 3
    ";

    return $this->fetchAll($sql);
}



}