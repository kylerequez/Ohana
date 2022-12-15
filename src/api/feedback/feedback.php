<?php
include_once dirname(__DIR__) . '/../config/db-config.php';
include_once dirname(__DIR__) . '/../dao/FeedbackDAO.php';
include_once dirname(__DIR__) . '/../services/FeedbackServices.php';

$dao = new FeedbackDAO($servername, $database, $username, $password);
