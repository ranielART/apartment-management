<?php
require 'Validator.php';

$heading = 'Add Unit';

$config = require ('config.php');
$db = new Database($config['database']);

$floor = $db->query('select floor_id, total_units from floors where floor_id = :floor_id', [
    'floor_id' => $_GET['floor_id']
])->find();

$unitTypes = $db->query('select * from unit_types')->get();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['addUnit'])) {
        $errors = [];

        if (Validator::string($_POST['unitNumber'], 50)) {

            $errors['body'] = 'Required!';

        }

        if (Validator::string($_POST['unitType'], 100)) {

            $errors['unitType'] = 'Required!';

        }

        if (empty($errors)) {
            $db->query('INSERT INTO units(unit_number, floor_id, type_id) VALUES(:unit_number, :floor_id, :type_id)', [
                'unit_number' => $_POST['unitNumber'],
                'floor_id' => $_GET['floor_id'],
                'type_id' => $_POST['unitType'],
            ]);

            $unitsRowCount = $db->query('SELECT * FROM units WHERE floor_id = :floor_id AND isActive = 1', [
                'floor_id' => $_GET['floor_id']
            ])->getRowCount();

            $unitsOccupiedCount = $db->query('SELECT * FROM units WHERE floor_id = :floor_id AND `availability` = 1 ', [
                'floor_id' => $_GET['floor_id']
            ])->getRowCount();


            $db->query('UPDATE `floors` SET `total_units`= :total_units, `units_occupied` = :units_occupied WHERE `floor_id`= :floor_id AND isActive = 1', [
                'total_units' => $unitsRowCount,
                'units_occupied' => $unitsOccupiedCount,
                'floor_id' => $_GET['floor_id']
            ]);

            $toFloor = $_GET["floor_id"];
            header("Location: /floor?floor_id={$toFloor}");


        }
    }


}


require 'views/unit-add.view.php';