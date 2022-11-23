<?php 
require_once dirname(__DIR__) . '/models/PetProfile.php';
require_once dirname(__DIR__) . '/models/Order.php';
class CartServices
{
    private ?PetProfileDAO $dao = null;
    private ?OrderDAO $order = null;

    public function __construct(PetProfileDAO $dao, OrderDAO $order)
    {
        $this->dao = $dao;
        $this->order = $order;
    }

    public function searchOrderByPetId(string $id): mixed
    {
        return $this->order->searchByPetId($id);
    }

    public function addToCart(string $type, string $id): bool
    {
        $cart = unserialize($_SESSION["cart"]);
        if(!is_null($this->order->searchByPetId($id))){
            $_SESSION["msg"] = "The pet is unavailable!";
            return false;
        }
        $profile = $this->dao->searchById($id);
        if(is_null($profile)) {
            $_SESSION["msg"] = "The pet does not exist in the database!";
            return false;
        }
        $order = new Order($type, null, $profile->getId(), $profile->getName(), $profile->getImage(), $profile->getPrice());
        if(!$cart->addToCart($order)){
            $_SESSION["msg"] = "You already have this item inside your cart.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully added an item inside your cart.";
        $_SESSION["cart"] = serialize($cart);
        return true;
    }

    public function deleteOrder(string $id): bool
    {
        $cart = unserialize($_SESSION["cart"]);
        if(!$cart->deleteOrder($id)){
            $_SESSION["msg"] = "The item was not deleted inside the cart.";
            return false;
        }
        $_SESSION["msg"] = "You have successfully delete the item inside your cart.";
        $_SESSION["cart"] = serialize($cart);
        return true;
    }
}