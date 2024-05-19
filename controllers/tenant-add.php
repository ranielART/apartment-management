<?php

require 'Validator.php';



$config = require ('config.php');
$db = new Database($config['database']);

$heading = 'Tenant';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['addTenant'])) {
        $errors = [];

        if (Validator::string($_POST['tenantName'], 100)) {

            $errors['body'] = 'Required!';

        }

        if (Validator::string($_POST['tenantAge'], 50)) {

            $errors['tenantAge'] = 'Required!';

        }

        if (Validator::string($_POST['moveInDate'], 50)) {

            $errors['moveInDate'] = 'Required!';

        }

        if (Validator::string($_POST['contactNumber'], 50)) {

            $errors['contactNumber'] = 'Required!';

        }

        if (Validator::string($_POST['address'], 255)) {

            $errors['address'] = 'Required!';

        }

        // if (Validator::string($_POST['eName'], 50)) {

        //     $errors['eName'] = 'Required!';

        // }

        // if (Validator::string($_POST['eContactNumber'], 50)) {

        //     $errors['eName'] = 'Required!';

        // }

        // if (Validator::string($_POST['eAddress'], 50)) {

        //     $errors['eAddress'] = 'Required!';

        // }

        if (empty($errors)) {

            $db->query('INSERT INTO units(unit_number, floor_id, type_id) VALUES(:unit_number, :floor_id, :type_id)', [
                'unit_number' => $_POST['unitNumber'],
                'floor_id' => $_GET['floor_id'],
                'type_id' => $_POST['unitType'],
            ]);

            // $db->query('INSERT INTO units(unit_number, floor_id, type_id) VALUES(:unit_number, :floor_id, :type_id)', [
            //     'unit_number' => $_POST['unitNumber'],
            //     'floor_id' => $_GET['floor_id'],
            //     'type_id' => $_POST['unitType'],
            // ]);


            $toFloor = $_GET["floor_id"];
            header("Location: /floor?floor_id={$toFloor}");


        }
    }


}

require 'views/tenant-add.view.php';