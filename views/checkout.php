<?php

use Model\Cart;

$user_id = $_SESSION['user']['id'];
$cartModel = new Cart();
$cart = $cartModel->getCartByUser($user_id);
$cart_id = $cart['id'];
$cartItems = $cart_id ? $cartModel->getItems($cart_id) : [];
$cartTotal = $cart_id ? $cartModel->getTotal($cart_id) : 0;
// echo "<pre>";
// print_r($_SESSION);
// print_r($cartItems);

?>


<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php?page=home">home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--Checkout page section-->
<div class="Checkout_section mt-60">
    <div class="container">
        <!-- <div class="row">
            <div class="col-12">
                <div class="user-actions">

                    <div id="checkout_login" class="collapse" data-parent="#accordionExample">
                        <div class="checkout_info">
                            <p>If you have shopped with us before, please enter your details in the boxes below. If you
                                are a new customer please proceed to the Billing & Shipping section.</p>
                            <form action="#">
                                <div class="form_group">
                                    <label>Username or email <span>*</span></label>
                                    <input type="text">
                                </div>
                                <div class="form_group">
                                    <label>Password <span>*</span></label>
                                    <input type="text">
                                </div>
                                <div class="form_group group_3 ">
                                    <button type="submit">Login</button>
                                    <label for="remember_box">
                                        <input id="remember_box" type="checkbox">
                                        <span> Remember me </span>
                                    </label>
                                </div>
                                <a href="#">Lost your password?</a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="user-actions">
                    <div id="checkout_coupon" class="collapse" data-parent="#accordionExample">
                        <div class="checkout_info">
                            <form action="#">
                                <input placeholder="Coupon code" type="text">
                                <button type="submit">Apply coupon</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="checkout_form">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form action="index.php?page=add-order" method="POST">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">

                            <div class="col-12 mb-20">
                                <label>Username <span>*</span></label>
                                <input type="text" name="name" readonly value="<?= $_SESSION['user']['name'] ?>">
                            </div>

                            <div class="col-12 mb-20">
                                <label>Street address <span>*</span></label>
                                <input placeholder="Enter City and House number and street name" type="text"
                                    name="address">
                            </div>

                            <div class=" col-lg-6 mb-20">
                                <label>Phone<span>*</span></label>
                                <input type="text" name="phone">
                            </div>
                            <div class="col-lg-6 mb-20">
                                <label> Email Address <span>*</span></label>
                                <input type="email" name="email" readonly value="<?= $_SESSION['user']['email'] ?>">
                            </div>

                            <div class=" col-12">
                                <div class="order-notes">
                                    <label for="order_note">Order Notes</label>
                                    <textarea id="order_note" rows="2"
                                        placeholder="Notes about your order, e.g. special notes for delivery."
                                        name="notes"></textarea>
                                </div>
                            </div>
                            <div class="order_button col-lg-6 mb-20">
                                <button type="submit">Proceed to buy</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-6">
                    <form action="">
                        <h3>Your order</h3>
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cartItems as $item): ?>
                                    <tr>
                                        <td> <?= $item['name'] ?><strong> × <?= $item['quantity'] ?></strong></td>
                                        <td> <?= $item['price'] ?></td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr class=" order_total">
                                        <th>Order Total</th>
                                        <td><strong><?= $cartTotal ?></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- <div class="payment_method">
                            <div class="panel-default">
                                <input id="payment" name="check_method" type="radio" data-target="createp_account" />
                                <label for="payment" data-toggle="collapse" data-target="#collapseThree"
                                    aria-controls="collapseThree">Direct
                                    bank transfer</label>

                                <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body1">
                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State /
                                            County, Store Postcode.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-default">
                                <input id="payment_defult" name="check_method" type="radio"
                                    data-target="createp_account" />
                                <label for="payment_defult" data-toggle="collapse" data-target="#collapseFour"
                                    aria-controls="collapseFour">PayPal <img src="assets/img/icon/papyel.png"
                                        alt=""></label>

                                <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body1">
                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal.
                                            <a href="#">What is Paypal?</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="order_button">
                                <button type="submit">Proceed to buy</button>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Checkout page section end-->