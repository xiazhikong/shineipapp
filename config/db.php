<?php

$params = require( __DIR__.'./../params.php');

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname='. $params['DBNAME'],
    'username' => $params['DBUSERNAME'],
    'password' => $params['DBPASSWORD'],
    'charset' => 'utf8mb4',
];
