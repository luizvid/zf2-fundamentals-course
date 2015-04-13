<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 12/04/2015
 * Time: 21:18
 */

namespace Market\Model;

use Zend\Db\TableGateway\TableGateway;

class WorldCityAreaCodesTable extends TableGateway
{
    public static $tableName = 'world_city_area_codes';

    public function getCodesForFrom()
    {
        $result = $this->select();

        $return = array();

        foreach($result as $row) {
            if (! $row['city'] || \strlen($row['city']) == 1) continue;

            $return[$row['world_city_area_code_id']] = $row['city'] . ' - ' . $row['ISO2'];
        }

        return $return;
    }

    public function getCodeById($id)
    {
        $result = $this->select(array('world_city_area_code_id' => $id));

        return $result->current();
    }
}