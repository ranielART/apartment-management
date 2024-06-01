<?php

$heading = 'Tenants';
session_start();

if (!isset($_SESSION['username'])) {
    header("location: /unauthorizedAccess");
    exit();
}

$config = require ('config.php');
$db = new Database($config['database']);

$result = $db->query('SELECT tenants.*, units.unit_number FROM tenants INNER JOIN units ON tenants.unit_id = units.unit_id WHERE tenants.isActive = 1 ORDER BY tenants.tenant_id DESC');

$tenants = $result->get();

if (isset($_GET['tenant_id'])) {
    $tenantsIndividual = $db->query('SELECT tenants.*, units.unit_number, emergency_contacts.* FROM tenants INNER JOIN units ON tenants.unit_id = units.unit_id LEFT JOIN emergency_contacts ON tenants.tenant_id = emergency_contacts.tenant_id WHERE tenants.isActive = 1 AND tenants.tenant_id = :tenant_id ORDER BY tenants.tenant_id DESC ', [
        'tenant_id' => $_GET['tenant_id']
    ])->find();
}


$numOfTenants = $result->getRowCount();


require 'views/tenants.view.php';