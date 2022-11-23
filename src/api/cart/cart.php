<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../database/Database.php';
require dirname(__DIR__) . '/../dao/OrderDAO.php';
require dirname(__DIR__) . '/../dao/PetProfileDAO.php';
require dirname(__DIR__) . '/../services/CartServices.php';
require dirname(__DIR__) . '/../controllers/CartController.php';

$database = new Database($servername, $database, $username, $password);
$dao = new PetProfileDAO($database);
$order = new OrderDAO($database);
$services = new CartServices($dao, $order);
$controller = new CartController($services, null);

if($_SERVER["REQUEST_METHOD"] == "GET" && !isset($id)) {
    $controller->processRequest($_SERVER["REQUEST_METHOD"], null);
} else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($id)) {
    $controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($id)) {
    $controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
}

// if (str_contains($_SERVER["REQUEST_URI"], 'add-to-cart')) {
//     $profile = unserialize($_SESSION["profile"]);
//     if ($profile->getId() != $id) {
//         echo "ERROR";
//     }
//     $newOrder = new Order("REHOMING", 1, $profile->getId(), $profile->getName(), $profile->getImage(), $profile->getPrice());
//     $newOrder->setPetColor($profile->getColor());
//     $newOrder->setPetSex($profile->getSex());
//     $newOrder->setPetTrait($profile->getTrait());
//     $cart = unserialize($_SESSION["cart"]);
//     $cart->addToCart($newOrder);
//     $_SESSION["msg"] = "The pet was successfully added to the cart!";
//     $_SESSION["cart"] = serialize($cart);
// } else if (str_contains($_SERVER["REQUEST_URI"], 'delete-item')) {
//     $profile = unserialize($_SESSION["profile"]);
//     if ($profile->getId() != $id) {
//         echo "ERROR";
//     }
//     $cart = unserialize($_SESSION["cart"]);
//     $cart->deleteOrder($id);
//     $_SESSION["msg"] = "The pet was successfully deleted.";
//     $_SESSION["cart"] = serialize($cart);
// }
// // print_r($cart);
// header('Location: ' . $_SERVER['HTTP_REFERER']);
// exit;
