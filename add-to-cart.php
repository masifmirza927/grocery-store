<?php

    include_once "./includes/db-con.php";
    include_once "./includes/helpers.php";

    if(isset($_POST["pid"])){
        $pid = $_POST["pid"];
        $qty = $_POST["qty"];
        $customer_id = 1;

        // get product details
        $record = getProducts($con, null, $pid);
        $product = mysqli_fetch_assoc($record);

        // check this logged in customer has any active order

        $order = getOrderByCustomer($con,1);

        // if logged in customer don't have pending or means it's his new order
        if(empty($order)) {
            // insert new order details
            createOrder($con, $customer_id, $product, $qty);
        }

        // if logged in customer has pending/active order
        if(!empty($order)) {
            updateOrder($con, $order, $product, $qty);
        }


        $order_items = getOrderItemsByOrderId($con, $order['id']);
        echo count($order_items);
    }