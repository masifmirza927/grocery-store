<?php


    function pp($data) {
        echo "<pre>"; print_r($data); echo "</pre>";
        //exit;
    }

    function getCategories($con) {

        $sql = "SELECT * FROM categories";
        $result = mysqli_query($con, $sql);
        return $result;
    }

    function getCategroyById($con, $id) {
        $sql = "SELECT * FROM categories WHERE id = $id";
        $result = mysqli_query($con, $sql);
        $categroy = mysqli_fetch_assoc($result);
        return $categroy;
    }

    function getProducts($con, $category = null, $id = null) {

        $sql = "SELECT * FROM products ";

            if($category != null) {
                $sql .= "WHERE category = '$category' ";
            }

            if($id != null && $category != null) {
                $sql .= "AND id = '$id' ";
            } else if($id != null && $category == null) {
                $sql .= "WHERE id = '$id' ";
            }

            $result = mysqli_query($con, $sql);

            //@todo  check if products are null then return false or null

            return $result;
    }


    function getImageUrl($folder, $image) {
        return "admin/images/$folder/$image";
    }


    // get order of customer
    function getOrderByCustomer($con, $id)
    {
        $sql = "SELECT * FROM orders WHERE customer_id = $id AND status = 'pending' ";
        $result = mysqli_query($con, $sql);
        $order = mysqli_fetch_assoc($result);
        return $order;
    }
    // get order all items by order_id
    function getOrderItemsByOrderId($con, $order_id) {
        $sql = "SELECT * FROM order_items WHERE order_id = $order_id";
        $result = mysqli_query($con, $sql);
        return mysqli_fetch_all($result);
    }



    // create new order
    function createOrder($con, $customer_id, $product, $qty)
    {
        $total_price = $product['unit_price'] * $qty;

        $order_sql = "INSERT INTO `orders` (`id`, `customer_id`, `grand_total`, `status`) VALUES (NULL, $customer_id, $total_price, 'pending') ";
        mysqli_query($con, $order_sql);

        // get last order id
        $order_id = mysqli_insert_id($con);

        // create products / items
        $pid = $product['id'];
        $uprice = $product['unit_price'];

        $item_sql = "INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `unit_price`, `quantity`, `total_price`) VALUES (NULL, $order_id, $pid, $uprice, $qty, $total_price) ";
        mysqli_query($con, $item_sql);

        return $order_id;

    }


    // get order item/product by id
    function getOrderItemById($con, $order_id, $pid) {
        $sql = "SELECT * FROM order_items WHERE product_id = $pid AND order_id = $order_id ";
        $result = mysqli_query($con, $sql);
        $order_item = mysqli_fetch_assoc($result);
        return $order_item;
    }



// update order with products
    function updateOrder($con, $order, $product, $qty)
    {
        $order_id = $order['id'];
        $pid = $product['id'];
        $uprice = $product['unit_price'];

        // check if product is already in cart then update its quantity.
        $item = getOrderItemById($con, $order_id, $pid);
        if(empty($item)) {
            // inserting new item in order
            $total_price = $product['unit_price'] * $qty;
            $item_sql = "INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `unit_price`, `quantity`, `total_price`) VALUES (NULL, $order_id, $pid, $uprice, $qty, $total_price) ";
            mysqli_query($con, $item_sql);

        } else {
            // updating existing item quantity
            $qty_new = $qty + $item['quantity'];
            $total_price_new = $product['unit_price'] * $qty_new;

            $usql = "UPDATE `order_items` SET `quantity` = $qty_new, `total_price`= $total_price_new WHERE `order_items`.`product_id` = $pid;";
            mysqli_query($con, $usql);
        }


        return $order_id;
    }


    // get cart items
    function getCart($con) {

        // get active order by logged in user
        $user_id = 1;
        $sql = "SELECT * FROM orders WHERE customer_id = $user_id AND status = 'pending' ";
        $result = mysqli_query($con, $sql);
        $order = mysqli_fetch_assoc($result);
        $data = null;
        if(!empty($order)) {
            // get order items
            $sql_items = "SELECT order_items.*, products.name, products.image 
                            FROM order_items 
                            LEFT JOIN products ON order_items.product_id = products.id   
                            WHERE order_items.order_id = $order[id]";

            $result_items = mysqli_query($con, $sql_items);
            //$order_items = mysqli_fetch_all($result_items, MYSQLI_ASSOC);
            //pp($order_items);

            $data = [
                'order' => $order,
                'items' => $result_items
            ];
            return $data;
        }
        return $data;
    }

    // remove item from cart
    function removeItem($con, $id) {
        // remove item from order_items table
        $sql = "DELETE FROM order_items WHERE `order_items`.`id` = $id";
        mysqli_query($con, $sql);
        return true;
    }

    function getCartItemsCount($con) {
        $user_id = 1;
        $sql = "SELECT * FROM orders WHERE customer_id = $user_id AND status = 'pending' ";
        $result = mysqli_query($con, $sql);
        $order = mysqli_fetch_assoc($result);
        if(!empty($order)) {
            // get order items
            $sql_items = "SELECT count(*) as total_items FROM order_items  WHERE order_items.order_id = $order[id]";
            $result_items = mysqli_query($con, $sql_items);
            $items_count = mysqli_fetch_assoc($result_items);
            return $items_count;
        }
    }
