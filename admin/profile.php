<?php require_once("./auth.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Profile - Ogani</title>

    <!-- css-links include -->
    <?php require_once("./includes/css-links.php") ?>

</head>

<body>

    <!-- navbar include -->
    <?php require_once("./includes/navbar.php") ?>

    <!-- sidebar include -->
    <?php require_once("./includes/sidebar.php") ?>

    <div class="content-body">

        <!-- Add and View Users -->
        <?php if ($_SESSION['user_role'] === "admin") {
            echo "
            <div class='row page-titles mx-0'>
            <div class='col p-md-0'>
                <ol class='breadcrumb'>
                    <li class='breadcrumb-item'><a href='add-user.php'>Add <span class='text-success'>User</span></a></li>
                    <li class='breadcrumb-item active'><a href='view-users.php'>View <span class='text-success'>Users</span></a></li>
                </ol>
            </div>
        </div>
            ";
        } ?>



        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column  mb-4">
                                <img class="mx-auto" src="images/avatar/11.png" width="80" height="80" alt="">
                                <div class="media-body text-center">
                                    <h3 class="mb-0"><?= $_SESSION['user_name'] ?></h3>
                                </div>
                            </div>


                            <ul class="card-profile__info">
                                <li class="mb-2"><strong class="text-dark mr-4">Mobile</strong> <span><?= $_SESSION['user_mobile'] ?></span></li>
                                <li class="mb-2"><strong class="text-dark mr-4">Email</strong> <span><?= $_SESSION['user_email'] ?></span></li>
                                <li class="mb-2"><strong class="text-dark mr-4">Address</strong> <span><?= $_SESSION['user_address'] ?></span></li>

                            </ul>

                            <h4>About Me</h4>
                            <p class="text-muted" align='justify'><?= $_SESSION['user_description'] ?></p>

                            <div class="row my-2">
                                <div class="col-12 text-center">
                                    <button class="btn btn-danger px-5">Edit Profile <i class="fa fa-edit"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="#" class="form-profile">
                                <div class="form-group">
                                    <textarea class="form-control" name="textarea" id="textarea" cols="30" rows="2" placeholder="Post a new message"></textarea>
                                </div>
                                <div class="d-flex align-items-center">
                                    <ul class="mb-0 form-profile__icons">
                                        <li class="d-inline-block">
                                            <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-user"></i></button>
                                        </li>
                                        <li class="d-inline-block">
                                            <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-paper-plane"></i></button>
                                        </li>
                                        <li class="d-inline-block">
                                            <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-camera"></i></button>
                                        </li>
                                        <li class="d-inline-block">
                                            <button class="btn btn-transparent p-0 mr-3"><i class="fa fa-smile"></i></button>
                                        </li>
                                    </ul>
                                    <button class="btn btn-success text-white px-3 ml-4">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div> <!--*** Main wrapper end *****-->

    <!-- footer include -->
    <?php require_once("./includes/footer.php")  ?>

    <!-- javascript links include -->
    <?php require_once("./includes/javascript-links.php")  ?>
</body>

</html>