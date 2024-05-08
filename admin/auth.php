<?php
session_start();
require_once "db-con.php";

if (!isset($_SESSION['login'])  || $_SESSION['login'] == false) {
    header("location: login.php");
} else {
    $sel_sql = "SELECT * FROM users WHERE id='$_SESSION[user_id]' ";
    $result = mysqli_query($con, $sel_sql);

    $row = mysqli_fetch_assoc($result);

    $_SESSION['user_name'] = $row['name'];
    $_SESSION['user_email'] = $row['email'];
    $_SESSION['user_mobile'] = $row['mobile'];
    $_SESSION['user_address'] = $row['address'];
    $_SESSION['user_description'] = $row['description'];
    $_SESSION['user_role'] = $row['role'];
    $_SESSION['user_image'] = $row['image'];
}
