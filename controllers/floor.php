<?php
require 'Validator.php';



$config = require ('config.php');
$db = new Database($config['database']);

$floor = $db->query('select * from floors where floor_id = :floor_id', [
    'floor_id' => $_GET['floor_id']
])->find();

$heading = "Floor: " . $floor['floor_number'];

require 'views/floor.view.php';