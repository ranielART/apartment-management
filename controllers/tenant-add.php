<?php

require 'Validator.php';
session_start();


if (!isset($_SESSION['username'])) {
    header("location: /unauthorizedAccess");
    exit();
}

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

            $errors['body'] = 'Required!';

        }

        if (Validator::string($_POST['moveInDate'], 50)) {

            $errors['body'] = 'Required!';

        }

        if (Validator::string($_POST['contactNumber'], 50)) {

            $errors['body'] = 'Required!';

        }

        if (Validator::string($_POST['address'], 255)) {

            $errors['body'] = 'Required!';

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

            $db->query('INSERT INTO tenants(tenant_name, tenant_age, contact_number, `address`, moveIn_date, unit_id) VALUES(:tenant_name, :tenant_age, :contact_number, :address, :moveIn_date, :unit_id)', [
                'tenant_name' => $_POST['tenantName'],
                'tenant_age' => $_POST['tenantAge'],
                'contact_number' => $_POST['contactNumber'],
                'address' => $_POST['address'],
                'moveIn_date' => $_POST['moveInDate'],
                'unit_id' => $_GET['unit_id']
            ]);



            $numOfTenantsInUnit = $db->query('SELECT tenants.*, units.unit_number from tenants LEFT JOIN units on tenants.unit_id = units.unit_id WHERE tenants.unit_id = :unit_id', [

                'unit_id' => $_GET['unit_id']

            ])->getRowCount();

            if ($numOfTenantsInUnit > 0) {
                $db->query('UPDATE `units` SET `availability`= 1 WHERE `unit_id`= :unit_id AND isActive = 1', [

                    'unit_id' => $_GET['unit_id']
                ]);
            }

            $numOfUnitsOccupied = $db->query('SELECT * FROM units WHERE `availability` = 1 AND isActive = 1 AND floor_id = :floor_id', [
                'floor_id' => $_GET['floor_id']
            ])->getRowCount();

            $db->query('UPDATE `floors` SET `units_occupied`= :units_occupied WHERE `floor_id`= :floor_id', [
                'units_occupied' => $numOfUnitsOccupied,
                'floor_id' => $_GET['floor_id']
            ]);

            $toUnit = $_GET["unit_id"];
            header("Location: /unit?floor_id={$_GET['floor_id']}&unit_id={$toUnit}&add_tenant_msg=true");
            exit();

        }
    }


}

require 'views/tenant-add.view.php';