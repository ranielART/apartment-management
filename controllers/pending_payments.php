<?php

$heading = 'Pending Payments';

$config = require ('config.php');
$db = new Database($config['database']);

$bills = $db->query('SELECT  bills.*, units.* from bills LEFT JOIN units ON bills.unit_id = units.unit_id WHERE units.isActive = 1 AND bills.isPaid = 0 ORDER BY bills.bill_id DESC')->get();


if (isset($_GET['bill_id'])) {
    $billPerUnit = $db->query('SELECT  bills.*, units.* from bills LEFT JOIN units ON bills.unit_id = units.unit_id WHERE units.isActive = 1 AND bills.isPaid = 0 AND bills.bill_id = :bill_id', [
        'bill_id' => $_GET['bill_id']
    ])->find();
}




require 'views/pp.view.php';