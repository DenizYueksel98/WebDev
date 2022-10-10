<h1> test </h1>
<?php //Wenn nur php dann kann ich mir das schließende php symobl sparen

    $name="name";
    echo "hallo" . $name; //. = +
    echo 'hallo $niels'; //string literal - NUR Text

    //<section>
    for($i=0;$i<10;$i++) {
        echo $i . ", ";
    }
    //<section

    $j=0;
    while($j<100) {
        echo $j . "<br>"; //"
    }


    function sum($a, $b) {
        return $a+$b;

    }    
    
    $c = sum(3,5);
    echo $c;

    $x = 0;
    if ($x==0) { //=== typsicherer Vergleich IMMER SO!
        echo"yes";
    }else{
        echo"no";
    }

    include('funktions.php'); //eine externe php datei laden
    sayHello("niels");

?>

<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis adipisci porro doloremque voluptatibus cupiditate assumenda nemo veniam fugiat, sint odit officiis reiciendis asperiores sed ullam aliquid placeat quod sunt! Suscipit.


<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis adipisci porro doloremque voluptatibus cupiditate assumenda nemo veniam fugiat, sint odit officiis reiciendis asperiores sed ullam aliquid placeat quod sunt! Suscipit.


