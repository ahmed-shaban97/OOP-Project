<?php
use Model\Product;
use Model\Category;
use Model\Brand;
require_once __DIR__ . '/../../../vendor/autoload.php';

    $id_pro= isset($_GET['id']) ? $_GET['id'] : 0;
    $productModel=new Product();
    $categoryModel=new Category();
    $brandModel=new brand();


    $product=$productModel->getById($id_pro);
    $category=$categoryModel->getAll();
    $brand=$brandModel->getAll();


?>

<section class="py-3" style="width:100%;">
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <form action="admin_index.php?page=update_product" method="POST" class="form border my-2 p-3"
                    enctype="multipart/form-data">
                    <div class="mb-3">

                        <h3>Update Product</h3>
                        <input type="hidden" name="id" value="<?=$_GET['id']?>">
                        <div class="mb-3">
                            <label for="">Product Name:</label>
                            <input type="text" name="name" class="form-control" value="<?=$product['name'];?>">
                        </div>
                        <div class="mb-3">
                            <label for="">Product Price:</label>
                            <input type="number" name="price" class="form-control" value="<?=$product['price'];?>">
                        </div>
                        <div class="mb-3">
                            <label for="">Choose Category:</label>
                            <select name="category_name" class="form-control" aria-label="Default select example">
                                <?php 
                                    $db_cat = new Category();
                                    $categories = $db_cat->getAll();
                                    foreach ($categories as $category):
                                ?>
                                <option value="<?= $category['id']; ?>"
                                    <?= ($product['category_id'] == $category['id']) ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($category['name']); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class=" mb-3">
                            <label for="">Choose Brand:</label>
                            <select name="brand_name" class="form-control" aria-label="Default select example">
                                <?php 
                                    $db_brand = new Brand();
                                    $brands = $db_brand->getAll();
                                    foreach ($brands as $brand):
                                ?>
                                <option value="<?= $brand['id']; ?>"
                                    <?= ($product['brand_id'] == $brand['id']) ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($brand['name']); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>


                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <label for="exampleInputEmail1" class="form-label">Description Product:</label>
                            <textarea class="form-control" name="description"
                                id="floatingTextarea"><?=$product['description'];?> </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Count Product:</label>
                            <input type="text" name="stock_qty" value="<?=$product['stock_qty'];?>" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>

                        <div>
                            <img src="./assets/image/<?= $product['image'] ?>" alt="Product Image"
                                class="img-thumbnail border border-dark" style="max-width: 100px;">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Image Product:</label>
                            <input type="file" name="image" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-success" type="submit"> Send </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>