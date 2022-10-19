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
        <section class="filter-form">
            <form id="filter-form" action="../api/read_car_filter.php" method="post">
                <div class="input-container-nearly-full">
                    <div class="inline">
                        <label for="filter">Filter:</label>
                        <select class="input-filter" name="filter" id="filter">
                            <option value="id">ID</option>
                            <option selected value="name">Fahrzeugname</option>
                            <option value="b21">B2.1 lt. Zulassungsbescheinigung Teil 1</option>
                            <option value="b22">B2.2 lt. Zulassungsbescheinigung Teil 1</option>
                            <option value="j">J lt. Zulassungsbescheinigung Teil 1</option>
                            <option value="vier">4 lt. Zulassungsbescheinigung Teil 1</option>
                            <option value="d1">D1 lt. Zulassungsbescheinigung Teil 1</option>
                            <option value="d2">D2 lt. Zulassungsbescheinigung Teil 1</option>
                            <option value="zwei">2 lt. Zulassungsbescheinigung Teil 1</option>
                            <option value="fuenf">5 lt. Zulassungsbescheinigung Teil 1</option>
                            <option value="v9">V9 lt. Zulassungsbescheinigung Teil 1</option>
                            <option value="vierzehn">14 lt. Zulassungsbescheinigung Teil 1</option>
                            <option value="p3">P3 lt. Zulassungsbescheinigung Teil 1</option>
                            <option value="verbin">Verbrauch innerorts lt. NEFZ</option>
                            <option value="verbau">Verbrauch außerorts lt. NEFZ</option>
                            <option value="verbko">Verbrauch kombiniert lt. NEFZ</option>
                            <option value="co2kom">CO2-Emission kombiniert lt. NEFZ</option>
                            <option value="sehrs">Sehr schnell lt. WLTP</option>
                            <option value="schnell">Schnell lt. WLTP</option>
                            <option value="langsam">Langsam lt. WLTP</option>
                            <option value="co2komb">CO2-Emission kombiniert lt. WLTP</option>
                        </select>
                        <label for="theta">Vergleichsoperator:</label>
                        <select class="input-filter" name="theta" id="theta">
                            <option value="=">
                                =
                            </option>
                            <option value="<">
                                < </option>
                            <option value=">">
                                >
                            </option>
                            <option value="<=">
                                <= </option>
                            <option value=">=">
                                >=
                            </option>
                            <option value="<>">
                                <>
                            </option>
                            <option selected value="LIKE">
                                enthält
                            </option>
                        </select>
                        <label for="value">Wert:</label>
                        <input class="input-filter" name="value" id="value" placeholder=" " />

                        <input class="inline-button" id="send" value="Suche" type="submit" />
                    </div>
                </div>

            </form>
        </section>
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