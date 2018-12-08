<?php

define('DATABASE', [
    'HOST' => 'localhost',
    'USER' => 'root',
    'PASS' => '',
    'NAME' => 'play_form_wizard'
]);

require_once __DIR__ . '/Source/Crud/Conn.php';
require_once __DIR__ . '/Source/Crud/Read.php';
require_once __DIR__ . '/Source/Crud/Create.php';