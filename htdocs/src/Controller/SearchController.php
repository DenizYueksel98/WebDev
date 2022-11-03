<?php

namespace Controller;

use Controller\CarController;

class SearchController extends CarController
{
    public $query; //Angefragte ID/String/etc.
    public $hint; //leerer Hint
    public $searchQuery = ''; //leerer SearchQueryString
    public $searchResultExplicit; //leeres searchResultExplicit Array, enthält exakte Suchtreffer
    public $searchResultContains; //leeres searchResultContains Array, enthält Suchtreffer, die SuchString enthalten
    public $foundIn = array(); //Array zur Speicherung der IDs in denen der Wert gefunden wurde, enthält Duplikate
    public $foundUnique = array(); //foundIn, bloß ohne Duplikate
    public $carModel; // carModel Array als Ergebnis der gesamthaften Datenbankabfrage
    public $mappingArray = array( //Mappingarray, dass ich drüber iterieren kann, statt die Bezeichnung anzugeben, siehe. queryAction innerhalb der for SChleifen
        'id',
        'name',
        'b21',
        'b22',
        'j',
        'vier',
        'd1',
        'd2',
        'zwei',
        'fuenf',
        'v9',
        'vierzehn',
        'p3',
        'verbin',
        'verbau',
        'verbko',
        'co2kom',
        'sehrs',
        'schnell',
        'langsam',
        'co2komb'
    );
    public function suggestAction()//VorschlagsMethode
    {
        $this->disableView();//Anzeige deaktiviert, sonst ist der Response die komplette Seite (inkl. Statischen Inhalten)
        if (isset($this->query)) {//Falls ein query-String angegeben wurde
            $this->searchQuery = $this->query;//setze den Wert von searchQuery auf den Wert von Query
            $this->carModel = parent::getCarModel(); //carModelAbfrage über Elternteil (diese Klasse hier erbt von CarController)

            for ($i = 0; $i < count($this->carModel); $i++) {//Für alle i von 0 bis carModel.length
                //Falls das Array im Feld Name, unseren gesuchten Wert enthält
                if (str_contains(strtolower(strval($this->carModel[$i]['name'])), strtolower($this->searchQuery))) {
                    //Füge den Hint-String die ID hinzu
                    $url='http://localhost:8080/index.php?c=car&a=detail&i='.$this->carModel[$i]['id'];
                    $this->hint[]= array(
                        'label'=>$this->carModel[$i]['name'], //Label des Objekts
                        'url'=>$url //Link des Objekts
                    );
                }
                
            }
            if (isset($this->hint)) { //Räume Duplikate auf (array_unique) und vergib indizes neu, (sonst gibts Lücken)
                $this->hint = array_map("unserialize", array_unique(array_map("serialize", $this->hint)));
            }
        }
        $json=json_encode($this->hint);
        //Gib den hint als json aus, damit er vom JS angezeigt werden kann
        echo $json;
    }
    public function queryAction()//Funktion für Suchanfrage
    {
        $this->enableView(); //Aktiviere View, könnte von suggestAction deaktiviert worden sein
        if (isset($this->query)) { //Falls ein Suchstring
            $this->searchQuery = $this->query; //Setze Suchstring in die Variable

            // do the search
            $this->carModel = parent::getCarModel(); //tätige Abfrage und packe Ergebnis in carModel

            for ($i = 0; $i < count($this->carModel); $i++) { //Für alle ergebnisse von 0 bis carModel.length, iteriere i
                for ($j = 1; $j < count($this->carModel[$i]); $j++) { //Für alle innerhalb carModel[i], iteriere j
                    if (//Falls Eingabe komplett übereinstimmt als String oder Int (Differenzierung wegen int in Spalte id)
                        strval($this->searchQuery) == strval($this->carModel[$i][$this->mappingArray[$j]]) or
                        intval($this->searchQuery) == intval($this->carModel[$i]['id'])
                    ) {
                        //Packe das Suchergebnis in das Array für die expliziten Treffer
                        $this->searchResultExplicit[] = $this->carModel[$i];
                    }
                    //Falls der Inhalt wiedergefunden wurde
                    if (str_contains(strtolower(strval($this->carModel[$i][$this->mappingArray[$j]])), strtolower($this->searchQuery))) {
                        //Packe das Suchergebnis in das Array für die "contains" Treffer
                        $this->searchResultContains[] = $this->carModel[$i];
                    }
                }
            }
            //Falls searchResultEplicit Elemente enthält
            if (isset($this->searchResultExplicit)) { //Räume Duplikate auf (array_unique) und vergib indizes neu, (sonst gibts Lücken)
                $this->searchResultExplicit = array_map("unserialize", array_unique(array_map("serialize", $this->searchResultExplicit)));
            }
            //Falls searchResultContains Elemente enthält
            if (isset($this->searchResultContains)) { //Räume Duplikate auf (array_unique) und vergib indizes neu, (sonst gibts Lücken)
                $this->searchResultContains = array_map("unserialize", array_unique(array_map("serialize", $this->searchResultContains)));
            }
            //var_dump($this->searchResultExplicit);
        }
    }
    //Funktion zum zurückgeben der Expliziten Suchtreffer
    public function getSearchResultExplicit()
    {
        $this->queryAction();
        return $this->searchResultExplicit;
    }
}
