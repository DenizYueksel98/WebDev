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
    <? include_once('/core/initialize.php'); ?>
    
    <script src="../../js/search.js"></script>
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
            <!--form class="search" action="bu.index.php?c=search&a=query" method="POST">
                <input type="search" name="query" placeholder="Search...">
                <button type="submit"><span class="typcn typcn-arrow-right"></button>
            </form-->
            <form class="search" action="" method="POST" >
                <input type="search" name="query" placeholder="Search..." onkeyup="showHint(this.value)">
                <button type="submit"><span class="typcn typcn-arrow-right"></button>
            </form>
            <p>Suggestions: <span id="txtHint"></span></p>
            <!-- search end -->
        </nav>
    </header>
    <!-- header end -->

    <!-- navigation -->
    <nav id="sidenav">
        <ol>
            <li>
                <a href="/index.php?c=car">Datenbank</a>
                <ul>
                    <li>
                        <a href="/index.php?c=car">Alle Fahrzeuge</a>
                    </li>
                    <li>
                        <a href="/index.php?c=search&a=query">Suche</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/index.php?c=user">Benutzerverwaltung</a>
                <ul>
                    <li>
                        <a href="/index.php?c=user&a=create">Registration</a>
                    </li>
                    <li>
                        <a href="/index.php?c=user&a=login">Login</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/index.php?c=contact">Kontakt</a>
            </li>
        </ol>
    </nav>
    <!-- navigation end -->
    
    <!-- content -->
    <main>
        
        <?php
        $this->renderDynamic3(); //<-- DYNAMISCHER TEIL durch echo:  <h1>Das ist eine Überschrifzt</h1>
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

    <script src="../../js/script.js"></script>
    <!--script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script-->
</body>

</html>