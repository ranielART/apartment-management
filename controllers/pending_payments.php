<?php

$heading = 'Pending Payments';
session_start();

$config = require ('config.php');
$db = new Database($config['database']);

$bills = $db->query('SELECT  bills.*, units.* from bills LEFT JOIN units ON bills.unit_id = units.unit_id WHERE units.isActive = 1 AND bills.isPaid = 0 ORDER BY bills.bill_id DESC')->get();
$numberOfPending = $db->query('SELECT  bills.*, units.* from bills LEFT JOIN units ON bills.unit_id = units.unit_id WHERE units.isActive = 1 AND bills.isPaid = 0 ORDER BY bills.bill_id DESC')->getRowCount();




if (isset($_GET['bill_id'])) {
    $billPerUnit = $db->query('SELECT  bills.*, units.* from bills LEFT JOIN units ON bills.unit_id = units.unit_id WHERE units.isActive = 1 AND bills.isPaid = 0 AND bills.bill_id = :bill_id', [
        'bill_id' => $_GET['bill_id']
    ])->find();

    if (isset($_GET['view_paid_modal'])) {
        $tenants = $db->query('SELECT * FROM tenants WHERE unit_id = :unit_id AND isActive = 1', [
            'unit_id' => $_GET['unit_id']
        ])->get();
    }


}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['paidButton'])) {

        $db->query('UPDATE bills SET isPaid = 1 WHERE bill_id = :bill_id', [
            'bill_id' => $_GET['bill_id']
        ])->get();



        $numberOfPending = $db->query('SELECT  bills.*, units.* from bills LEFT JOIN units ON bills.unit_id = units.unit_id WHERE units.isActive = 1 AND bills.isPaid = 0 ORDER BY bills.bill_id DESC')->getRowCount();

        header("Location: /pendingPayments?payment_success_msg=true");
        exit();
    }

}




require 'views/pp.view.php';