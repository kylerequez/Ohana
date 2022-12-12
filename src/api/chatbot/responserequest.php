<?php
require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../dao/ChatbotDAO.php';
require dirname(__DIR__) . '/../dao/LogDAO.php';
require dirname(__DIR__) . '/../services/ChatbotServices.php';

$dao = new ChatbotDAO($servername, $database, $username, $password);
$services = new ChatbotServices($dao);

$test = json_decode(file_get_contents("php://input"), true);
$query = $test["message"];
$response = $services->getResponse($query);
$message = is_null($response) ? null : $response->getResponse();

echo json_encode([
    "data" => $message
]);
