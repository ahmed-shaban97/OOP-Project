<?php
namespace views\admin\users; 

use Model\Role;
// require_once __DIR__."/../../../models/Category.php";
// require_once __DIR__."/../../../models/Brand.php";

?>
<section class="py-3 mt-5 mb-5 ms-5" style="width:100%;">
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <form action="admin_index.php?page=store_user" method="post" class="form border my-2 p-3"
                    enctype="multipart/form-data">
                    <div class="mb-3">

                        <h3>Create User</h3>
                        <div class="mb-3">
                            <label for="">User Name:</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email:</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Phone:</label>
                            <input type="number" name="phone" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="">roles:</label>
                            <select name="role_id" class="form-control" aria-label="Default select example">
                                <?php 
                                    $db_role=new role();
                                    $roles=$db_role->getAll() ;
                                    foreach ($roles as $role):
                                ?>
                                <option value="<?=$role['id']?>"><?=$role['name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-info form-control" type="submit"> Add User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>