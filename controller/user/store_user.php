<?php
// namespace Controller\user;
// use Exception;
// use Model\User;



// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     foreach ($_POST as $key => $value) {
//         $key=htmlspecialchars(trim($value));
//     }


//     $userModel = new User();
//     $name= $_POST['name'];
//     $email= $_POST['email'];
//     $password=$_POST['password'];
//     $role_id=$_POST['role_id'];



//     try {
//         $userModel->create($name,$email,$password,$role_id);
//         $_SESSION['success'] = "the user is created successfully";
//         if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'admin_index.php') !== false) {
//             header("location:./admin_index.php?page=user");
//         } else {
//             header("location:./index.php");
//         }
//     } catch (Exception $e) {
//         $_SESSION['error'] = "Sorry !! the user isn't created .";
//     }
// } else {
//     die("ERROR 404-NOT FOUND");
// }