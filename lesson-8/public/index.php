<?php

include $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';
$config = include($_SERVER['DOCUMENT_ROOT'] .'/../config/config.php');
\app\App::call()->run($config);










