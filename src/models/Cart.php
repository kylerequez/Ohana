<?php
include_once dirname(__DIR__) . '/models/Order.php';

class Cart
{
    private ?array $cart = null;

    public function __construct()
    {
        $cart = array();
    }

    public function addToCart(Order $newOrder): bool
    {
        if (empty($this->cart)) {
            $this->cart[$newOrder->getPetId()] = $newOrder;
            return true;
        }
        foreach ($this->cart as $key => $order) {
            if ($key == $newOrder->getPetId()) {
                return false;
            }
            $this->cart[$newOrder->getPetId()] = $newOrder;
            return true;
        }
    }

    /**
     * Get the value of id
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setCart($cart)
    {
        $this->cart = $cart;
        return $this;
    }
}
