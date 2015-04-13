<?php

namespace Market\Factory;

use Market\Model\WorldCityAreaCodesTable;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class WorldCityAreaCodesTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $adapter = $serviceManager->get('general-adapter');
        $areaCodesTable = new WorldCityAreaCodesTable(WorldCityAreaCodesTable::$tableName, $adapter);

        return $areaCodesTable;
    }

}
