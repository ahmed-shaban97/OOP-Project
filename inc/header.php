<!-- inc/header.php -->
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Drophut - Single Product eCommerce Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/custom2.css">
</head>

<body>

    <!-- Offcanvas menu area start -->
    <div class="off_canvars_overlay"></div>
    <div class="Offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        </div>

                        <div class="support_info">
                            <?php if (isset($_SESSION['user'])): ?>
                            <p>
                                Email:
                                <a href="mailto:<?= htmlspecialchars($_SESSION['user']['email']) ?>">
                                    <?= htmlspecialchars($_SESSION['user']['email']) ?>
                                </a>
                            </p>
                            <?php else: ?>
                            <p>Welcome! <a href="index.php?page=login">Login</a> or <a
                                    href="index.php?page=register">Register</a></p>
                            <?php endif; ?>
                        </div>

                        <div class="top_right text-right">
                            <ul>
                                <?php if (isset($_SESSION['user'])): ?>
                                <li><a href="logout.php" class="text-danger"> Logout</a></li>
                                <?php endif; ?>
                                <li><a href="index.php?page=checkout">Checkout</a></li>
                            </ul>
                        </div>

                        <div class="search_container">
                            <form action="index.php" method="get">
                                <input type="hidden" name="page" value="shop">
                                <div class="search_box">
                                    <input placeholder="Search product..." type="text" name="search">
                                    <button type="submit">Search</button>
                                </div>
                            </form>
                        </div>

                        <div class="Offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@drophunt.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offcanvas menu area end -->

    <header>
        <div class="main_header">
            <!-- header top start -->
            <div class="header_top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="support_info">
                                <?php if (isset($_SESSION['user'])): ?>
                                <p>
                                    Email:
                                    <a href="mailto:<?= htmlspecialchars($_SESSION['user']['email']) ?>">
                                        <?= htmlspecialchars($_SESSION['user']['email']) ?>
                                    </a>
                                </p>
                                <?php else: ?>
                                <p>Welcome! <a href="index.php?page=login">Login</a> or <a
                                        href="index.php?page=register">Register</a></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="top_right text-right">
                                <ul>
                                    <?php if (isset($_SESSION['user'])): ?>
                                    <li><a href="index.php?page=logout" class="text-danger">Logout</a></li>
                                    <?php endif; ?>
                                    <li><a href="index.php?page=checkout">Checkout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header top end -->

            <!-- header middle start -->
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-6">
                            <div class="logo">
                                <a href="index.php?page=home"><img src="assets/img/logo/logo.png" alt="Logo"></a>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-6">
                            <div class="middel_right">
                                <div class="search_container">
                                    <form action="index.php" method="get">
                                        <input type="hidden" name="page" value="shop">
                                        <div class="search_box">
                                            <input placeholder="Search product..." type="text" name="search">
                                            <button type="submit">Search</button>
                                        </div>
                                    </form>
                                </div>

                                <?php
                                require_once __DIR__ . '/../vendor/autoload.php';

                                use Model\Cart;

                                if (isset($_SESSION['user'])):
                                    $user_id = $_SESSION['user']['id'];
                                    $cartModel = new Cart();

                                    $cart = $cartModel->getCartByUser($user_id);
                                    $cart_id = $cart['id'] ?? null;
                                    $cartItems = $cart_id ? $cartModel->getItems($cart_id) : [];
                                    $cartCount = count($cartItems);
                                    $cartTotal = 0;
                                    foreach ($cartItems as $item) {
                                        $cartTotal += $item['price'] * $item['quantity'];
                                    }
                                ?>

                                <div class="middel_right_info">
                                    <div class="header_wishlist">
                                        <a href="#"><img src="assets/img/user.png" alt=""></a>
                                    </div>
                                    <div class="mini_cart_wrapper">
                                        <a href="javascript:void(0)"><img src="assets/img/shopping-bag.png" alt=""></a>
                                        <span class="cart_quantity"><?= $cartCount ?></span>
                                        <div class="mini_cart">
                                            <?php if (!empty($cartItems)): ?>
                                            <?php foreach ($cartItems as $item): ?>
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img
                                                            src="assets/image/<?= htmlspecialchars($item['image']) ?>"
                                                            alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#"><?= htmlspecialchars($item['name']) ?></a>
                                                    <p>Qty: <?= $item['quantity'] ?> X
                                                        <span>$<?= number_format($item['price'], 2) ?></span>
                                                    </p>
                                                </div>
                                                <div class="cart_remove">
                                                    <a
                                                        href="index.php?page=remove-from-cart&product_id_minicart=<?= $item['product_id'] ?>"><i
                                                            class="ion-android-close"></i></a>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                            <div class="mini_cart_table">
                                                <div class="cart_total">
                                                    <span>Total:</span>
                                                    <span class="price">$<?= number_format($cartTotal, 2) ?></span>
                                                </div>
                                            </div>
                                            <?php else: ?>
                                            <p class="text-center">Your cart is empty.</p>
                                            <?php endif; ?>

                                            <div class="mini_cart_footer">
                                                <div class="cart_button">
                                                    <a href="index.php?page=cart">View cart</a>
                                                </div>
                                                <div class="cart_button">
                                                    <a href="index.php?page=checkout">Checkout</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div><!-- middel_right_info -->
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header middle end -->

            <!-- header bottom start -->
            <div class="main_menu_area">
                <div class="container">
                    <div class="main_menu menu_position">
                        <nav>
                            <ul>
                                <li><a href="index.php?page=home">Home</a></li>
                                <li><a href="index.php?page=products">Products</a></li>
                                <li><a href="#">Pages <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub_menu pages">
                                        <li><a href="index.php?page=about">About Us</a></li>
                                        <li><a href="index.php?page=contact">Contact</a></li>
                                        <li><a href="index.php?page=login">Login</a></li>
                                        <li><a href="index.php?page=register">Register</a></li>
                                        <li><a href="index.php?page=cart">Cart</a></li>
                                        <li><a href="index.php?page=checkout">Checkout</a></li>
                                    </ul>
                                </li>
                                <li><a href="index.php?page=contact">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- header bottom end -->
        </div>
    </header>
    <!-- header area end -->