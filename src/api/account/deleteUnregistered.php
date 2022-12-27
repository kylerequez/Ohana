<?php

include_once dirname(__DIR__) . '/../config/db-config.php';
include_once dirname(__DIR__) . '/../dao/AccountDAO.php';
include_once dirname(__DIR__) . '/../services/AccountServices.php';

$dao = new AccountDAO($servername, $database, $username, $password);
$services = new AccountServices($dao);

if ($services->deleteUnregisteredAccounts()) {
    echo 'Successfully deleted unregistered accounts from database.';
} else {
    echo 'There was an error in deleting the unregistered accounts from database.';
}
