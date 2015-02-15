<?php

/*
 * Battle of the Blues Backend 
 *
 */

//Debug
$_ENV['DATABASE_STRING'] = 'mysql:host=localhost;dbname=botb';
$_ENV['DATABASE_USER'] = 'botb';
$_ENV['DATABASE_PASSWORD'] = 'botb';
//End Debug

require('./botb.php');

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$botb = new BotB($_ENV['DATABASE_STRING'], $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASSWORD']);
echo json_encode($botb->getAPIResult());
