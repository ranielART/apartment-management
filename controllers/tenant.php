<?php

require 'Validator.php';



$config = require ('config.php');
$db = new Database($config['database']);

$heading = 'Edit Tenant';

$tenant = $db->query('SELECT * from tenants where tenant_id = :tenant_id', [
    'tenant_id' => $_GET['tenant_id']
])->find();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['updateTenant'])) {
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

            $db->query('UPDATE `tenants` SET `tenant_name`= :tenant_name, `tenant_age`=:tenant_age, `contact_number`= :contact_number, `address`=:address, `moveIn_date` = :moveIn_date WHERE unit_id = :unit_id AND tenant_id = :tenant_id', [
                'tenant_name' => $_POST['tenantName'],
                'tenant_age' => $_POST['tenantAge'],
                'contact_number' => $_POST['contactNumber'],
                'address' => $_POST['address'],
                'moveIn_date' => $_POST['moveInDate'],
                'unit_id' => $_GET['unit_id'],
                'tenant_id' => $_GET['tenant_id']
            ]);

            $db->query('INSERT INTO emergency_contacts(tenant_id, `name`, contact_number, `address`) VALUES(:tenant_id, :name, :contact_number, :address)', [
                'tenant_id' => $_GET['tenant_id'],
                'name' => $_POST['eName'],
                'contact_number' => $_POST['eContactNumber'],
                'address' => $_POST['eAddress'],
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
            header("Location: /unit?unit_id={$toUnit}&update_tenant_msg=true");
            exit();

        }
    }


}

require 'views/tenant.view.php';