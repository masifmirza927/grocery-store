<!DOCTYPE html>
<html lang="zxx">

<head>

    <title>Ogani | Cart</title>

    <!-- css links include -->
    <?php require_once("./includes/css-links.php") ?>

</head>

<body>

    <!-- header-section include -->
    <?php require_once("./includes/header.php") ?>

    <?php
    $data = getCart($con);
    ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $grand_total = 0 ?>
                                <?php if (!empty($data)) { ?>
                                    <?php while ($item = mysqli_fetch_assoc($data['items'])) { ?>
                                        <?php $grand_total += $item['total_price']  ?>
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="<?php echo getImageUrl("product", $item['image']) ?>" height="100" alt="">
                                                <h5><?= $item['name'] ?></h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                $<?= $item['unit_price'] ?>
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" value="<?= $item['quantity'] ?>">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                $<?= $item['total_price'] ?>
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <span class="icon_close" data-id="<?= $item['id'] ?>"></span>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>$<?= $grand_total ?></span></li>
                            <li>Discount <span>10%</span></li>
                            <li>Total <span>$<?php
                                                $disc = $grand_total / 10;
                                                $grand_total = $grand_total - $disc;
                                                echo $grand_total;
                                                ?></span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->


    <!-- footer include -->
    <?php require_once("./includes/footer.php") ?>

    <!-- javascript links include -->
    <?php require_once("./includes/javascript-links.php") ?>

    <script>
        $(document).ready(function() {
            $(".icon_close").on("click", function(e) {
                e.preventDefault();
                let item_id = $(this).data('id');

                Swal.fire({
                    title: "Do you want to Delete item from cart?",
                    showDenyButton: true,
                    confirmButtonText: "Yes, Delete",
                    denyButtonText: `Don't Delete`
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {

                        $.ajax({
                            url: "add-to-cart.php",
                            type: "POST",
                            data: {
                                item_id: item_id
                            },
                            success: function(response) {
                                if (response == true) {
                                    Swal.fire({
                                        position: "top-center",
                                        icon: "success",
                                        title: "Items is successfully deleted from cart",
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then( () => {
                                        window.location.reload();
                                    })
                                }

                            }
                        })


                    } else if (result.isDenied) {
                        Swal.fire("Okay, not deleted", "", "info");
                    }
                });

            })
        })
    </script>
</body>

</html>