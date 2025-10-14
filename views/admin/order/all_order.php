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
                    <h1 class="m-0">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
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
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>notes</th>
                <th>Total Price</th>
                <th>View Item</th>
                <th>Controls</th>

            </tr>
        </thead>
        <tbody>
            <?php
                $orderModel = new Order();
                $orders=$orderModel->getAll();
                foreach ($orders as $order):
            ?>
            <tr>
                <td><?=$order['id']?></td>
                <td><?=$order['name']?></td>
                <td><?=$order['address']?></td>
                <td><?=$order['email']?></td>
                <td><?=$order['phone']?></td>
                <td><?=$order['notes']?></td>
                <td><?=$order['total_price']?></td>
                <td><a href="admin_index.php?page=view_order&id=<?=$order['id']?>"
                        class="btn btn-warning btn-sm m-1 ">View</a></td>
                <td class="d-flex ">

                    <form action="admin_index.php?page=delete_order" method="POST">
                        <input type="hidden" name="id" value="<?=$order['id']?>">
                        <button class="btn btn-danger btn-sm m-1">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ;?>
        </tbody>
    </table>

</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>