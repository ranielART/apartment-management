<?php

session_start();
require 'Validator.php';

$config = require ('config.php');
$db = new Database($config['database']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['signIn'])) {


        $errors = [];


        if (Validator::string($_POST['username'], 50)) {

            $errors['input'] = 'Required!';

        }

        if (Validator::string($_POST['password'], 50)) {

            $errors['input'] = 'Required!';

        }

        if (empty($errors)) {

            $doesExist = $db->query('SELECT * FROM users where username = :username AND password = :password', [
                'username' => $_POST['username'],
                'password' => $_POST['password']
            ])->getRowCount();

            if ($doesExist >= 1) {
                $user = $db->query('SELECT * FROM users where username = :username AND password = :password', [
                    'username' => $_POST['username'],
                    'password' => $_POST['password']
                ])->find();

                $_SESSION['username'] = $user['username'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['user_id'] = $user['user_id'];


                header("Location: /dashboard?login_successful_msg=true");
                exit();

            } else {

                $errors['userNamePassword'] = 'not exist';

            }

        }

    }


}



require 'views/index.view.php';