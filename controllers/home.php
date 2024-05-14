<?php

$heading = 'Home';

$config = require ('config.php');
$db = new Database($config['database']);

require 'views/home.view.php';