<?php 

use Model\Role;
use Model\User;




?>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                <th>Email</th>
                <th>Roles</th>
                <th>Controls</th>

            </tr>
        </thead>
        <tbody>
            <?php
                $userModel = new User();
                $users=$userModel->getAll();
                foreach ($users as $user):
            ?>
            <tr>
                <td><?=$user['id']?></td>
                <td><?=$user['name']?></td>
                <td><?=$user['email']?></td>
                <td><?php
                $id=$user['role_id'];
                $userModel=new Role();
                $role=$userModel->getById($id);
                echo $role['name'];
                ?>
                </td>


                <td class="d-flex ">

                    <form action="admin_index.php?page=delete_user" method="POST">
                        <input type="hidden" name="id" value="<?=$user['id']?>">
                        <button class="btn btn-danger btn-sm m-1">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ;?>
        </tbody>
    </table>
    <a href=" admin_index.php?page=add_user" class="btn btn-success">Add New user</a>

</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>