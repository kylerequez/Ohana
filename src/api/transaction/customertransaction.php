<?php

require dirname(__DIR__) . '/../config/db-config.php';
require dirname(__DIR__) . '/../database/Database.php';

$database = new Database($servername, $database, $username, $password);
