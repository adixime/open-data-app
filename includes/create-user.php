<?php

//A small utility file for use to create an admin user
//THIS FILE SHOULD NEVER BE PUBLICLY ACCESSIBLE

require_once '../includes/db.php';
require_once 'users.php';

$email = 'gupt0040@algonquinlive.com';
$password = 'password';

user_create($db, $email, $password);