Du willst also unsere Fahrzeug-Datenbank aufsetzen?
Dann hast du heute wirklich Glück gehabt, denn die Einrichtung ist denkbar einfach.
                                 _________
                          _.--""'-----,   `"--.._
                       .-''   _/_      ; .'"----,`-,
                     .'      :___:     ; :      ;;`.`.
                    .      _.- _.-    .' :      ::  `..
                 __;..----------------' :: ___  ::   ;;
            .--"". '           ___.....`:=(___)-' :--'`.
          .'   .'         .--''__       :       ==:    ;
      .--/    /        .'.''     ``-,   :         :   '`-.
   ."', :    /       .'-`\\       .--.\ :         :  ,   _\
  ;   ; |   ;       /:'  ;;      /__  \\:         :  :  /_\\
  |\_/  |   |      / \__//      /"--\\ \:         :  : ;|`\|    
  : "  /\__/\____//   """      /     \\ :         :  : :|'||
["""""""""--------........._  /      || ;      __.:--' :|//|
 "------....______         ].'|      // |--"""'__...-'`\ \//
   `|WWI2021a |__;_...--'": :  \    //  |---"""      \__\_/
     """""""""'            \ \  \_.//  /
       `---'                \ \_     _'
                             `--`---'  dp
Solltest du docker-compose bereits installiert haben, Glückwunsch. Falls nicht, bitte zuerst dafür Sorgen, dass Docker (incl. Compose) läuft.
Weitergehts...
Du findest 2 Dateien im Ordner:
Dockerfile
docker-compose.yml
Kopiere diese an den Ort, an dem später der Webserver liegen soll (beispielhaft wird C:\Webserver\ verwendet).
Öffne nun bitte die Kommandozeile (WIN+R "cmd" für die Windowsnutzer) und navigiere zu deinen eben kopierten Dateien (cd C:\Webserver\).
Führe nun folgenden Befehl aus "docker-compose up -d"
Jetzt kannst du dich ein Weilchen zurücklehnen und entspannen.
Nach einigen Minuten wird der Befehl durchgelaufen sein und dein Webserver läuft.
Ersetze nun bitte den htdocs-Ordner in deinem angelegten Verzeichnis mit dem von uns bereitgestellten.
Nun ists fast geschafft. 
Damit die Website unsere Anfragen über die Datenbank performanter beantworten kann, darfst du schnell noch die Datenbank-Struktur anlegen.
Führe hierzu bitte einfach den bereitgestellten Code in der Datei "createdb.sql" in deiner Datenbank aus.
Solltest du noch keinen Zugriff auf deine Datenbank haben, findest du nun eine kurze Anleitung zur Anmeldung/Verwaltung mit PhpMyAdmin.
Das Tool wurde bereits mit installiert und ist über deinen Browser mit der URI: localhost:8081 aufrufbar.
Deine Zugangsdaten lauten wiefolgt:
Server: mariadb
Benutzer: root
Passwort: wwi2021a
Klicke nun bitte auf den Button "SQL" oben links, zwischen Datenbanken und Status.
Kopiere nun den gesamten Inhalt der "createdb.sql"-Datei in das große weiße Fenster.
Danach bestätige die Befehle mit einem Klick unten rechts auf "OK".
Ist das erledigt hast du es geschafft! :-)

Falls du eine passende XML mit unserem Schema zur Hand hast,
kannst du diese ganz einfach in den htdocs-Ordner legen. 
Bitte benenne die Datei wiefolgt: "dbXML.xml"
Nun kannst du die Startseite aufrufen (localhost:8080 im Browser) und links in der Seiten-Navigation
durch einen Klick auf den Button "XML", im Folgenden entscheiden, ob:
1. Die dbXML.xml in die Datenbank importiert werden soll.
(Bitte beachte, dass dabei die Datenbank-Tabelle komplett geleert und neu befüllt wird)
2. Die dbXML.xml auf schematische Fehler geprüft werden soll und unserem "dbschema.xsd" entspricht.
3. Der aktuelle Stand der Datenbank exportiert werden soll.
(Bitte beachte, dass dabei die bisher abgelegte dbXML.xml mit dem Stand aus der DB überschrieben wird)

Sollte das mit dem Import funktioniert haben:
Nun kannst du durch einen Klick links in der Seiten-Navigation auf Datenbank direkt zur filterbaren Ansicht springen.
Wähle bitte zuerst das Feld aus nach dem gefiltert werden soll. Dann darfst du deinen Vergleichsoperator Theta wählen.
Zuletzt noch der Wert und schon filtert sich die Tabelle nach deinen Wünschen.
