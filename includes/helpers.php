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