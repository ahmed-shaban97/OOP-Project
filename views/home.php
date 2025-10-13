<!-- views/home.php -->
<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/DB_connection.php';

use Model\Product;
use Model\Message;

$message = new Message;
$message->getMessage();

$productModel = new Product();
$products = $productModel->getAll();
?>


<header class="position-relative text-white text-center d-flex justify-content-center align-items-center"
    style="width:100%; min-height: 400px; overflow:hidden;">
    <video autoplay muted loop playsinline class="position-absolute top-0 start-0 w-100 h-100"
        style="z-index:-1; object-fit: cover;">
        <source src="assets/video.mp4" type="video/mp4">
    </video>

    <div class="header-content p-3" style="z-index: 1; max-width: 800px;">
        <h1>Elevate Your Shopping</h1>
        <p>Experience fashion like never before</p>
        <a href="index.php" class="btn btn-primary btn-lg mt-3">Explore Now</a>
    </div>
</header>


<!--Tranding product-->
<section class="pt-60 pb-30 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section-title">
                    <h2>Trending Products</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                <div class="single-tranding text-center p-3 shadow-sm bg-white rounded">
                    <a href="index.php?page=product-details&id=<?= $product['id'] ?>"
                        class="text-decoration-none text-dark">
                        <div class="tranding-pro-img mb-3">
                            <img src="assets/image/<?= htmlspecialchars($product['image']) ?>"
                                alt="<?= htmlspecialchars($product['name']) ?>" class="img-fluid rounded"
                                style="height: 250px; object-fit: cover;">
                        </div>
                        <div class="tranding-pro-title mb-2">
                            <h3 class="h5 mb-1"><?= htmlspecialchars($product['name']) ?></h3>
                            <h4 class="text-muted small"><?= htmlspecialchars($product['brand_name']) ?></h4>
                        </div>
                        <div class="tranding-pro-price mb-3">
                            <div class="price_box">
                                <span
                                    class="current_price fw-bold text-success">$<?= number_format($product['price'], 2) ?></span>
                                <span class="old_price text-muted text-decoration-line-through ms-2">
                                    $<?= $productModel->getOldPrice($product['price']) ?>
                                </span>
                            </div>
                        </div>
                    </a>
                    <form action="index.php?page=add-to-cart" method="POST">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <input type="hidden" name="product_quantity" value="1">
                        <button type="submit" class="btn btn-primary btn-sm px-4">
                            <i class="fa fa-shopping-cart me-1"></i> Add to Cart
                        </button>
                    </form>

                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <p class="text-center text-muted">No products available yet.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<!--Tranding product end-->


<!-- Features area -->
<section class="features-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section-title">
                    <h2>Why Shop With Us?</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <!-- Fast Delivery -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="single-features text-center">
                    <img src="assets/img/icon/1.png" alt="Fast Delivery">
                    <h3>Fast Delivery</h3>
                    <p>Get your electronics delivered to your doorstep quickly and safely, with tracking available for
                        every order.</p>
                </div>
            </div>

            <!-- Secure Payments -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="single-features text-center">
                    <img src="assets/img/icon/2.png" alt="Secure Payments">
                    <h3>Secure Payments</h3>
                    <p>Shop with confidence using our 100% secure payment options, supporting all major cards and
                        digital wallets.</p>
                </div>
            </div>

            <!-- Customer Support -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <div class="single-features text-center">
                    <img src="assets/img/icon/3.png" alt="Customer Support">
                    <h3>Awesome Support</h3>
                    <p>Our friendly support team is available 24/7 to help you with orders, product info, and technical
                        questions.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Features area -->




<!--Other product-->
<section class="pt-60 pb-30 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section-title">
                    <h2>Other Collection</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">

            <!-- Product 1 -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                <div class="single-tranding text-center p-3 shadow-sm bg-white rounded">
                    <a href="<?= "index.php?page=product-details" ?>" class="text-decoration-none text-dark">
                        <div class="tranding-pro-img mb-3">
                            <img src="assets/img/product/tranding-1.jpg" alt="" class="img-fluid rounded">
                        </div>
                        <div class="tranding-pro-title mb-2">
                            <h3 class="h5 mb-1">Meyoji Robast Drone</h3>
                            <h4 class="text-muted small">Drone</h4>
                        </div>
                        <div class="tranding-pro-price mb-3">
                            <div class="price_box">
                                <span class="current_price fw-bold text-success">$70.00</span>
                                <span class="old_price text-muted text-decoration-line-through ms-2">$80.00</span>
                            </div>
                        </div>
                    </a>
                    <form action="index.php?page=add-to-cart" method="POST">
                        <input type="hidden" name="product_id" value="1">
                        <input type="hidden" name="product_name" value="Meyoji Robast Drone">
                        <input type="hidden" name="product_price" value="70.00">
                        <button type="submit" class="btn btn-primary btn-sm px-4">
                            <i class="fa fa-shopping-cart me-1"></i> Add to Cart
                        </button>
                    </form>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                <div class="single-tranding text-center p-3 shadow-sm bg-white rounded">
                    <a href="<?= "index.php?page=product-details" ?>" class="text-decoration-none text-dark">
                        <div class="tranding-pro-img mb-3">
                            <img src="assets/img/product/tranding-2.jpg" alt="" class="img-fluid rounded">
                        </div>
                        <div class="tranding-pro-title mb-2">
                            <h3 class="h5 mb-1">Ut praesentium earum</h3>
                            <h4 class="text-muted small">Mevrik</h4>
                        </div>
                        <div class="tranding-pro-price mb-3">
                            <div class="price_box">
                                <span class="current_price fw-bold text-success">$70.00</span>
                                <span class="old_price text-muted text-decoration-line-through ms-2">$80.00</span>
                            </div>
                        </div>
                    </a>
                    <form action="index.php?page=add-to-cart" method="POST">
                        <input type="hidden" name="product_id" value="2">
                        <input type="hidden" name="product_name" value="Ut praesentium earum">
                        <input type="hidden" name="product_price" value="70.00">
                        <button type="submit" class="btn btn-primary btn-sm px-4">
                            <i class="fa fa-shopping-cart me-1"></i> Add to Cart
                        </button>
                    </form>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
                <div class="single-tranding text-center p-3 shadow-sm bg-white rounded">
                    <a href="<?= "index.php?page=product-details" ?>" class="text-decoration-none text-dark">
                        <div class="tranding-pro-img mb-3">
                            <img src="assets/img/product/tranding-3.jpg" alt="" class="img-fluid rounded">
                        </div>
                        <div class="tranding-pro-title mb-2">
                            <h3 class="h5 mb-1">Consectetur adipisicing</h3>
                            <h4 class="text-muted small">Flyer</h4>
                        </div>
                        <div class="tranding-pro-price mb-3">
                            <div class="price_box">
                                <span class="current_price fw-bold text-success">$70.00</span>
                                <span class="old_price text-muted text-decoration-line-through ms-2">$80.00</span>
                            </div>
                        </div>
                    </a>
                    <form action="index.php?page=add-to-cart" method="POST">
                        <input type="hidden" name="product_id" value="3">
                        <input type="hidden" name="product_name" value="Consectetur adipisicing">
                        <input type="hidden" name="product_price" value="70.00">
                        <button type="submit" class="btn btn-primary btn-sm px-4">
                            <i class="fa fa-shopping-cart me-1"></i> Add to Cart
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<!--Other product-->


<!--Testimonials-->
<section class="pb-60 pt-60 gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="testimonial_are">
                    <div class="testimonial_active owl-carousel">

                        <!-- Developer 1 -->
                        <article class="single_testimonial">
                            <figure>
                                <div class="testimonial_thumb">
                                    <a href="#"><img src="assets/img/about/dev1.jpg" alt="Developer 1"></a>
                                </div>
                                <figcaption class="testimonial_content">
                                    <p>
                                        Working as a <strong>PHP Backend Developer</strong> for over 1 years, I focus on
                                        building scalable APIs and clean architecture using Laravel and MySQL. I’m
                                        passionate about performance optimization and teamwork.
                                    </p>
                                    <h3><a href="#">Ahmed Shaban</a><span> - Backend Developer (PHP)</span></h3>
                                </figcaption>
                            </figure>
                        </article>

                        <!-- Developer 2 -->
                        <article class="single_testimonial">
                            <figure>
                                <div class="testimonial_thumb">
                                    <a href="#"><img src="assets/img/about/dev2.jpg" alt="Developer 2"></a>
                                </div>
                                <figcaption class="testimonial_content">
                                    <p>
                                        I’m a <strong>Backend PHP Developer</strong> specializing in Laravel and RESTful
                                        APIs. I enjoy creating efficient server-side logic and integrating databases to
                                        deliver secure and fast web applications.
                                    </p>
                                    <h3><a href="#">Ahmed Elhagar</a><span> - Backend Developer (PHP)</span></h3>
                                </figcaption>
                            </figure>
                        </article>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Styling -->
<style>
.testimonial_thumb {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto 20px;
    border: 5px solid #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.testimonial_thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.testimonial_content p {
    font-style: italic;
    color: #333;
    line-height: 1.6;
}

.testimonial_content h3 a {
    color: #2b2bff;
    text-decoration: none;
}

.testimonial_content span {
    color: #444;
}
</style>
<!--/Testimonials-->

<!--shipping area start-->
<section class="shipping_area">
    <div class="container">
        <div class=" row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="assets/img/about/shipping1.png" alt="">
                    </div>
                    <div class="shipping_content">
                        <h2>Free Shipping</h2>
                        <p>Free shipping on all US order</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="assets/img/about/shipping2.png" alt="">
                    </div>
                    <div class="shipping_content">
                        <h2>Support 24/7</h2>
                        <p>Contact us 24 hours a day</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="assets/img/about/shipping3.png" alt="">
                    </div>
                    <div class="shipping_content">
                        <h2>100% Money Back</h2>
                        <p>You have 30 days to Return</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="single_shipping">
                    <div class="shipping_icone">
                        <img src="assets/img/about/shipping4.png" alt="">
                    </div>
                    <div class="shipping_content">
                        <h2>Payment Secure</h2>
                        <p>We ensure secure payment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--shipping area end-->