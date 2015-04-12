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
        $dateExpires = $serviceManager->get('date-expires');
        $cities = $serviceManager->get('cities');

        $postFormFilter = new PostFormFilter();
        $postFormFilter->setCategories($categories);
        $postFormFilter->setDateExpires($dateExpires);
        $postFormFilter->setCities($cities);

        $postFormFilter->buildFilter();

        return $postFormFilter;
    }

}
