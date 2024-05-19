<?php

$heading = 'Dashboard';

$config = require ('config.php');
$db = new Database($config['database']);


$numOfFloors = $db->query('SELECT * FROM floors where isActive = 1')->getRowCount();
$numOfUnits = $db->query('SELECT * FROM units where isActive = 1')->getRowCount();
$numOfTenants = $db->query('SELECT * FROM tenants where isActive = 1')->getRowCount();
$numOfTypes = $db->query('SELECT * FROM unit_types')->getRowCount();


require 'views/dashboard.view.php';