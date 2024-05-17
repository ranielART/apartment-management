<?php
require 'Validator.php';

$heading = 'Floors';

$config = require ('config.php');
$db = new Database($config['database']);

$floors = $db->query('select * from floors')->get();
// $floorsRowCount = $db->query('select * from floors')->getRowCount();
   

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['addFloor'])) {
        $errors = [];


        if (Validator::string($_POST['floorNumber'], 50)) {

            $errors['body'] = 'Required!';

        }


        if (empty($errors)) {
            $db->query('INSERT INTO floors(floor_number) VALUES(:floor_numer)', [
                'floor_numer' => $_POST['floorNumber']
            ]);

            header("Location: /floors?add_floor_msg=true&floor_number={$_POST['floorNumber']}");
            exit();
        }
    }


}


require 'views/floors.view.php';