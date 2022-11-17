<?php
include_once dirname(__DIR__) . '/../models/Order.php';
include_once dirname(__DIR__) . '/../models/Cart.php';
include_once dirname(__DIR__) . '/../models/PetProfile.php';

$profile = unserialize($_SESSION["profile"]);
if ($profile->getId() != $id) {
    echo "ERROR";
}

$cart = unserialize($_SESSION["cart"]);
$cart->deleteOrder($id);

// $newOrder = new Order("REHOMING", 1, $profile->getId(), $profile->getName(), $profile->getImage(), $profile->getPrice());
// $newOrder->setPetColor($profile->getColor());
// $newOrder->setPetSex($profile->getSex());
// $newOrder->setPetTrait($profile->getTrait());
// $cart = unserialize($_SESSION["cart"]);
// $cart->addToCart($newOrder);
print_r($cart);
$_SESSION["cart"] = serialize($cart);
