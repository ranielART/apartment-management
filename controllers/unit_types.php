<?php
require 'Validator.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("location: /unauthorizedAccess");
    exit();
}


$heading = 'Unit Types';

$config = require ('config.php');
$db = new Database($config['database']);

$unitTypes = $db->query('SELECT * FROM unit_types')->get();
$unitTypesRowCount = $db->query('SELECT * FROM unit_types')->getRowCount();


require 'views/unit_types.view.php';