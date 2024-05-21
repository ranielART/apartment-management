<?php

require 'Validator.php';
session_start();


$config = require ('config.php');
$db = new Database($config['database']);

$heading = 'Edit Tenant';

$tenant = $db->query('SELECT tenants.*, emergency_contacts.* 
FROM tenants 
LEFT JOIN emergency_contacts 
ON tenants.tenant_id = emergency_contacts.tenant_id 
WHERE tenants.tenant_id = :tenant_id', [
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

            $numOfEcontacts = $db->query('SELECT * FROM emergency_contacts WHERE tenant_id = :tenant_id', [
                'tenant_id' => $_GET['tenant_id'],

            ])->getRowCount();

            if ($numOfEcontacts > 0) {
                $db->query('UPDATE `emergency_contacts` SET `name`= :name, `econtact_number`= :contact_number, `eaddress`=:address WHERE tenant_id = :tenant_id', [
                    'name' => $_POST['eName'],
                    'contact_number' => $_POST['eContactNumber'],
                    'address' => $_POST['eAddress'],
                    'tenant_id' => $_GET['tenant_id']
                ]);
            } else {
                $db->query('INSERT INTO emergency_contacts(tenant_id, `name`, econtact_number, `eaddress`) VALUES(:tenant_id, :name, :contact_number, :address)', [
                    'tenant_id' => $_GET['tenant_id'],
                    'name' => $_POST['eName'],
                    'contact_number' => $_POST['eContactNumber'],
                    'address' => $_POST['eAddress'],
                ]);
            }

            $numOfTenantsInUnit = $db->query('SELECT tenants.*, units.unit_number from tenants LEFT JOIN units on tenants.unit_id = units.unit_id WHERE tenants.unit_id = :unit_id AND tenants.isActive = 1', [

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
            header("Location: /unit?floor_id={$_GET['floor_id']}&unit_id={$toUnit}&update_tenant_msg=true");
            exit();

        }
    }


    if (isset($_POST['deleteTenant'])) {
        $db->query('UPDATE `tenants` SET `isActive`= 0 WHERE `tenant_id`= :tenant_id', [
            'tenant_id' => $_GET['tenant_id']
        ]);

        $numOfTenantsInUnit = $db->query('SELECT tenants.*, units.unit_number from tenants LEFT JOIN units on tenants.unit_id = units.unit_id WHERE tenants.unit_id = :unit_id AND tenants.isActive = 1', [

            'unit_id' => $_GET['unit_id']

        ])->getRowCount();

        if ($numOfTenantsInUnit > 0) {
            $db->query('UPDATE `units` SET `availability`= 1 WHERE `unit_id`= :unit_id AND isActive = 1', [

                'unit_id' => $_GET['unit_id']
            ]);
        }

        if ($numOfTenantsInUnit <= 0) {
            $db->query('UPDATE `units` SET `availability`= 0 WHERE `unit_id`= :unit_id AND isActive = 1', [

                'unit_id' => $_GET['unit_id']
            ]);

            $unitsOccupiedCount = $db->query('SELECT * FROM units WHERE floor_id = :floor_id AND `availability` = 1 AND isActive = 1', [
                'floor_id' => $_GET['floor_id']
            ])->getRowCount();


            $db->query('UPDATE `floors` SET `units_occupied` = :units_occupied WHERE `floor_id`= :floor_id AND isActive = 1', [
                'units_occupied' => $unitsOccupiedCount,
                'floor_id' => $_GET['floor_id']
            ]);
        }



        $toUnit = $_GET['unit_id'];
        header("Location: /unit?unit_id={$toUnit}&delete_tenant_msg=true");
        exit();
    }


}

require 'views/tenant.view.php';