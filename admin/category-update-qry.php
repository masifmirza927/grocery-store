<?php
require_once("./auth.php");

require_once("./db-con.php");
require_once "./includes/helpers.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get data from form...
    $category = $_POST['category'];
    $category_id = $_POST['id'];


    // check if image is update or not
    if (empty($_FILES['new_image']['name'])) {
        $name = $_POST['old_image'];
    } else {
        $data = uploadImage("categories", $_FILES['new_image'], 3, "categories");

        if ($data['errors'] === false) {
            $name = $data['result'];
        }
    }

    // update qry run here....

    $query = "UPDATE `categories` SET `category`='$category',`image`='$name' WHERE `id`='$category_id'";

    if (mysqli_query($con, $query)) {

        $_SESSION['success'] = "Category has been added successfully...!";
        header("Location:categories.php");
    } else {
        $_SESSION['error'] = "Category has not been updated...!";
        header("Location:categories.php");
    }
}


//exit;
