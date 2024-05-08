<?php

require_once("./db-con.php");

$get_product_id = $_GET['id'];

$product_delete_qry = "DELETE FROM products WHERE id='$get_product_id'";

if (mysqli_query($con, $product_delete_qry)) {
    session_start();
    $_SESSION['success'] = "Operation Performed Successfully...!";
    header("Location:products.php");
}
