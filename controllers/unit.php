<?php
require 'Validator.php';
session_start();

$config = require ('config.php');
$db = new Database($config['database']);

//Query for heading, units and unit types left join
$unit = $db->query('SELECT units.*, unit_types.unit_type FROM units LEFT JOIN unit_types ON units.type_id = unit_types.type_id WHERE unit_id = :unit_id', [
    'unit_id' => $_GET['unit_id']
])->find();

//For dropdown/selecet options
$unitTypes = $db->query('SELECT * FROM unit_types')->get();

//Tenants data per unit
$tenantsInUnit = $db->query('SELECT tenants.*, units.unit_number from tenants LEFT JOIN units on tenants.unit_id = units.unit_id WHERE tenants.unit_id = :unit_id AND tenants.isActive = 1', [

    'unit_id' => $_GET['unit_id']

])->get();

//Number of tenants in a unit row count
$numOfTenantsInUnit = $db->query('SELECT tenants.*, units.unit_number from tenants LEFT JOIN units on tenants.unit_id = units.unit_id WHERE tenants.unit_id = :unit_id AND tenants.isActive = 1', [

    'unit_id' => $_GET['unit_id']

])->getRowCount();



$heading = 'Unit: ' . $unit['unit_number'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['saveUnit'])) {
        $errors = [];


        if (Validator::string($_POST['unitNum'], 50)) {

            $errors['body'] = 'Required!';

        }

        if (empty($errors)) {
            $db->query('UPDATE units SET unit_number = :unitNum, type_id = :type_id WHERE unit_id = :unit_id', [
                'unitNum' => $_POST['unitNum'],
                'type_id' => $_POST['unitType'],
                'unit_id' => $_GET['unit_id']
            ]);

            $toUnit = $_GET["unit_id"];
            header("Location: /unit?floor_id={$_GET['floor_id']}&unit_id={$toUnit}&edit_unit_msg=true");
            exit();
        }
    }

    if (isset($_POST['deleteUnit'])) {

        if ($numOfTenantsInUnit > 0) {
            $preventRowDeleteMessage = "You can only delete units with no tenants. Empty your tenats first!";
            $toUnit = $_GET["unit_id"];
            header("Location: /unit?unit_id={$toUnit}&not_delete_unit_msg=true");
        } else {

            $db->query('UPDATE units SET isActive = 0 WHERE unit_id = :unit_id', [
                'unit_id' => $_GET['unit_id']
            ]);

            $numOfUnits = $db->query('SELECT * from units where floor_id = :floor_id AND isActive = 1', [

                'floor_id' => $_GET['floor_id']

            ])->getRowCount();

            $numOfOccupiedUnits = $db->query('SELECT * from units where floor_id = :floor_id AND isActive = 1 AND `availability` = 1', [

                'floor_id' => $_GET['floor_id']

            ])->getRowCount();

            $db->query('UPDATE floors SET total_units = :total_units, units_occupied = :units_occupied WHERE floor_id = :floor_id', [
                'total_units' => $numOfUnits,
                'units_occupied' => $numOfOccupiedUnits,
                'floor_id' => $_GET['floor_id']
            ]);

            $numOfTenantsInUnit = $db->query('SELECT tenants.*, units.unit_number from tenants LEFT JOIN units on tenants.unit_id = units.unit_id WHERE tenants.unit_id = :unit_id', [

                'unit_id' => $_GET['unit_id']

            ])->getRowCount();



            $toFloor = $_GET["floor_id"];
            header("Location: /floor?floor_id={$toFloor}&delete_unit_msg=true");
            exit();
        }

    }

}



require 'views/unit.view.php';