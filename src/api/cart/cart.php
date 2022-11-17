<?php
include_once dirname(__DIR__) . '/../models/Order.php';
include_once dirname(__DIR__) . '/../models/Cart.php';
include_once dirname(__DIR__) . '/../models/PetProfile.php';

if (str_contains($_SERVER["REQUEST_URI"], 'add-to-cart')) {
    $profile = unserialize($_SESSION["profile"]);
    if ($profile->getId() != $id) {
        echo "ERROR";
    }
    $newOrder = new Order("REHOMING", 1, $profile->getId(), $profile->getName(), $profile->getImage(), $profile->getPrice());
    $newOrder->setPetColor($profile->getColor());
    $newOrder->setPetSex($profile->getSex());
    $newOrder->setPetTrait($profile->getTrait());
    $cart = unserialize($_SESSION["cart"]);
    $cart->addToCart($newOrder);
    $_SESSION["msg"] = "The pet was successfully added to the cart!";
    $_SESSION["cart"] = serialize($cart);
} else if (str_contains($_SERVER["REQUEST_URI"], 'delete-item')) {
    $profile = unserialize($_SESSION["profile"]);
    if ($profile->getId() != $id) {
        echo "ERROR";
    }
    $cart = unserialize($_SESSION["cart"]);
    $cart->deleteOrder($id);
    $_SESSION["msg"] = "The pet was successfully deleted.";
    $_SESSION["cart"] = serialize($cart);
}
// print_r($cart);
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
