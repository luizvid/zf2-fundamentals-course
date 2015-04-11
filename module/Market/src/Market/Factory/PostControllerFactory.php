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

        $postController = new PostController();
        $postController->setCategories($categories);
        $postController->setPostForm($postForm);

        return $postController;
    }

}
