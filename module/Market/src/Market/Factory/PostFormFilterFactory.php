<?php
namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\PostFormFilter;

class PostFormFilterFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $categories = $serviceManager->get('categories');

        $postFormFilter = new PostFormFilter();
        $postFormFilter->setCategories($categories);
        $postFormFilter->buildFilter();

        return $postFormFilter;
    }

}
