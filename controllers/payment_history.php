<?php
session_start();
$heading = 'Payment History';

$numberOfPending = 0;

$config = require ('config.php');
$db = new Database($config['database']);

$result = $db->query('SELECT payment_history.*, units.*, tenants.*, bills.*, users.*
FROM payment_history INNER JOIN units  ON payment_history.unit_id = units.unit_id INNER JOIN tenants ON payment_history.tenant_id = tenants.tenant_id
INNER JOIN bills  ON payment_history.bill_id = bills.bill_id INNER JOIN users ON payment_history.user_id = users.user_id WHERE bills.isPaid = 1 ORDER BY payment_history.history_id DESC');

$historyRowCount = $result->getRowCount();

$histories = $result->get();

if (isset($_GET['history_id'])) {
    $historyIndividual = $db->query('SELECT payment_history.*, units.*, tenants.*, bills.*, users.*
    FROM payment_history INNER JOIN units  ON payment_history.unit_id = units.unit_id INNER JOIN tenants ON payment_history.tenant_id = tenants.tenant_id
    INNER JOIN bills  ON payment_history.bill_id = bills.bill_id INNER JOIN users ON payment_history.user_id = users.user_id WHERE bills.isPaid = 1 AND payment_history.history_id = :history_id ORDER BY payment_history.history_id DESC', [
        'history_id' => $_GET['history_id']
    ])->find();


}

require 'views/ph.view.php';