<?php
include_once dirname(__DIR__) . '/config/db-config.php';
include_once dirname(__DIR__) . '/models/Config.php';
include_once dirname(__DIR__) . '/dao/ConfigDAO.php';
include_once dirname(__DIR__) . '/services/ConfigServices.php';

$dao = new ConfigDAO($servername, $database, $username, $password);
$services = new ConfigServices($dao);

$domain = $services->getDomainName();
define('DOMAIN_NAME', $domain->getInformation());

$email = $services->getEmail();
$key = $services->getEmailKey();
define('EMAIL_USERNAME', $email->getInformation());
define('EMAIL_KEY', $key->getInformation());

$api = $services->getSemaphoreApiKey();
define('SEMAPHORE_API_KEY', $api->getInformation());