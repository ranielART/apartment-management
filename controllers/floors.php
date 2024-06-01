<?php
require 'Validator.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("location: /unauthorizedAccess");
    exit();
}


$heading = 'Floors';

$config = require ('config.php');
$db = new Database($config['database']);

$floors = $db->query('SELECT * FROM floors WHERE isActive = 1')->get();
$floorsRowCount = $db->query('SELECT * FROM floors where isActive = 1')->getRowCount();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['addFloor'])) {
        $errors = [];

        if (Validator::string($_POST['floorNumber'], 50)) {

            $errors['body'] = 'Required!';

        }

        if (empty($errors)) {
            $db->query('INSERT INTO floors(floor_number, total_units, units_occupied) VALUES(:floor_numer, 0, 0)', [
                'floor_numer' => $_POST['floorNumber']
            ]);


            header("Location: /floors?add_floor_msg=true&floor_number={$_POST['floorNumber']}");
            exit();
        }
    }

}

require 'views/floors.view.php';