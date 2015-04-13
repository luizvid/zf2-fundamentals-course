<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 12/04/2015
 * Time: 21:34
 */

namespace Market\Controller;

trait ListingsTableTrait
{
    private $listingsTable;

    public function setListingsTable($listingsTable)
    {
        $this->listingsTable = $listingsTable;
    }
} 