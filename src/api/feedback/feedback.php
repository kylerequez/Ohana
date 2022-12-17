<?php
include_once dirname(__DIR__) . '/../config/db-config.php';
include_once dirname(__DIR__) . '/../dao/FeedbackDAO.php';
include_once dirname(__DIR__) . '/../services/FeedbackServices.php';
include_once dirname(__DIR__) . '/../controllers/FeedbackController.php';

$dao = new FeedbackDAO($servername, $database, $username, $password);
$services = new FeedbackServices($dao);
$controller = new FeedbackController($services);

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($id)) {
    $controller->processRequest($_SERVER['REQUEST_METHOD'], null);
}
