<?php

include 'functions.php';

$password = $_GET['password'];

$hash = password_hash($password, PASSWORD_BCRYPT);

var_dump($password);
var_dump($hash);



var_dump(password_verify($password, $hash));

?>