<?php
// require_once __DIR__."/../../../models/Category.php";
// require_once __DIR__."/../../../models/Brand.php";
?>
<?php
    $id_categroy= isset($_GET['id']) ? $_GET['id'] : 0;
    $categoryModel=new Category();
    $category=$categoryModel->getById($id_categroy);
    
?>
<section class="py-3 mt-5 mb-5 ms-5" style="width:100%;">
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <form action="admin_index.php?page=update_category" method="post" class="form border my-2 p-3"
                    enctype="multipart/form-data">
                    <div class="mb-3">
                        <h3>Update Category</h3>
                        <input type="hidden" name="id_cat" value="<?= $category['id']?>">
                        <div class="mb-3">
                            <label for="">Category Name:</label>
                            <input type="text" name="name" class="form-control" value="<?= $category['name']?>">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-info form-control" type="submit"> Update Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>