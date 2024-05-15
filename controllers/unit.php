<?php
require 'Validator.php';


$config = require ('config.php');
$db = new Database($config['database']);

$unit = $db->query('Select * from units where unit_id = :unit_id', [
    'unit_id' => $_GET['unit_id']
])->find();

$tenantsInUnit = $db->query('SELECT tenants.*, units.unit_number from tenants LEFT JOIN units on tenants.unit_id = units.unit_id WHERE tenants.unit_id = :unit_id', [

    'unit_id' => $_GET['unit_id']

])->get();

$heading = 'Unit: ' . $unit['unit_number'];

require 'views/unit.view.php';