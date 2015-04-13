<?php
namespace Market\Factory;

use Market\Model\ListingsTable;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ListingsTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $adapter = $serviceManager->get('general-adapter');
        $listingsTable = new ListingsTable(ListingsTable::$tableName, $adapter);

        return $listingsTable;
    }

}
