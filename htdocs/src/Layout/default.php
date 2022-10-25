<!DOCTYPE html> <!-- NEUE INDEX HTML -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kfz-Datenbank</title>

    <!-- load stylesheets Schriftwart mit ICONS defnieren-->
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/typicons.css">
    <link rel="stylesheet" href="/css/style.css?ts=<?= time() ?>" />
    <?include_once('/core/initialize.php');?>

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
            <form class="search" action="bu.index.php?c=search&a=query" method="POST">
                <input type="search" name="query" placeholder="Search...">
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
                <a href="/sites/display_all_cars.php">Datenbank</a>
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
        $this->renderView();
        //print_r($this);
        ?>
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
    <!--script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script-->
</body>

</html>