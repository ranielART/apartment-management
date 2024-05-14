<?php
require 'Validator.php';

$heading = 'Floors';

$config = require ('config.php');
$db = new Database($config['database']);

$floors = $db->query('select * from floors')->get();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['addFloor'])) {
        $errors = [];


        if (Validator::string($_POST['floorNumber'], 50)) {

            $errors['body'] = 'Required!';
            $remain = 'true';
        }


        if (empty($errors)) {
            $db->query('INSERT INTO floors(floor_number) VALUES(:floor_numer)', [
                'floor_numer' => $_POST['floorNumber']
            ]);

            header('Location: /floors');
        }
    }


}


require 'views/floors.view.php';