<!DOCTYPE html> <!-- NEUE INDEX HTML -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kfz-Datenbank</title>

    <!-- load stylesheets Schriftwart mit ICONS defnieren-->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/typicons.css">
    <link rel="stylesheet" href="/css/style.css?ts=<?= time() ?>" />
    <!--?php include "includes/login-check.php"; ?-->
    <!--?php $_SESSION['url'] = $_SERVER['REQUEST_URI']; ?-->
    <!--?php ob_start(); ?-->
</head>

<body>
    <!-- header -->
    <header>
        <div id="logo">
            <a href="index.php">
                <img src="/img/logo.png" />
            </a>
        </div>
        <nav id="mainnav">
            <!-- breadcrumb -->
            <ul class="breadcrumb - Pfad">
                <li>
                    <a href="#">Nav Item 1</a>
                </li>
                <li>
                    <a href="#">Nav Item 2</a>
                </li>
                <li>
                    Nav Item 3
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
                <a href="sites/datenbank.html">Datenbank</a>
            </li>
            <li>
                <a href="sites/register.php">Registration/Anmeldung</a>
            </li>
            <li>
                <a href="sites/kontakt.html">Kontakt</a>
            </li>
        </ul>
    </nav>
    <!-- navigation end -->

    <!-- content -->
    <main>
        <?php
        $curl = curl_init(); // Initializing curl
        curl_setopt(
            $curl,
            CURLOPT_URL,                            // Sending GET request to reqres.in
            "http://localhost:8080/api/read_car.php" // API to get JSON data
        );
        curl_setopt(
            $curl,                  // Telling curl to store JSON
            CURLOPT_RETURNTRANSFER, // data in a variable instead
            true                    // of dumping on screen
        );
        $response = curl_exec($curl); // Executing curl store it in response

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
                  
            <div class="row">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title"><button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span>Filter</button></h3>
                </div>
                <section class="table">
                    <?php
                    if (isset($message)) {
                        echo $message;
                    ?>

                        <table>
                            <thead>
                                <thhead>
                                    <tr class="filters">
                                        <th><input type="text" class="form-control" placeholder="ID" disabled></th>
                                        <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                                        <th><input type="text" class="form-control" placeholder="B2.1" disabled></th>
                                        <th><input type="text" class="form-control" placeholder="B22" disabled></th>
                                        <th><input type="text" class="form-control" placeholder="J" disabled></th>
                                        <th><input type="text" class="form-control" placeholder="4" disabled></th>
                                        <th><input type="text" class="form-control" placeholder="D1" disabled></th>
                                        <th><input type="text" class="form-control" placeholder="D2" disabled></th>
                                        <th><input type="text" class="form-control" placeholder="2" disabled></th>
                                        <th><input type="text" class="form-control" placeholder="5" disabled></th>
                                        <th><input type="text" class="form-control" placeholder="V9" disabled></th>
                                        <th><input type="text" class="form-control" placeholder="14" disabled></th>
                                        <th><input type="text" class="form-control" placeholder="P3" disabled></th>
                                        <th><input type="text" class="form-control" placeholder="NEFZ Verbrauch in." disabled></th>
                                        <th><input type="text" class="form-control" placeholder="NEFZ Verbrauch au." disabled></th>
                                        <th><input type="text" class="form-control" placeholder="NEFZ Verbrauch ko." disabled></th>
                                        <th><input type="text" class="form-control" placeholder="NEFZ CO2-Emission ko." disabled></th>
                                        <th><input type="text" class="form-control" placeholder="WLTP Sehr schnell" disabled></th>
                                        <th><input type="text" class="form-control" placeholder="WLTP Schnell" disabled></th>
                                        <th><input type="text" class="form-control" placeholder="WLTP Langsam" disabled></th>
                                        <th><input type="text" class="form-control" placeholder="WLTP CO2-Emission ko." disabled></th>
                                    </tr>
                            </thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>B2.1</td>
                                <td>B2.2</td>
                                <td>J</td>
                                <td>4</td>
                                <td>D1</td>
                                <td>D2</td>
                                <td>2</td>
                                <td>5</td>
                                <td>V9</td>
                                <td>14</td>
                                <td>P3</td>
                                <td>NEFZ Verbrauch in.</td>
                                <td>NEFZ Verbrauch au.</td>
                                <td>NEFZ Verbrauch ko.</td>
                                <td>NEFZ CO2-Emission ko.</td>
                                <td>WLTP Sehr schnell</td>
                                <td>WLTP Schnell</td>
                                <td>WLTP Langsam</td>
                                <td>WLTP CO2-Emission ko.</td>
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
            </div>
        </div>
        </section>
        
</body>
</main>
<!-- content end -->

<!-- footer -->
<footer>
    <div>
        <img src="\img\logo.png" />
        <p>
            &copy; 2022 WWI2021a
        </p>
    </div>
    <div>
        <h3>Useful Links</h3>
        <ul>
            <li>
                <a href="#">Impressum</a>
            </li>
            <li>
                <a href="#">Cookie Hinweis</a>
            </li>
            <li>
                <a href="#">FAQ</a>
            </li>
        </ul>
    </div>
    <div>
        <h3>Contact Us</h3>
        <a href="#"><span class="typcn typcn-social-facebook"></span></a>
        <a href="#"><span class="typcn typcn-social-instagram"></span></a>
        <a href="#"><span class="typcn typcn-social-twitter"></span></a>
        <a href="google.de" class="let me google this for you"></a>
    </div>
</footer>
<!-- footer end -->

<!-- load javascript -->
<script src="\js\check-password.js"></script>
<script src="..\js\filter.js"></script>
<!--script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script-->
</body>

</html>