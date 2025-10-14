<?php

namespace Model;

use Model\Database;


class Order extends Database
{
    public function getAll()
    {
        $sql = "SELECT orders.*, users.name AS user_name
                FROM orders
                JOIN users ON orders.user_id = users.id
                ORDER BY orders.id DESC";
        return $this->fetchAll($sql);
    }
    public function createOrder($user_id, $name, $email, $address, $phone, $notes, $total)
    {
        $sql = "INSERT INTO orders (user_id, name,email ,address, phone, notes ,total_price)
        VALUES (:user_id, :name, :email  ,:address, :phone, :notes ,:total_price)";
        $params = [
            ':user_id' => $user_id,
            ':name' => $name,
            ':email' => $email,
            ':address' => $address,
            ':phone' => $phone,
            ':notes' => $notes,
            ':total_price' => $total
        ];
        $this->execute($sql, $params);
        return $this->lastInsertId();
    }
    public function deleteOrder($id)
    {
        $sql = "DELETE FROM orders WHERE id = :id";
        $params = [':id' => $id];
        return $this->execute($sql, $params);
    }
    public function addOrderItem($order_id, $product_id, $product_name, $quantity, $price)
    {
        $sql = "INSERT INTO order_items (order_id, product_id, product_name ,quantity, price)
        VALUES (:order_id, :product_id, :product_name, :quantity, :price)";
        $params = [
            ':order_id' => $order_id,
            ':product_id' => $product_id,
            ':product_name' => $product_name,
            ':quantity' => $quantity,
            ':price' => $price
        ];
        $this->execute($sql, $params);
        return $this->lastInsertId();
    }

    public function getAllOrderItems()
    {
        $sql = "SELECT order_items.*, orders.id AS order_id, orders.user_id, products.name AS product_name
            FROM order_items
            JOIN orders ON order_items.order_id = orders.id
            JOIN products ON order_items.product_id = products.id
            ORDER BY order_items.id DESC";
        return $this->fetchAll($sql);
    }

    public function deleteOrderItem($id)
    {
        $sql = "DELETE FROM order_items WHERE id = :id";
        $params = [':id' => $id];
        return $this->execute($sql, $params);
    }
}