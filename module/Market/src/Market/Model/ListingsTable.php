<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 12/04/2015
 * Time: 21:18
 */

namespace Market\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Where;

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

        $subSelect = new Select();
        $subSelect->columns(array(
            'mostRecent' => new Expression('MAX(`listings_id`)')
        ));
        $subSelect->from(ListingsTable::$tableName);

        //echo  $subSelect->getSqlString($this->adapter->getPlatform());

        $where = new Where();
        $where->in('listings_id', $subSelect);

        $select = new Select();
        $select->where($where)
            ->from(ListingsTable::$tableName);

        //echo  $select->getSqlString($this->adapter->getPlatform());

        return $this->selectWith($select)->current();
    }

    public function addPosting(array $data)
    {
        \Zend\Debug\Debug::dump($data);

        $date = new \DateTime();
        $date->add(new \DateInterval('P' . $data['date_expires'] . 'D'));


        $dateExpires = $date->format('Y-m-d H:i:s');
        \Zend\Debug\Debug::dump($dateExpires);
    }
} 