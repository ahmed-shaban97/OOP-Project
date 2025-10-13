<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

?>
<section class="py-3 mt-5 mb-5 ms-5" style="width:100%;">
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <form action="admin_index.php?page=store_brand" method="post" class="form border my-2 p-3"
                    enctype="multipart/form-data">
                    <div class="mb-3">
                        <h3>Create Brand</h3>
                        <div class="mb-3">
                            <label for="">Brand Name:</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-info form-control" type="submit"> Add Brand</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>