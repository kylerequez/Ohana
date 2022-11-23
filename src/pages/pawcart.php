<!DOCTYPE html>
<html lang="en">

<head>

    <title> PAW CART </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- IMPORTANT FOR RESPONSIVENESS -->
    <meta name="description" content="Kennel business in the philippines that breeds and sells french bulldogs">
    <meta name="keywords" content="Kennel Business, French Bulldogs">
   
    <link rel="stylesheet" href="/Ohana/src/css/pawcart.css">
    <link rel="stylesheet" href="/Ohana/src/css/navbar.css">
  
    <?php include_once 'stylesheets.php'; ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

        @media screen and (min-width: 360px) and (max-width: 929.98px) {}
    </style>
</head>

<body style="background-color: #FAF8F0;">
    <main>
        <!-- REGISTERED USERS NAVIGATION BAR-->
        <?php include_once 'Rnavbar.php'; ?>

        <div class="container-fluid">
            <!-- FULL WIDTH OF THE PAGE - BOOTSTRAP COMPONENT-->
            <img src="/Ohana/src/images/Pages/cartheader.png" class="img-fluid" width="100%" style="margin-top:5%">
            <section class="h-100">
                <div class="container h-100 py-5">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-10">
                            <?php
                            include_once dirname(__DIR__) . '/models/Order.php';
                            include_once dirname(__DIR__) . '/models/PetProfile.php';
                            include_once dirname(__DIR__) . '/models/Cart.php';
                            if (!isset($_SESSION["cart"])) {
                                $_SESSION["cart"] = serialize(new Cart());
                            }
                            $cart = unserialize($_SESSION["cart"]);
                            if (empty($cart->getCart())) {
                            ?>
                                <div class="form__row text-center mb-5">
                                    <p style="font-size:20px;">Your cart seems to be empty. &nbsp;<a class="link" name="login" style="text-decoration:none; color:#db6551" href="/services">Add an item now!</a></p>
                                </div>

                                <?php
                                if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
                                        unset($_SESSION["msg"]); ?>
                                    </div>
                                <?php
                                    unset($_SESSION["msg"]);
                                }
                            } else {
                                ?>
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h3 class="fw-normal mb-0 text-black"> Order Descripion </h3>
                                </div>
                                <?php
                                if (isset($_SESSION["msg"]) && !empty($_SESSION["msg"])) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo isset($_SESSION["msg"]) ? $_SESSION["msg"] : null;
                                        unset($_SESSION["msg"]); ?>
                                    </div>
                                <?php
                                    unset($_SESSION["msg"]);
                                }
                                foreach ($cart->getCart() as $order) {
                                ?>
                                    <div class="card rounded-3 mb-4">
                                        <div class="card-body p-4">
                                            <div class="row d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($order->getImage()); ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <p class="lead fw-normal mb-2"><?php echo $order->getPetName() ?></p>
                                                    <p><span class="text-muted">Gender: </span><?php echo $order->getPetSex()
                                                                                                ?> <span class="text-muted">Color: </span><?php echo $order->getPetColor()
                                                                                                                                            ?></p>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h5 class="mb-0"><?php echo $order->getPrice() ?></h5>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <form method="POST" action="/delete-item/<?php echo $order->getPetId(); ?>">
                                                        <button type="submit" class="text-danger"><i class="fas fa-trash fa-lg " onclick="return confirm('Are you sure you want to remove this item from your cart?');"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                                <a href="/home"><button type="button" class="btn btn-outline-dark btn-lg me-2"> Back to Home</button></a>
                                <a href="/checkout"><button type="button" name="btn-Payment" class="btn btn-block btn-lg" style="float:right; background-color:#c0b65a; color:white;">
                                        Proceed to Select Payment Method </button></a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            
        </div><!-- END -->
    </main>
    <div id="ohanafooter">
        <?php include_once 'footer.php'; ?>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>