<?php
require 'Validator.php';
session_start();


$config = require ('config.php');
$db = new Database($config['database']);

$heading = 'Bill';

date_default_timezone_set('Asia/Manila');


$currentDateTime = new DateTime();
$currentDate = $currentDateTime->format('Y/m/d');



$unitDetails = $db->query('SELECT units.*, unit_types.* FROM units LEFT JOIN unit_types ON units.type_id = unit_types.type_id WHERE units.unit_id = :unit_id AND isActive = 1', [
    'unit_id' => $_GET['unit_id']
])->find();

$bills = $db->query('SELECT  bills.*, units.* from bills LEFT JOIN units ON bills.unit_id = units.unit_id WHERE units.isActive = 1 AND bills.isPaid = 0 AND units.unit_id = :unit_id ORDER BY bills.bill_id DESC', [
    'unit_id' => $_GET['unit_id']
])->get();

$numberOfPending = $db->query('SELECT  bills.*, units.* from bills LEFT JOIN units ON bills.unit_id = units.unit_id WHERE units.isActive = 1 AND bills.isPaid = 0 AND units.unit_id = :unit_id ORDER BY bills.bill_id DESC', [
    'unit_id' => $_GET['unit_id']
])->getRowCount();

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

    if (isset($_POST['addBill'])) {
        $errors = [];


        if (Validator::string($_POST['utilitiesBill'], 10000000)) {

            $errors['body'] = 'Required!';

        }

        if (Validator::string($_POST['billingPeriodStart'], 50)) {

            $errors['body'] = 'Required!';

        }

        if (Validator::string($_POST['dueDate'], 50)) {

            $errors['body'] = 'Required!';

        }

        if (validateDate($_POST['billingPeriodStart'])) {
            $errors['date'] = 'Required!';
        }

        if (validateDate($_POST['dueDate'])) {
            $errors['date'] = 'Required!';
        }

        if (empty($errors)) {

            $db->query('INSERT INTO bills(unit_id, billing_period_start, unit_bill, utilities_bill, total_bill, issue_date, due_date) VALUES(:unit_id, :billing_period_start, :unit_bill, :utilities_bill, :total_bill, :issue_date, :due_date)', [
                'unit_id' => $_GET['unit_id'],
                'billing_period_start' => $_POST['billingPeriodStart'],
                'unit_bill' => $_POST['rentPrice'],
                'utilities_bill' => $_POST['utilitiesBill'],
                'total_bill' => $_POST['rentPrice'] + $_POST['utilitiesBill'],
                'issue_date' => $_POST['issueDate'],
                'due_date' => $_POST['dueDate']
            ]);

            $numberOfPending = $db->query('SELECT  bills.*, units.* from bills LEFT JOIN units ON bills.unit_id = units.unit_id WHERE units.isActive = 1 AND bills.isPaid = 0 AND units.unit_id = :unit_id ORDER BY bills.bill_id DESC', [
                'unit_id' => $_GET['unit_id']
            ])->getRowCount();

            $toUnit = $_GET["unit_id"];
            header("Location: /unit?floor_id={$_GET['floor_id']}&unit_id={$toUnit}&add_bill_msg=true");
            exit();

        }

    }


}

require 'views/bill.view.php';