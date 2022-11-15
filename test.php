<?php

require_once dirname(__DIR__) . '/Ohana/src/vendor/autoload.php';

$MessageBird = new \MessageBird\Client('yl20krjnG7QAFeGQ6u0K6Rx2W');
$Message = new \MessageBird\Objects\Message();
$Message->originator = 'TestMessage';
$Message->recipients = array(+639950244626);
$Message->body = 'This is a test message';

$MessageBird->messages->create($Message);
