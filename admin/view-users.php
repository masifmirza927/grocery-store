<?php require_once("./auth.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>View Users</title>

    <!-- css-links include -->
    <?php require_once("./includes/css-links.php") ?>

</head>

<body>

    <!-- navbar include -->
    <?php require_once("./includes/navbar.php") ?>

    <!-- sidebar include -->
    <?php require_once("./includes/sidebar.php") ?>

    <div class="content-body p-3">

        <!-- view categories container -->
        <div class="container mt-3 bg-white p-4">
            <div class="row">
                <div class="col-md-4">
                    <h3> <i class="fa fa-eye text-success"></i>View Users</h3>
                </div>
                <div class="col-md-8">
                    <?php

                    if (!empty($_SESSION['success'])) {
                        $msg = $_SESSION['success'];
                        echo " <div class='alert alert-success alert-dismissible fade show notification'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                            </button> <strong>Congratulation! </strong> $msg</div>";
                    }
                    unset($_SESSION['success']);
                    ?>

                </div>
            </div>

            <hr>

            <div class="d-flex justify-content-end">
                <a href="./add-products.php" class="btn btn-success text-white"><i class="fa fa-plus"></i> Add Proudcts</a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered zero-configuration">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php

                        require_once("./db-con.php");

                        $get_users = "SELECT * FROM users";

                        $result = mysqli_query($con, $get_users);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {


                        ?>

                                <tr>
                                    <td><img src="./images/admin-users/<?php echo $row['image'] ?>" alt="Product Image" height="60px"></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['mobile'] ?></td>
                                    <td><?= $row['address'] ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-success text-white dropdown-toggle" data-toggle="dropdown">Actions</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"><i class="fa fa-edit"></i> Edit</a>
                                                <a class="dropdown-item" href="product-delete-qry.php?id=<?= $row['id'] ?>"><i class="fa fa-trash"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                        <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>

        </div>


    </div> <!--*** Main wrapper end *****-->

    <!-- footer include -->
    <?php require_once("./includes/footer.php")  ?>

    <!-- javascript links include -->
    <?php require_once("./includes/javascript-links.php")  ?>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".notification").remove();
            }, 3000);

        })
    </script>


</body>

</html>