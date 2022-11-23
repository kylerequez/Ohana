<?php
require_once dirname(__DIR__) . '/models/Account.php';
require_once dirname(__DIR__) . '/models/Cart.php';

class CartController
{
    private ?CartServices $services = null;
    private ?LogServices $logservices = null;

    public function __construct(CartServices $services, ?LogServices $logServices)
    {
        $this->services = $services;
        $this->logservices = $logServices;
    }

    public function processRequest(string $method, ?int $id): void
    {
        if ($id) {
            $this->processResourceRequest($method, $id);
        } else {
            $this->processCollectionRequest($method);
        }
    }

    public function processResourceRequest(string $method, int $id): void
    {
        switch($method) {
            case "GET":
                $this->services->addToCart("REHOMING", $id);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                break;
            case "POST":
                $this->services->deleteOrder($id);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                break;
        }
    }

    public function processCollectionRequest(string $method): void
    {
        switch($method) {
            case "GET":
                header("Location: http://localhost/pawcart");
                break;
            case "POST":
                break;
        }
    }
}
