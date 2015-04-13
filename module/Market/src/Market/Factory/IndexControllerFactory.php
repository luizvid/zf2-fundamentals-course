<?php
namespace Market\Factory;

use Market\Controller\IndexController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $serviceManager = $controllerManager->getServiceLocator();
        $listingsTable = $serviceManager->get('listings-table');

        $indexController = new IndexController();
        $indexController->setListingsTable($listingsTable);

        return $indexController;
    }

}
