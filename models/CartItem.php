<?php
namespace Model;

use Exception;

class CartItem extends Database
{
    private int $id;
    private int $cart_id;
    private ?int $product_id;
    private int $quantity;
    private ?array $productData = null; 

    public function __construct($cart_id = null, $product_id = null, $quantity = 1)
    {
        parent::__construct();
        $this->cart_id = $cart_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }


    public function getId(): ?int
    {
        return $this->id ?? null;
    }

    public function getCartId(): int
    {
        return $this->cart_id;
    }

    public function getProductId(): ?int
    {
        return $this->product_id;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }


    public function getProduct(): ?array
    {
        if ($this->product_id) {
            $product = new Product();
            $this->productData = $product->getById($this->product_id);
            return $this->productData;
        }
        return null;
    }

    public function getTotal(): float
    {
        $product = $this->getProduct();
        return $product ? ($product['price'] * $this->quantity) : 0;
    }

    public function add()
    {
        $sql = "SELECT id, quantity FROM cart_item WHERE cart_id = :cart_id AND product_id = :product_id";
        $existing = $this->fetch($sql, [
            'cart_id' => $this->cart_id,
            'product_id' => $this->product_id
        ]);

        if ($existing) {
            $sql = "UPDATE cart_item 
                    SET quantity = quantity + :quantity 
                    WHERE id = :id";
            $this->execute($sql, [
                'quantity' => $this->quantity,
                'id' => $existing['id']
            ]);
        } else {
            $sql = "INSERT INTO cart_item (cart_id, product_id, quantity)
                    VALUES (:cart_id, :product_id, :quantity)";
            $this->execute($sql, [
                'cart_id' => $this->cart_id,
                'product_id' => $this->product_id,
                'quantity' => $this->quantity
            ]);
            $this->id = $this->lastInsertId();
        }
    }

    public function updateQuantity($newQuantity)
    {
        $sql = "UPDATE cart_item 
                SET quantity = :quantity 
                WHERE cart_id = :cart_id AND product_id = :product_id";
        $this->execute($sql, [
            'quantity' => $newQuantity,
            'cart_id' => $this->cart_id,
            'product_id' => $this->product_id
        ]);
        $this->quantity = $newQuantity;
    }

    public function delete()
    {
        $sql = "DELETE FROM cart_item 
                WHERE cart_id = :cart_id AND product_id = :product_id";
        $this->execute($sql, [
            'cart_id' => $this->cart_id,
            'product_id' => $this->product_id
        ]);
    }

    public function getCartItems($cart_id)
    {
        $sql = "SELECT ci.*, p.name, p.price, p.image
                FROM cart_item ci
                JOIN products p ON ci.product_id = p.id
                WHERE ci.cart_id = :cart_id";
        return $this->fetchAll($sql, ['cart_id' => $cart_id]);
    }

    public function getCartTotal($cart_id)
    {
        $sql = "SELECT SUM(p.price * ci.quantity) AS total
                FROM cart_item ci
                JOIN products p ON ci.product_id = p.id
                WHERE ci.cart_id = :cart_id";
        $result = $this->fetch($sql, ['cart_id' => $cart_id]);
        return $result['total'] ?? 0;
    }
}