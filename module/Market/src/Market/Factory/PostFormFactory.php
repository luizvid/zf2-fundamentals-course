<?php
namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\PostForm;

class PostFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $categories = $serviceManager->get('categories');
        $dateExpires = $serviceManager->get('date-expires');
        $cities = $serviceManager->get('cities');

        $postFormFilter = $serviceManager->get('market-post-filter');

        $postForm = new PostForm();
        $postForm->setCategories($categories);
        $postForm->setDateExpires($dateExpires);
        $postForm->setCities($cities);

        $postForm->buildForm();
        $postForm->setInputFilter($postFormFilter);

        return $postForm;
    }

}
