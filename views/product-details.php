<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Model\Product;

$product_id = $_GET['id'] ?? null;

if (!$product_id) {
    echo "Product not found!";
    exit;
}

$productModel = new Product();
$product = $productModel->getById($product_id);

if (!$product) {
    echo "Product not found!";
    exit;
}

$oldPrice = $productModel->getOldPrice($product['price']);
?>

<!-- Breadcrumbs -->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php?page=home">Home</a></li>
                        <li><?= htmlspecialchars($product['name']) ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Product details -->
<div class="product_details mt-60 mb-60">
    <div class="container">
        <div class="row">
            <!-- Product Image -->
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <img id="zoom1" src="assets/image/<?= htmlspecialchars($product['image']) ?>"
                                data-zoom-image="assets/image/<?= htmlspecialchars($product['image']) ?>"
                                alt="<?= htmlspecialchars($product['name']) ?>">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    <form action="index.php?page=add-to-cart" method="POST">
                        <h1><?= htmlspecialchars($product['name']) ?></h1>

                        <div class="price_box mb-3">
                            <span class="current_price">$<?= number_format($product['price'], 2) ?></span>
                            <span class="old_price">$<?= $oldPrice ?></span>
                        </div>

                        <div class="product_desc mb-3">
                            <p><?= htmlspecialchars($product['description']) ?></p>
                        </div>

                        <div class="product_variant quantity mb-3">
                            <label>Quantity</label>
                            <input min="1" max="100" value="1" type="number" name="product_quantity">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <button class="button btn btn-primary" type="submit">Add to Cart</button>
                        </div>

                        <div class="product_meta mb-3">
                            <span>Category: <a
                                    href="#"><?= htmlspecialchars($product['category_name']) ?></a></span><br>
                            <span>Brand: <a href="#"><?= htmlspecialchars($product['brand_name']) ?></a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>