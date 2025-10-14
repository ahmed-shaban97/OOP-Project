<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Model\Cart;

$user_id = $_SESSION['user']['id'] ;
$cartModel = new Cart();


$cart = $cartModel->getCartByUser($user_id);
$cart_id = $cart['id'] ?? null;
$cartItems = $cart_id ? $cartModel->getItems($cart_id) : [];
$cartTotal = $cart_id ? $cartModel->getTotal($cart_id) : 0;

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>

    <div class="shopping_cart_area mt-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                        <th class="product_remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($cartItems)): ?>
                                    <?php foreach($cartItems as $item): ?>
                                    <tr>
                                        <td class="product_thumb">
                                            <a href="#"><img src="assets/image/<?= htmlspecialchars($item['image']) ?>"
                                                    alt=""></a>
                                        </td>
                                        <td class="product_name"><?= htmlspecialchars($item['name']) ?></td>
                                        <td class="product-price">$<?= number_format($item['price'], 2) ?></td>
                                        <td class="product_quantity">
                                            <form action="index.php?page=update-cart" method="POST">
                                                <input type="hidden" name="product_id"
                                                    value="<?= $item['product_id'] ?>">
                                                <input type="number" name="product_quantity"
                                                    value="<?= $item['quantity'] ?>" min="1" max="100">
                                                <button type="submit">Update</button>
                                            </form>
                                        </td>
                                        <td class="product_total">
                                            $<?= number_format($item['price'] * $item['quantity'], 2) ?>
                                        </td>
                                        <td class="product_remove">
                                            <a
                                                href="index.php?page=remove-from-cart&product_id_cart=<?= $item['product_id'] ?>"><i
                                                    class="ion-android-close"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Your cart is empty.</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="cart_submit mt-3">
                            <a href="index.php?page=home" class="btn btn-secondary">Continue Shopping</a>
                        </div>

                        <div class="coupon_area mt-4">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="coupon_code left">
                                        <h3>Coupon</h3>
                                        <div class="coupon_inner">
                                            <p>Enter your coupon code if you have one.</p>
                                            <form action="index.php?page=apply-coupon" method="POST">
                                                <input placeholder="Coupon code" name="coupon_code" type="text">
                                                <button type="submit">Apply coupon</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="coupon_code right">
                                        <h3>Cart Totals</h3>
                                        <div class="coupon_inner">
                                            <div class="cart_subtotal">
                                                <p>Subtotal</p>
                                                <p class="cart_amount">$<?= number_format($cartTotal, 2) ?></p>
                                            </div>
                                            <div class="cart_subtotal mt-10">
                                                <p>Shipping</p>
                                                <p class="cart_amount"><span>Flat Rate:</span> $0.00</p>
                                            </div>
                                            <div class="cart_subtotal">
                                                <p>Total</p>
                                                <p class="cart_amount">$<?= number_format($cartTotal, 2) ?></p>
                                            </div>
                                            <div class="checkout_btn mt-3">
                                                <a href="index.php?page=checkout" class="btn btn-primary">Proceed to
                                                    Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- table_desc -->
                </div>
            </div>
        </div>
    </div>

</body>

</html>