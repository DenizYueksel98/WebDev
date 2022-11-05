<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration für Kfz-Datenbank</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/typicons.css">
    <link rel="stylesheet" href="../css/style.css?ts=<?= time() ?>" />
</head>

<body>
    <input type="hidden" name="redirurl" value="<? echo $_SERVER['HTTP_REFERER']; ?>" />
    <!-- header -->
    <header>
        <div id="logo">
            <a href="../index.php"><img src="../img/logo.png" /></a>
        </div>
        <nav id="mainnav">
            <!-- breadcrumb -->
            <ul class="breadcrumb - Pfad">
                <li>
                    <a href="#">Anmeldung</a>
                </li>
                <li>
                    <a href="#">Anfrage</a>
                </li>
            </ul>
            <!-- breadcrumb end -->
            <!-- search -->
            <form class="search">
                <input type="search" placeholder="Search...">
                <button type="submit"><span class="typcn typcn-arrow-right"></button>
            </form>
            <!-- search end -->
        </nav>
    </header>
    <!-- header end -->

    <!-- navigation -->
    <nav id="sidenav">
        <ul>
            <li>
                <a href="datenbank.html">Datenbank</a>
            </li>
            <li>
                <a href="register.php">Registration/Anmeldung</a>
            </li>
            <li>
                <a href="kontakt.html">Kontakt</a>
            </li>
        </ul>
    </nav>
    <!-- navigation end -->

    <main>
        
        <?php
        $curl = curl_init(); // Initializing curl
        curl_setopt(
            $curl,
            CURLOPT_URL,                            // Sending GET request to reqres.in
            "http://localhost:8080/api/read_car_filter.php" // API to get JSON data
        );
        curl_setopt(
            $curl,                  // Telling curl to store JSON
            CURLOPT_RETURNTRANSFER, // data in a variable instead
            true                    // of dumping on screen
        );
        $response = curl_exec($curl); // Executing curl, store it in response

        if ($e = curl_error($curl)) { //Checking if any error occurs during request
            echo $e;
        } else {
            $decoded =
                json_decode($response, true);   //decoding JSON, making array
            $cars = $decoded['data'];             //navigate one down into nested array into data field
            $message = "<h3>JSON file data</h3>";
        }
        curl_close($curl);  // Closing curl
        ?>
        <section>
        </section>
        <section class="table">
            <?php
            if (isset($message)) {
                echo $message;
            ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>B2.1</th>
                        <th>B2.2</th>
                        <th>J</th>
                        <th>4</th>
                        <th>D1</th>
                        <th>D2</th>
                        <th>2</th>
                        <th>5</th>
                        <th>V9</th>
                        <th>14</th>
                        <th>P3</th>
                        <th>NEFZ Verbrauch in.</th>
                        <th>NEFZ Verbrauch au.</th>
                        <th>NEFZ Verbrauch ko.</th>
                        <th>NEFZ CO2-Emission ko.</th>
                        <th>WLTP Sehr schnell</th>
                        <th>WLTP Schnell</th>
                        <th>WLTP Langsam</th>
                        <th>WLTP CO2-Emission ko.</th>
                    </tr>
                    <?php foreach ($cars as $car) { ?>
                        <tr>
                            <td><?php echo $car['id']; ?></td>
                            <td><?php echo $car['name']; ?></td>
                            <td><?php echo $car['b21']; ?></td>
                            <td><?php echo $car['b22']; ?></td>
                            <td><?php echo $car['j']; ?></td>
                            <td><?php echo $car['vier']; ?></td>
                            <td><?php echo $car['d1']; ?></td>
                            <td><?php echo $car['d2']; ?></td>
                            <td><?php echo $car['zwei']; ?></td>
                            <td><?php echo $car['fuenf']; ?></td>
                            <td><?php echo $car['v9']; ?></td>
                            <td><?php echo $car['vierzehn']; ?></td>
                            <td><?php echo $car['p3']; ?></td>
                            <td><?php echo $car['verbin']; ?></td>
                            <td><?php echo $car['verbau']; ?></td>
                            <td><?php echo $car['verbko']; ?></td>
                            <td><?php echo $car['co2kom']; ?></td>
                            <td><?php echo $car['sehrs']; ?></td>
                            <td><?php echo $car['schnell']; ?></td>
                            <td><?php echo $car['langsam']; ?></td>
                            <td><?php echo $car['co2komb']; ?></td>
                        </tr>
                <?php }
                } else
                    echo $message;
                ?>
                </table>
        </section>
    </main>
    <script src="../js/script.js"></script>
    <script src="../js/display_car_filter.js"></script>
</body>

</html>