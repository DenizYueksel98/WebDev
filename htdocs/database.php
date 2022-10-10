<?php
$username = "root";
$password = "wwi2021a";
$database = "wwi2021a";

$mysqli = new mysqli("mariadb", $username, $password, $database);

// Don't forget to properly escape your values before you send them to DB
// to prevent SQL injection attacks.

$field1 = $mysqli->real_escape_string($_POST['field1']);
$field2 = $mysqli->real_escape_string($_POST['field2']);
$field3 = $mysqli->real_escape_string($_POST['field3']);

$query = "INSERT INTO testTable (ID, Name, Passwort)
            VALUES ('{$field1}','{$field2}','{$field3}')";

$mysqli->query($query);
$mysqli->close();