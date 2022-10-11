<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration für Kfz-Datenbank</title>
    
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/typicons.css">
    <link rel="stylesheet" href="../css/style.css?ts=<?=time()?>"/>
</head>
<body>
    <input type="hidden" name="redirurl" value="<? echo $_SERVER['HTTP_REFERER']; ?>" />
    <!-- header -->
    <header>
        <div id="logo">
            <a href="../index.php" ><img src="../img/logo.png" /></a>
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
        <h1>Hier direkt für die Kfz-Datenbank registrieren</h1>
        <form action="signup.php" method="post">
            <div class="input-container">
                <input type="text" name="username" id="username" placeholder=" " /> 
                <label for="username" class="placeholder">Benutzername</label>
            </div>
            <div class="input-container">
                <input type="text" name="firstname" id="firstname" placeholder=" " /> 
                <label for="firstname" class="placeholder">Vorname</label>
            </div>
            <div class="input-container">
                <input type="text" name="lastname" id="lastname" placeholder=" " /> 
                <label for="lastname" class="placeholder">Nachname</label>
            </div>
            <div class="input-container">
                <input type="password" name="password" id="password" placeholder=" " /> 
                <label for="password" class="placeholder">Passwort</label>
            </div>           

            <button class="button" type="submit">
                Registrieren
            </button>
        </form>
        <h1>Falls du dich schon registriert hast, kannst du dich auch hier anmelden</h1>
        <form action="authenticate.php" method="post">
            <div class="input-container">
                <input type="text" name="usernameLogin" placeholder=" " /> 
                <label for="username" class="placeholder">Benutzername</label>
            </div>
            <div class="input-container">
                <input type="password" name="passwordLogin" placeholder=" " /> 
                <label for="password" class="placeholder">Passwort</label>
            </div>           

            <button class="button" type="submit">
                Anmelden
            </button>
        </form>
    </main>
</body>
</html>