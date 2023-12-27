<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "cnp";

$db = mysqli_connect($host, $username, $password, $database);
if (!$db) {
    header('Location: /error/403.html');
}
