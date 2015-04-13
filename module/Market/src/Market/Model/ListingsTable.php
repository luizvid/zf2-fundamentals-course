<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 12/04/2015
 * Time: 21:18
 */

namespace Market\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Select;

class ListingsTable extends TableGateway
{
    public static $tableName = 'listings';

    public function getListingsByCategory($category)
    {
        $result = $this->select(array('category' => $category));

        return $result;
    }

    public function getListingById($id)
    {
        $result = $this->select(array('listings_id' => $id));

        return $result->current();
    }

    public function getMostRecentListing($id = null)
    {
        $select = new Select();
        $select->from(ListingsTable::$tableName)
            ->order('listings_id DESC')
            ->limit(1);

        return $this->selectWith($select)->current();
    }
} 