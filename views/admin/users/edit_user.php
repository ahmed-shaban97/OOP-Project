<?php

namespace views\admin\users; 
use Model\User;
use Model\Role;
    $id_user= isset($_GET['id']) ? $_GET['id'] : 0;
    $userModel=new User();
    $roleModel=new Role();

    $user=$userModel->getById($id_user);
    $role=$roleModel->getAll();

?>

<section class="py-3" style="width:100%;">
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <form action="admin_index.php?page=update_product" method="POST" class="form border my-2 p-3"
                    enctype="multipart/form-data">
                    <div class="mb-3">

                        <h3>Update User</h3>
                        <input type="hidden" name="id" value="<?=$_GET['id']?>">
                        <div class="mb-3">
                            <label for="">User Name:</label>
                            <input type="text" name="name" class="form-control" value="<?=$user['name'];?>">
                        </div>
                        <div class="mb-3">
                            <label for="">Email:</label>
                            <input type="email" name="email" class="form-control" value="<?=$user['email'];?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="">Choose Roles:</label>
                            <select name="category_name" class="form-control" aria-label="Default select example">
                                <?php 
                                    $db_role = new Role();
                                    $roles = $db_role->getAll();
                                    foreach ($roles as $role):
                                ?>
                                <option value="<?= $role['id']; ?>"
                                    <?= ($user['category_id'] == $role['id']) ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($role['name']); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Phone:</label>
                            <input type="number" name="phone" value="<?=$user['phone'];?>" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-success" type="submit"> Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>