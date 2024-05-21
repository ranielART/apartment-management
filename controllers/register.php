<?php

require 'Validator.php';



$config = require ('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['register'])) {

        $errors = [];


        if (Validator::string($_POST['name'], 50)) {

            $errors['input'] = 'Required!';

        }

        if (Validator::string($_POST['username'], 50)) {

            $errors['input'] = 'Required!';

        }

        if (Validator::string($_POST['password'], 50)) {

            $errors['input'] = 'Required!';

        }

        if (Validator::string($_POST['passwordConfirm'], 50)) {

            $errors['input'] = 'Required!';

        }

        if ($_POST['password'] !== $_POST['passwordConfirm']) {

            $errors['notSamePass'] = 'not same!';

        }

        if (empty($errors)) {

            $doesNotExist = $db->query('SELECT * FROM users where username = :username', [
                'username' => $_POST['username']

            ])->getRowCount();

            if ($doesNotExist <= 0) {

                $db->query('INSERT INTO users (username, `password`, `name`) VALUES (:username, :password, :name)', [
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'name' => $_POST['name'],
                ]);

                header("Location: /?register_successful_msg=true");
                exit();

            } else {

                $errors['userName'] = 'already exist';

            }

        }

    }


}

require 'views/register.view.php';