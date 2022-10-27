
<?php //Wenn nur php dann kann ich mir das schließende php symobl sparen
spl_autoload_register(function ($className) {
    $file = './src/' . str_replace('\\','/',$className) . '.php';
    if (file_exists($file)) {
        include($file);
        if (class_exists($className)==false) {
            echo $className . ' not found in '.$file;   
            exit(1); 
        }
    } else {
        echo 'no file for class '. $className;
        exit(1);
    }
});

$frontController = new Framework\FrontController();//Instatiate mit Default für Controller und Action
$frontController->dispatch();//Controller und Action Name festlegen, falls gesetzt, inklusive aller Pfade
$frontController->render(); //Pfad für View festlegen








//namespace Car; 


//$_REQUEST; Immer definiert; Array mit dem hinter der URI
/*class Test{
    function doAnything(){
        echo "ok";
    }
}*/
//Interfaces sehr früh definieren
/*
interface MyInterface{ //Vertrag den ich eingehe, du muss die Methoden und Properties implementieren
    public function doMore(); 
}
interface MyOtherInterface{ //Vertrag den ich eingehe, du muss die Methoden und Properties implementieren
    public function doMore(); 
}
abstract class AbstractHello extends Test implements MyInterface{
    public function doMore(){

    }
}

class Hallo extends AbstractHello{ //doppelt extends geht nicht, mehrere Interfaces geht allerdings
    
}

$a=new Test;
//$b = new OtherTest();
$c= new Car\CarcontrollerName();*/