<?php
$username = "root";
$password = "wwi2021a";
$database = "wwi2021a";

$mysqli = new mysqli("mariadb", $username, $password, $database);

// Don't forget to properly escape your values before you send them to DB
// to prevent SQL injection attacks.

$field1 = $mysqli->real_escape_string($_POST['username']);
$field2 = $mysqli->real_escape_string($_POST['password']);
$field3 = $mysqli->real_escape_string($_POST['firstname']);
$field4 = $mysqli->real_escape_string($_POST['lastname']);

$query = "INSERT INTO userdata (Benutzername, Passwort, Vorname, Nachname)
            VALUES ('{$field1}','{$field2}','{$field3}','{$field4}')";

$mysqli->query($query);
$mysqli->close();