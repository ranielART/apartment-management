<?php
require 'Validator.php';

$heading = 'Add Unit';

$config = require ('config.php');
$db = new Database($config['database']);


$floor = $db->query('select floor_id from floors where floor_id = :floor_id', [
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

            $errors['body'] = 'Required!';

        }


        if (empty($errors)) {
            $db->query('INSERT INTO units(unit_number, floor_id, type_id) VALUES(:unit_number, :floor_id, :type_id)', [
                'unit_number' => $_POST['unitNumber'],
                'floor_id' => $_GET['floor_id'],
                'type_id' => $_POST['unitType'],
            ]);


            $toFloor = $_GET["floor_id"];
            header("Location: /floor?floor_id={$toFloor}");


        }
    }


}


require 'views/unit-add.view.php';