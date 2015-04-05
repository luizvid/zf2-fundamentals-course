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
        $serviceLocator = $controllerManager->getServiceLocator();
        $categories = $serviceLocator->get('categories');

        $postController = new PostController();
        $postController->setCategories($categories);

        return $postController;
    }

}
