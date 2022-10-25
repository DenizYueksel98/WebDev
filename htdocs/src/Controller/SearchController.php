<?php

namespace Controller;

use Framework\AbstractController;

class SearchController extends AbstractController
{
    public $searchQuery = '';
    public $searchResult = [];

    public function queryAction()
    {
        if (isset($_REQUEST['query'])) {
            $this->searchQuery = $_REQUEST['query'];

            // do the search

            $this->searchResult = [
                'a',
                'b'
            ];
        }
    }
}
