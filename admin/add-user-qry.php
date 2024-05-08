<?php

session_start();
// db connection
require_once "./db-con.php";
require_once "./includes/helpers.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // upload image
    $data = uploadImage("admin-users", $_FILES['image'], 3, "add-user");

    if ($data['errors'] === false) {
        // save info into db
        $imgName = $data['result'];

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO `users`(`name`, `email`, `password`, `mobile`, `address`, `description`, `image`) 
            VALUES ('$_POST[name]','$_POST[email]' ,'$password','$_POST[mobile]','$_POST[address]','$_POST[description]' , '$imgName')";

        if (mysqli_query($con, $query)) {
            $_SESSION['success'] = "Operation Perfomed Successfully...!";
            header("Location:add-user.php");
        } else {
            $_SESSION['error'] = "Something went wrong...!";
            header("Location:add-user.php");
        }
    } else {

        $_SESSION['imgErr'] = "Image uploading Error please Check...!";
        header("Location:add-user.php");
    }
}
