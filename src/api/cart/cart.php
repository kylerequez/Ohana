<?php
include_once dirname(__DIR__) . '/../models/Order.php';
include_once dirname(__DIR__) . '/../models/Cart.php';
include_once dirname(__DIR__) . '/../models/PetProfile.php';

$profile = unserialize($_SESSION["profile"]);
if ($profile->getId() != $id) {
    echo "ERROR";
}

$newOrder = new Order("REHOMING", 1, $profile->getId(), $profile->getName(), $profile->getImage(), $profile->getPrice());
$cart = unserialize($_SESSION["cart"]);
$cart->addToCart($newOrder);
$_SESSION["cart"] = serialize($cart);
print_r($_SESSION["cart"]);
