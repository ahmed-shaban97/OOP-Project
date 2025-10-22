<?php
use Model\Cart;
use Model\Order;
use Model\User;
use Model\Product;

$productModel = new Product();
$allProducts = $productModel->getAll();
$totalProducts = count($allProducts);
$latestProducts = $productModel->getLatestProducts(4);
$userModel = new User();
$totalUsers = $userModel->countUsers();
$latestUsers = $userModel->getLatestUsers(5);

$orderModel = new Order();
$latestOrders = $orderModel->getLatestOrders(5);
$cartModel = new Cart();

$totalOrders = $orderModel->getTotalOrders();
$totalSales = $orderModel->getTotalSales();
$completedOrders = $orderModel->getCompletedOrdersCount();

$completionPercent = $totalOrders > 0 ? ($completedOrders / $totalOrders) * 100 : 0;

// Add Products to Cart
$totalAdded = $cartModel->getTotalAddedToCart();
$goal = 200;
$progress = $goal > 0 ? ($totalAdded / $goal) * 100 : 0;

// Complete Purchase
$totalOrders = $orderModel->getTotalOrders();
$completedOrders = $orderModel->getCompletedOrdersCount();
$completionPercent = $totalOrders > 0 ? ($completedOrders / $totalOrders) * 100 : 0;

?>

<!-- Dashboard Section -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="m-0">Dashboard</h1>
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <!-- ===== Row 1: Info Cards ===== -->
            <div class="row g-3">
                <div class="col-md-3 col-sm-6">
                    <div class="card text-center shadow-sm border-0">
                        <div class="card-body">
                            <i class="fas fa-shopping-cart fa-2x text-primary mb-2"></i>
                            <h6 class="text-muted">Total Orders</h6>
                            <h4 class="fw-bold"><?= $totalOrders ?></h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card text-center shadow-sm border-0">
                        <div class="card-body">
                            <i class="fas fa-dollar-sign fa-2x text-success mb-2"></i>
                            <h6 class="text-muted">Total Sales</h6>
                            <h4 class="fw-bold"><?= number_format($totalSales, 2) ?> EGP</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card text-center shadow-sm border-0">
                        <div class="card-body">
                            <i class="fas fa-users fa-2x text-warning mb-2"></i>
                            <h6 class="text-muted">Users</h6>
                            <h4 class="fw-bold"><?= number_format($totalUsers) ?></h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="card text-center shadow-sm border-0">
                        <div class="card-body">
                            <i class="fas fa-boxes fa-2x text-info mb-2"></i>
                            <h6 class="text-muted">Total Products</h6>
                            <h4 class="fw-bold"><?= $totalProducts ?></h4>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ===== Row 2: Sales Report & Goals ===== -->
            <div class="row mt-4 g-3">
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="m-0">Monthly Recap Report</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="salesChart" height="180"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="m-0">Goal Completion</h5>
                        </div>
                        <div class="card-body">

                            <!-- Add Products to Cart -->
                            <p>Add Products to Cart</p>
                            <span class="float-right"><b><?= $totalAdded ?></b>/<?= $goal ?></span>
                            <div class="progress progress-sm mb-3">
                                <div class="progress-bar bg-primary" style="width: <?= min($progress, 100) ?>%"></div>
                            </div>

                            <!-- Complete Purchase -->
                            <p>Complete Purchase</p>
                            <span class="float-right"><b><?= $completedOrders ?></b>/<?= $totalOrders ?></span>
                            <div class="progress progress-sm mb-3">
                                <div class="progress-bar bg-danger" style="width: <?= min($completionPercent, 100) ?>%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== Row 3: Latest Members & Orders ===== -->
            <div class="row mt-4 g-3">
                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="m-0">Latest Members</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <?php foreach ($latestUsers as $user): ?>
                                <li class="list-group-item d-flex align-items-center">
                                    <div>
                                        <strong><?= htmlspecialchars($user['name']) ?></strong><br>
                                        <small
                                            class="text-muted"><?= date('d M Y', strtotime($user['created_at'])) ?></small>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h5 class="m-0">Latest Orders</h5>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Item</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($latestOrders as $order): ?>
                                    <?php
                        $statusClass = match($order['status']) {
                            'completed' => 'bg-success',
                            'shipped'   => 'bg-primary',
                            'pending'   => 'bg-warning text-dark',
                            default     => 'bg-secondary'
                        };
                        ?>
                                    <tr>
                                        <td>OR<?= $order['id'] ?></td>
                                        <td><?= htmlspecialchars($order['product_name']) ?></td>
                                        <td>
                                            <span class="badge <?= $statusClass ?>">
                                                <?= ucfirst($order['status']) ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



                <!-- ===== Row 4: Recently Added Products ===== -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header bg-light">
                                <h5 class="m-0">Recently Added Products</h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <?php foreach ($latestProducts as $product): ?>
                                    <div class="col-md-3 col-sm-6 text-center">
                                        <img src="<?= htmlspecialchars($product['image'] ? 'assets/image/' . $product['image'] : 'dist/img/default-150x150.png') ?>"
                                            class="img-fluid rounded mb-2">
                                        <h6><?= htmlspecialchars($product['name']) ?></h6>
                                        <span
                                            class="badge bg-warning">$<?= number_format($product['price'], 2) ?></span>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </section>
</div>