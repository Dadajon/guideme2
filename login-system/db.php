<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root'; //MacOS password
$pass = 'root';
$db = 'accounts';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
