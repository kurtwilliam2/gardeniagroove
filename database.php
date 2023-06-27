<?php

$host = "localhost";
$dbname = "login_db";
$username = "root";
$password = "Babaylow";

$mysqli = new mysqli(
    hostname: $host,
    username: $username,
    password: $password,
    database: $dbname
);

if ($mysqli->connect_errno) {
    die("Connection error:" . $mysqli->connect_error);
}

require $mysqli;
