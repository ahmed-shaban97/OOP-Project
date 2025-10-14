<?php
namespace Model;
class Cart extends Database
{
    public function createCart($user_id)
    {
        $sql = "INSERT INTO cart (user_id) VALUES (:user_id)";
        $this->execute($sql, ['user_id' => $user_id]);
        return $this->lastInsertId();
    }

    public function getCartByUser($user_id)
    {
        $sql = "SELECT * FROM cart WHERE user_id = :user_id";
        return $this->fetch($sql, ['user_id' => $user_id]);
    }

    public function addItem($cart_id, $product_id, $quantity = 1)
    {
        $sqlCheck = "SELECT * FROM cart_item WHERE cart_id = :cart_id AND product_id = :product_id";
        $item = $this->fetch($sqlCheck, ['cart_id' => $cart_id, 'product_id' => $product_id]);

        if ($item) {
            $sqlUpdate = "UPDATE cart_item SET quantity = quantity + :quantity 
                          WHERE cart_id = :cart_id AND product_id = :product_id";
            $this->execute($sqlUpdate, [
                'quantity' => $quantity,
                'cart_id' => $cart_id,
                'product_id' => $product_id
            ]);
        } else {
            $sqlInsert = "INSERT INTO cart_item (cart_id, product_id, quantity) 
                          VALUES (:cart_id, :product_id, :quantity)";
            $this->execute($sqlInsert, [
                'cart_id' => $cart_id,
                'product_id' => $product_id,
                'quantity' => $quantity
            ]);
        }
    }

    public function getItems($cart_id)
    {
        $sql = "SELECT ci.*, p.name, p.price, p.image 
                FROM cart_item ci
                JOIN products p ON ci.product_id = p.id
                WHERE ci.cart_id = :cart_id";
        return $this->fetchAll($sql, ['cart_id' => $cart_id]);
    }

    public function removeItem($cart_id, $product_id)
    {
        $sql = "DELETE FROM cart_item WHERE cart_id = :cart_id AND product_id = :product_id";
        return $this->execute($sql, ['cart_id' => $cart_id, 'product_id' => $product_id]);
    }

    public function clearCart($cart_id)
    {
        $sql = "DELETE FROM cart_item WHERE cart_id = :cart_id";
        return $this->execute($sql, ['cart_id' => $cart_id]);
    }

    public function getTotal($cart_id)
    {
        $sql = "SELECT SUM(p.price * ci.quantity) AS total 
                FROM cart_item ci
                JOIN products p ON ci.product_id = p.id
                WHERE ci.cart_id = :cart_id";
        $result = $this->fetch($sql, ['cart_id' => $cart_id]);
        return $result ? $result['total'] : 0;
    }
public function updateQuantity($cart_id, $product_id, $quantity)
{
    $sql = "UPDATE cart_item SET quantity = :quantity 
            WHERE cart_id = :cart_id AND product_id = :product_id";
    $this->execute($sql, [
        'quantity' => $quantity,
        'cart_id' => $cart_id,
        'product_id' => $product_id
    ]);
}
public function getTotalAddedToCart()
{
    $sql = "SELECT SUM(quantity) AS total_added FROM cart_item";
    $result = $this->fetch($sql);
    return $result ? (int)$result['total_added'] : 0;
}

}