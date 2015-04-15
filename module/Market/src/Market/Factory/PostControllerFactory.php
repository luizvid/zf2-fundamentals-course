<?php
namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Controller\PostController;

class PostControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        //\Zend\Debug\Debug::dump(get_class_methods($controllerManager)); die;
        $serviceManager = $controllerManager->getServiceLocator();
        $categories = $serviceManager->get('categories');
        $postForm = $serviceManager->get('market-post-form');
        $listingsTable = $serviceManager->get('listings-table');
        $cities = $serviceManager->get('area-codes-table');
        $session = $serviceManager->get('application-session');
        $logger = $serviceManager->get('application-logger');

        $postController = new PostController();
        $postController->setCategories($categories);
        $postController->setPostForm($postForm);
        $postController->setListingsTable($listingsTable);
        $postController->setWorldCityAreaCodesTable($cities);
        $postController->setContainer($session);
        $postController->setLogger($logger);

        return $postController;
    }

}
