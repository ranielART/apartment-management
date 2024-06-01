<?php

require 'Validator.php';

$heading = 'Unit Type';
session_start();

if (!isset($_SESSION['username'])) {
    header("location: /unauthorizedAccess");
    exit();
}

$config = require ('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['addType'])) {
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

        if (isset($_POST['unitType'])) {
            $unitsTypeExist = $db->query('SELECT * FROM unit_types WHERE unit_type = :unit_type', [
                'unit_type' => $_POST['unitType']
            ])->getRowCount();

            if ($unitsTypeExist >= 1) {
                $errors['alreadyExist'] = 'Required!';
            }
        }





        if (empty($errors)) {


            $db->query('INSERT INTO unit_types(unit_type, rent_price, capacity, total_rooms, total_bathrooms, dimensions) VALUES(:unit_type, :rent_price, :capacity, :rooms, :bathrooms, :dimensions)', [
                'unit_type' => $_POST['unitType'],
                'rent_price' => $_POST['price'],
                'capacity' => $_POST['capacity'],
                'rooms' => $_POST['rooms'],
                'bathrooms' => $_POST['bathrooms'],
                'dimensions' => $_POST['dimensions'],
            ]);


            header("Location: /unitTypes?type_add_msg=true");
            exit();

        }
    }


}

require 'views/unit_types_add.view.php';