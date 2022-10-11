<?php
session_start();
$DATABASE_HOST = 'mariadb';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'wwi2021a';
$DATABASE_NAME = 'wwi2021a';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$id = $con->real_escape_string($_POST['usernameLogin']);
$password= $con->real_escape_string($_POST['passwordLogin']);
if ( !isset($_POST['usernameLogin'], $_POST['passwordLogin']) ) {
	exit('Bitte gib sowohl den Nutzernamen als auch dein Passwort ein!');
}
if ($stmt = $con->prepare('SELECT ID, Passwort FROM userdata WHERE Benutzername = ?')) {
	$stmt->bind_param('s', $_POST['usernameLogin']);
	$stmt->execute();
	$stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        if ($_POST['passwordLogin']== $password) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['usernameLogin'];
            $_SESSION['id'] = $id;
                //check what page user first visited
            if(isset($_SESSION['url'])) {
                $url = $_SESSION['url'];
            } else {
                $url = "register.php";
            }
            //redirect user to page they initially visited
            header("Location: $url");
        } else {
            echo 'Passwort falsch!';
        }
    } else {echo 'Nutzername falsch!';
    }

	$stmt->close();
}
?>