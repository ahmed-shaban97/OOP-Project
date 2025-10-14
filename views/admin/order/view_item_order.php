<?php
// use Model\Product;
// use Model\Category;
// use Model\Brand;

use Model\Order;

require_once __DIR__ . '/../../../vendor/autoload.php';

$status="Product";

?>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order Item </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order Item </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <table class="table table-bordered table-striped ">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>


            </tr>
        </thead>
        <tbody>
            <?php
                $orderModel = new Order();
                $orders=$orderModel->getAllOrderItems();
                foreach ($orders as $order):
            ?>
            <tr>
                <td><?=$order['id']?></td>
                <td><?=$order['product_name']?></td>
                <td><?=$order['quantity']?></td>
                <td><?=$order['price']?></td>
            <tr>
                <?php endforeach ;?>
        </tbody>
    </table>

</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>