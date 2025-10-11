<?php 

require_once __DIR__. "/../../../models/Category.php";

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
                <th>price</th>
                <th>Image</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Description</th>
                <th>Count</th>
                <th>Controls</th>

            </tr>
        </thead>
        <tbody>
            <?php
                $productModel = new Product();
                $products=$productModel->getAll();
                foreach ($products as $product):
            ?>
            <tr>
                <td><?=$product['id']?></td>
                <td><?=$product['name']?></td>
                <td><?=$product['price']?></td>
                <td>
                    <img src="assets/image/<?=$product['image']?> " class="img-thumbnail border border-dark"
                        style="width:100px;height:100px">

                </td>
                <td><?php
                $id=$product['category_id'];
                $categoryModel=new Category();
                $category=$categoryModel->getById($id);
                echo $category['name'];
                ?>
                </td>
                </td>
                <td><?php
                $id=$product['brand_id'];
                $brandModel=new Brand();
                $brand=$brandModel->getById($id);
                echo $brand['name'];
                ?>
                </td>
                <td><?=$product['description']?></td>
                <td><?=$product['stock_qty']?></td>

                <td class="d-flex ">
                    <a href="admin_index.php?page=edit_product&id=<?=$product['id']?>"
                        class="btn btn-warning btn-sm m-1 ">Edit</a>
                    <form action="admin_index.php?page=delete_product" method="POST">
                        <input type="hidden" name="id" value="<?=$product['id']?>">
                        <button class="btn btn-danger btn-sm m-1">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ;?>
        </tbody>
    </table>
    <a href=" admin_index.php?page=add_product" class="btn btn-success">Add New product</a>

</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>