<?php

namespace Controller;

use Controller\CarController;

class SearchController extends CarController
{
    public $searchQuery = '';
    public $searchResultExplicit;    
    public $searchResultContains;
    public $foundIn = array();
    public $foundUnique = array();
    public $carModel;
    public $mappingArray = array(
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
    public function queryAction()
    {
        if (isset($_REQUEST['query'])) {
            $this->searchQuery = $_REQUEST['query'];

            // do the search
            $this->carModel = parent::getCarModel();

            //var_dump($this->carModel);
            //print_r($this->carModel[0]['id']);

            for ($i = 0; $i < count($this->carModel); $i++) {
                for ($j = 1; $j < count($this->carModel[$i]); $j++) {
                    if (strval($this->searchQuery) == strval($this->carModel[$i][$this->mappingArray[$j]]) or 
                        intval($this->searchQuery) == intval($this->carModel[$i]['id'])) {
                        
                        $this->searchResultExplicit[] = $this->carModel[$i];
                    }
                    if(str_contains(strtolower(strval($this->carModel[$i][$this->mappingArray[$j]])),strtolower($this->searchQuery))){
                        $this->searchResultContains[] = $this->carModel[$i];
                    }
                }
            }
            if (isset($this->searchResultExplicit)) {
                $this->searchResultExplicit = array_map("unserialize", array_unique(array_map("serialize", $this->searchResultExplicit)));
            }
            if (isset($this->searchResultContains)) {
                $this->searchResultContains = array_map("unserialize", array_unique(array_map("serialize", $this->searchResultContains)));
            }
            /*$this->searchResult = [
                'a',
                'b'
            ];*/
            //var_dump($this->searchResult);
        }
    }
}
