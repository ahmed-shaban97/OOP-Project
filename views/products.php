<?php
use Model\Category;
use Model\Product;

$categoryModel = new Category();
$productModel = new Product();

$categories = $categoryModel->getAll();

$category_id = $_GET['category_id'] ?? null;

if ($category_id) {
    $products = $categoryModel->getProductsByCategory($category_id);
} else {
    $products = $productModel->getAll();
}
?>

<section class="pt-60 pb-20 gray-bg">
    <div class="container text-center">
        <div class="section-title mb-4">
            <h2>Browse by Category</h2>
        </div>

        <div class="d-flex flex-wrap justify-content-center gap-2">
            <a href="index.php?page=products" class="btn btn-outline-dark <?= !$category_id ? 'active' : '' ?>">
                All
            </a>
            <?php foreach ($categories as $category): ?>
            <a href="index.php?page=products&category_id=<?= $category['id'] ?>"
                class="btn btn-outline-dark <?= ($category_id == $category['id']) ? 'active' : '' ?>">
                <?= htmlspecialchars($category['name']) ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="pt-30 pb-30 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section-title">
                    <h2><?= $category_id ? 'Products in this Category' : 'All Products' ?></h2>
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
                                <span class="current_price fw-bold text-success">
                                    $<?= number_format($product['price'], 2) ?>
                                </span>
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
<style>

</style>