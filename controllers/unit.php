<?php
require 'Validator.php';


$config = require ('config.php');
$db = new Database($config['database']);


$unit = $db->query('SELECT units.*, unit_types.unit_type FROM units LEFT JOIN unit_types ON units.type_id = unit_types.type_id where unit_id = :unit_id', [
    'unit_id' => $_GET['unit_id']
])->find();

$unitTypes = $db->query('SELECT * FROM unit_types')->get();

$tenantsInUnit = $db->query('SELECT tenants.*, units.unit_number from tenants LEFT JOIN units on tenants.unit_id = units.unit_id WHERE tenants.unit_id = :unit_id', [

    'unit_id' => $_GET['unit_id']

])->get();
$numOfTenantsInUnit = $db->query('SELECT tenants.*, units.unit_number from tenants LEFT JOIN units on tenants.unit_id = units.unit_id WHERE tenants.unit_id = :unit_id', [

    'unit_id' => $_GET['unit_id']

])->getRowCount();

$heading = 'Unit: ' . $unit['unit_number'];

require 'views/unit.view.php';