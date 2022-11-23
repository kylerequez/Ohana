<?php
require dirname(__DIR__) . '/Ohana/src/config/db-config.php';
require dirname(__DIR__) . '/Ohana/src/database/Database.php';
require dirname(__DIR__) . '/Ohana/src/dao/ChatbotDAO.php';
require dirname(__DIR__) . '/Ohana/src/dao/LogDAO.php';
require dirname(__DIR__) . '/Ohana/src/services/ChatbotServices.php';

$database = new Database($servername, $database, $username, $password);
$dao = new ChatbotDAO($database);
$services = new ChatbotServices($dao);

$test = json_decode(file_get_contents("php://input"), true);
$query = $test["message"];
$response = $services->getResponse($query);

$message = is_null($response) ? null : $response->getResponse();
echo json_encode([
    "data" => $message
]);

// DONT REMOVE 