<?php
require 'Validator.php';



$config = require ('config.php');
$db = new Database($config['database']);

$floor = $db->query('select * from floors where floor_id = :floor_id', [
    'floor_id' => $_GET['floor_id']
])->find();

$heading = "Floor: " . $floor['floor_number'];

$units = $db->query('select units.unit_id, units.unit_number, unit_types.unit_type, units.availability from units LEFT JOIN unit_types on units.type_id = unit_types.type_id where units.floor_id = :floor_id', [
    'floor_id' => $_GET['floor_id']
])->get();

$unitsRowCountToDelete = $db->query('select units.unit_id, units.unit_number, unit_types.unit_type, units.availability from units LEFT JOIN unit_types on units.type_id = unit_types.type_id where units.floor_id = :floor_id', [
    'floor_id' => $_GET['floor_id']
])->getRowCount();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['saveFloorNum'])) {
        $errors = [];


        if (Validator::string($_POST['floorNum'], 50)) {

            $errors['body'] = 'Required!';

        }


        if (empty($errors)) {
            $db->query('UPDATE floors SET floor_number = :floorNum where floor_id = :floor_id', [
                'floorNum' => $_POST['floorNum'],
                'floor_id' => $_GET['floor_id']
            ]);

            $toFloor = $_GET["floor_id"];
            header("Location: /floor?floor_id={$toFloor}&edit_floor_msg=true");
            exit();
        }
    }

    if (isset($_POST['deleteFloor'])) {

        if ($unitsRowCountToDelete > 0) {
            $preventRowDeleteMessage = "You can only delete floors with no units. Empty your units first!";
            $toFloor = $_GET["floor_id"];
            header("Location: /floor?floor_id={$toFloor}&not_delete_floor_msg=true");
        } else {

            $db->query('DELETE from floors where floor_id = :floor_id', [
                'floor_id' => $_GET['floor_id']
            ]);

            header("Location: /floors?delete_floor_msg=true");
            exit();
        }

    }

}


require 'views/floor.view.php';