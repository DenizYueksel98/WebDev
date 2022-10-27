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
        <section>
            <h1>Ihre Kfz-Datenbank</h1>
            <h2>Stöbern sie durch die verschiedensten Autos</h2>
            <p>Klicken Sie hier um direkt zur Abfrage zu gelangen.</p>
            <form action="bu.index.php?c=car" method="get" target="_blank">
                <button class='button' type="submit">Zur Kfz-Datenbank</button>
            </form>
        </section>
        <section>
            <h1>this is a headline</h1>
            <h2>and this is a subline</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius quod dolor dolore totam mollitia magnam dolorem? Necessitatibus molestiae excepturi totam, maiores dolore corrupti obcaecati blanditiis, dolorum corporis modi fugit. Consequatur?</p>
            <button class="button">
                click me
            </button>
        </section>

        <section class="table">
            <table>
                <tr>
                    <th>
                        Dolor officia ea quis mollit nulla ipsum nostrud.
                    </th>
                    <th>
                        Officia minim sit eu eiusmod ea minim eiusmod adipisicing.
                    </th>
                    <th>
                        Incididunt exercitation incididunt eu culpa fugiat esse.
                    </th>
                </tr>
                <tr>
                    <td>
                        In sit culpa quis deserunt id labore incididunt in.
                    </td>
                    <td>
                        Ad dolore deserunt aute ipsum.
                    </td>
                    <td>
                        Deserunt sit est duis occaecat laborum dolor.
                    </td>
                </tr>
                <tr>
                    <td>
                        In enim ullamco sunt commodo.
                    </td>
                    <td>
                        Irure magna aute cillum consequat aliquip non.
                    </td>
                    <td>
                        Minim cillum aute minim proident pariatur.
                    </td>
                </tr>
            </table>
        </section>

        <section class="cta">
            <h1>Call to action section</h1>
            <h2>where you tell why everybody should register</h2>
            <button class="button">
                register now
            </button>
        </section>

        <section>
            <h1>Register here</h1>
            <h2>Tell us a little about yourself</h2>
            <form action="#URL endpunkt wo die daten hingeschickt werden sollen">
                <div class="input-container">
                    <input type="password" name="firstname" placeholder=" " />
                    <label for="firstname" class="placeholder">First name</label>
                </div>

                <div class="input-container">
                    <input type="text" name="lastname" placeholder=" " />
                    <label for="lastname" class="placeholder">Last name</label>
                </div>

                <button class="button" type="submit">
                    registrieren
                </button>
            </form>
        </section>
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