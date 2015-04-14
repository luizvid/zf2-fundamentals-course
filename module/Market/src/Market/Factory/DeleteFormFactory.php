<?php
namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\DeleteForm;

class DeleteFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $deleteFormFilter = $serviceManager->get('market-delete-filter');

        $deleteForm = new DeleteForm();
        $deleteForm->buildForm();
        $deleteForm->setInputFilter($deleteFormFilter);

        return $deleteForm;
    }

}
