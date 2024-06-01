<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: /unauthorizedAccess");
    exit();
}

$heading = 'Dashboard';



$config = require ('config.php');
$db = new Database($config['database']);


$numOfFloors = $db->query('SELECT * FROM floors where isActive = 1')->getRowCount();
$numOfUnits = $db->query('SELECT * FROM units where isActive = 1')->getRowCount();
$numOfTenants = $db->query('SELECT * FROM tenants where isActive = 1')->getRowCount();
$numOfTypes = $db->query('SELECT * FROM unit_types')->getRowCount();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['logOut'])) {
        session_destroy();

        header("Location: /?logout_success=true");
        exit();
    }
}

require 'views/dashboard.view.php';