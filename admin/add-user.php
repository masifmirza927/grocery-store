<?php require_once("./auth.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Add User</title>

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
                    <h3> <i class="fa fa-plus text-success"></i> Add User</h3>
                </div>
                <div class="col-md-8">
                    <?php

                    if (!empty($_SESSION['success'])) {
                        $msg = $_SESSION['success'];
                        echo " <div class='alert alert-success alert-dismissible fade show credErr'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                            </button> <strong>Congratulation! </strong> $msg</div>";
                    }
                    unset($_SESSION['success']);


                    if (!empty($_SESSION['error'])) {
                        $msg = $_SESSION['error'];
                        echo " <div class='alert alert-danger alert-dismissible fade show credErr'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                            </button> <strong>Warning! </strong> $msg</div>";
                    }
                    unset($_SESSION['error']);

                    if (!empty($_SESSION['imgErr'])) {
                        $msg = $_SESSION['imgErr'];
                        echo " <div class='alert alert-danger alert-dismissible fade show credErr'>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span>
                            </button> <strong>Warning! </strong> $msg</div>";
                    }
                    unset($_SESSION['imgErr']);

                    ?>
                </div>
            </div>
            <hr>

            <div class="form-container">
                <form action="./add-user-qry.php" method="POST" enctype="multipart/form-data" class="row">

                    <div class="col-lg-4 mb-2">
                        <label class="form-label" for="name">Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter here..." required>
                    </div>


                    <div class="col-lg-4 mb-2">
                        <label class="form-label" for="email">Email <span class="text-danger">*</span>
                        </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter here..." required>
                    </div>

                    <div class="col-lg-4 mb-2">
                        <label class="form-label" for="mobile">Mobile <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter here..." required>
                    </div>

                    <div class="col-lg-4">
                        <label class="form-label" for="password">Password <span class="text-danger">*</span>
                        </label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter here..." required>
                    </div>

                    <div class="col-lg-4">
                        <label class="form-label" for="address">Address <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter here..." required>
                    </div>


                    <div class="col-lg-4 mb-2">
                        <label class="form-label" for="image">Image <span class="text-danger">*</span>
                        </label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Enter here..." required>
                    </div>

                    <div class="col-lg-12 mb-2">
                        <label class="form-label" for="des">Description <span class="text-danger">*</span>
                        </label>
                        <textarea name="description" class="form-control" id="des" rows="3"></textarea>
                    </div>

                    <div class="offset-8 col-lg-4 mb-2">
                        <label for=""></label>

                        <button class="btn btn-success text-white btn-lg mt-2 w-100" name='add-user'> <i class="fa fa-plus"></i> Add User</button>
                    </div>

                </form>
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
                $(".uploadingErr").remove();
            }, 3000);


            setTimeout(function() {
                $(".credErr").remove();
            }, 3000);

        })
    </script>



</body>

</html>