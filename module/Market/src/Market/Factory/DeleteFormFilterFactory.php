<?php
namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\DeleteFormFilter;

class DeleteFormFilterFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $deleteFormFilter = new DeleteFormFilter();
        $deleteFormFilter->buildFilter();

        return $deleteFormFilter;
    }

}
