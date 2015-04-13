<?php
namespace Market\Factory;

use Market\Controller\ViewController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ViewControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $serviceManager = $controllerManager->getServiceLocator();
        $listingsTable = $serviceManager->get('listings-table');

        $viewController = new ViewController();
        $viewController->setListingsTable($listingsTable);

        return $viewController;
    }

}
