<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new AppFactory([
  'port' => 8080,
]);

$app->run();