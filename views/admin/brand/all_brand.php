<?php 
use Model\Brand;
require_once __DIR__ . '/../../../vendor/autoload.php';
$status="Brand";

?>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Brand</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Brand</li>
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
                <th>Created_at</th>
                <th>Controls</th>

            </tr>
        </thead>
        <tbody>
            <?php
                $brandModel = new Brand();
                $brands=$brandModel->getAll();
                foreach ($brands as $brand):
            ?>
            <tr>
                <td><?=$brand['id']?></td>
                <td><?=$brand['name']?></td>
                <td><?=$brand['created_at']?></td>
                <td class="d-flex ">
                    <a href="admin_index.php?page=edit_brand&id=<?=$brand['id']?>"
                        class="btn btn-warning btn-sm m-1 ">Edit</a>
                    <form action="admin_index.php?page=delete_brand" method="POST">
                        <input type="hidden" name="id" value="<?=$brand['id']?>">
                        <button class="btn btn-danger btn-sm m-1">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ;?>
        </tbody>
    </table>
    <a href=" admin_index.php?page=add_brand" class="btn btn-success">Add New category</a>

</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>