<?php
require_once __DIR__."/../../../models/Category.php";
require_once __DIR__."/../../../models/Brand.php";
?>
<section class="py-3 mt-5 mb-5 ms-5" style="width:100%;">
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <form action="controller/product/store_product.php" method="post" class="form border my-2 p-3"
                    enctype="multipart/form-data">
                    <div class="mb-3">

                        <h3>Create Product</h3>
                        <div class="mb-3">
                            <label for="">Product Name:</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Product Price:</label>
                            <input type="number" name="price" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Choose Category:</label>
                            <select name="category_name" class="form-control" aria-label="Default select example">
                                <?php 
                                    $db_cat=new Category();
                                    $categories=$db_cat->getAll() ;
                                    foreach ($categories as $category):
                                ?>
                                <option value="<?=$category['id']?>"><?=$category['name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Choose Brand:</label>
                            <select name="brand_name" class="form-control" aria-label="Default select example">
                                <?php 
                                    $db_brand=new Brand();
                                    $brands=$db_brand->getAll() ;
                                    foreach ($brands as $brand):
                                ?>
                                <option value="<?=$brand['id']?>"><?=$brand['name']?></option>
                                <?php endforeach;?>

                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="exampleInputEmail1" class="form-label">Description Product:</label>
                            <textarea class="form-control" name="description" id="floatingTextarea"> </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Count Product:</label>
                            <input type="number" name="stock_qty" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Image Product:</label>
                            <input type="file" name="image" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-info form-control" type="submit"> Add Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>