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
    <!--?php include "includes/login-check.php"; ?-->
    <!--?php $_SESSION['url'] = $_SERVER['REQUEST_URI']; ?-->
    <!--?php ob_start(); ?-->
    <script src="../../js/jQuery.min.js"></script>
</head>

<body>
    <!-- header -->
    <header>
        <div id="logo">
            <a href="index.php">
                <img id="logopng" src="/img/logo.png" />
            </a>
        </div>
        <nav id="mainnav">
            <form class="search" action="/index.php?c=search&a=query" method="POST">
                <input type="search" name="q" placeholder="Suche..." onkeyup="showHint(this.value)">
                <button type="submit"><span class="typcn typcn-arrow-right"></button>
            </form>
            <div class="suggestions">Vorschläge:</div>
            <div id="txtHint"></div>
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
                        <a href="/index.php?c=car&a=create">Neu anlegen</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/index.php?c=user">Sign-Up / Login</a>
            </li>
            <li>
                <a href="/index.php?c=contact">Kontakt</a>
            </li>
        </ol>
    </nav>
    <!-- navigation end -->

    <!-- content -->
    <main>
        <div id="wait" style="display:none">
            <h1>
                WAITING
            </h1>
        </div>
        <?php
        $this->renderDynamic1(); //<-- DYNAMISCHER TEIL durch echo:  <h1>Das ist eine Überschrifzt</h1>
        //print_r($this);
        ?>
    </main>
    <!-- content end -->

    <footer>
        <div class="social">
            <a href="facebook.de"><span class="typcn typcn-social-facebook"></span></a>
            <a href="instagram.com"><span class="typcn typcn-social-instagram"></span></a>
            <a href="twitter.de"><span class="typcn typcn-social-twitter"></span></a>
            <a href="google.de" class="let me google this for you"></a>
        </div>
        <ul class="list">
            <li>
                <a href="/index.php?c=contact&a=impressum">Impressum</a>
            </li>
            <li>
                <a href="/index.php?c=contact&a=cookie">Cookie Hinweis</a>
            </li>
            <li>
                <a href="/index.php?c=contact&a=faq">FAQ</a>
            </li>
        </ul>
        <p class="copyright"> &copy; 2022 car-24 GmbH. Alle Rechte vorbehalten.
        </p>


    </footer>
    <!-- footer end -->
    <!-- load javascript -->

    <script src="../../js/search.js"></script>
    <!--script src="../../js/script.js"></script-->
    <!--script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script-->
</body>

</html>