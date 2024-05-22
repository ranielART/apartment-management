<?php

require 'Validator.php';

$heading = 'Edit Type';
session_start();


$config = require ('config.php');
$db = new Database($config['database']);

$unitType = $db->query('SELECT * FROM unit_types WHERE type_id = :type_id', [
    'type_id' => $_GET['type_id']
])->find();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['updateType'])) {
        $errors = [];

        if (Validator::string($_POST['unitType'], 50)) {

            $errors['unitType'] = 'Required!';

        }

        if (Validator::string($_POST['price'], 100)) {

            $errors['price'] = 'Required!';

        }

        if (Validator::string($_POST['capacity'], 100)) {

            $errors['capacity'] = 'Required!';

        }
        if (Validator::string($_POST['rooms'], 100)) {

            $errors['rooms'] = 'Required!';

        }
        if (Validator::string($_POST['bathrooms'], 100)) {

            $errors['bathrooms'] = 'Required!';

        }
        if (Validator::string($_POST['dimensions'], 100)) {

            $errors['dimensions'] = 'Required!';

        }


        if (empty($errors)) {
            $db->query('UPDATE unit_types SET unit_type = :unit_type, rent_price = :rent_price, capacity = :capacity, total_rooms = :total_rooms, total_bathrooms = :total_bathrooms, dimensions = :dimensions WHERE type_id = :type_id', [
                'unit_type' => $_POST['unitType'],
                'rent_price' => $_POST['price'],
                'capacity' => $_POST['capacity'],
                'total_rooms' => $_POST['rooms'],
                'total_bathrooms' => $_POST['bathrooms'],
                'dimensions' => $_POST['dimensions'],
                'type_id' => $_GET['type_id']
            ]);


            header("Location: /unitTypes?type_edit_msg=true");
            exit();

        }
    }


}

require 'views/unit_types_edit.view.php';