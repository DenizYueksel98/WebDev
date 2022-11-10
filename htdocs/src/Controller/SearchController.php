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
        'd21',
        'd22',
        'd23',
        'zwei',
        'fuenf1',
        'fuenf2',
        'v9',
        'vierzehn',
        'p3',
        'verbin',
        'verbau',
        'verbko',
        'co2komN',
        'sehrs',
        'schnell',
        'langsam',
        'co2komW',
        'verb_unit',
        'co2_unit'
    );
    public function suggestAction() //VorschlagsMethode
    {
        $this->disableView(); //Anzeige deaktiviert, sonst ist der Response die komplette Seite (inkl. Statischen Inhalten)
        if (isset($this->query)) { //Falls ein query-String angegeben wurde
            $this->searchQuery = $this->query; //setze den Wert von searchQuery auf den Wert von Query
            $this->carModel = parent::getCarModel(); //carModelAbfrage über Elternteil (diese Klasse hier erbt von CarController)
            $j = 10; //Limit der Hints
            for ($i = 0; $i < count($this->carModel); $i++) { //Für alle i von 0 bis carModel.length
                //Falls das Array im Feld Name, unseren gesuchten Wert enthält
                if (
                    str_contains(strtolower(strval($this->carModel[$i]->__get('name'))), strtolower($this->searchQuery))
                    && $j > 0
                ) {
                    $j--; //decrement resultcounter to max get 10 Results
                    //Füge den Hint-String die ID hinzu
                    $url = 'http://localhost:8080/index.php?c=car&a=detail&i=' . $this->carModel[$i]->__get('id');
                    $this->hint[] = array(
                        'label' => $this->carModel[$i]->__get('name'), //Label des Objekts
                        'url' => $url //Link des Objekts
                    );
                }
            }
            if (isset($this->hint)) { //Räume Duplikate auf (array_unique) und vergib indizes neu, (sonst gibts Lücken)
                $this->hint = array_map("unserialize", array_unique(array_map("serialize", $this->hint)));
            }
        }
        $json = json_encode($this->hint);
        //Gib den hint als json aus, damit er vom JS angezeigt werden kann
        echo $json;
    }
    public function queryAction() //Funktion für Suchanfrage
    {
        $this->enableView(); //Aktiviere View, könnte von suggestAction deaktiviert worden sein
        if (isset($this->query)) { //Falls ein Suchstring
            $this->searchQuery = $this->query; //Setze Suchstring in die Variable
            $this->carModel = parent::getCarModel(); //tätige Abfrage und packe Ergebnis in carModel
            $this->searchResultContains = array();

            foreach ($this->carModel as $car) {
                for ($i = 0; $i < count(get_object_vars($car)); $i++) {
                    if (str_contains(strtolower(strval($car->__get($this->mappingArray[$i]))), $this->searchQuery)) {
                        //sind leider noch Objekte, daher in JSON codiert und als Array entcodiert
                        //Füge die Werte der getroffenen Zeilen dem ErgebnisArray hinzu
                        $this->searchResultContains[] = json_decode(json_encode($car), true);
                    }
                }
            }

            //Falls searchResultContains Elemente enthält
            if (isset($this->searchResultContains)) { //Räume Duplikate auf (array_unique) und vergib indizes neu, (sonst gibts Lücken)
                $no_duplicates = array();
                for ($i = 0; $i < count($this->searchResultContains); $i++) {
                    if ($i > 0) {
                        if ($this->searchResultContains[$i]['id'] == $this->searchResultContains[$i - 1]['id']) {
                            //actual tuple is identical to last one, so do nothing
                        } else {
                            //actual tuple is different, so push it into the no_duplicates Array
                            array_push($no_duplicates, $this->searchResultContains[$i]);
                        }
                    } else {
                        //first tuple is unique by law
                        array_push($no_duplicates, $this->searchResultContains[$i]);
                    }
                }
                $this->searchResultContains = $no_duplicates; //overwrite searchResultContains-Array with recently created no_duplicate array
            }
        }
    }

    //Funktion zum zurückgeben der Expliziten Suchtreffer
    public function getSearchResultExplicit()
    {
        $this->queryAction();
        return $this->searchResultExplicit;
    }
}
