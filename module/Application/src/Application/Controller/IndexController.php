<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        /* ideal usar o caminho inteiro */
        $exemploService = $this->getServiceLocator()->get("Application\Service\ExemploService");

        /* exemplo de chamada pelo Module.php -> getServiceConfig */
        $sampleService = $this->getServiceLocator()->get("SampleService");

        //print_r($exemploService);
        //print_r($sampleService);
        //die;
        //print_r(get_class_methods($e = $this->getEvent()));
        return new ViewModel();
    }

    public function exemploAction()
    {
        $nome = 'Zend Framework 2';

        return new ViewModel(array('xpto' => $nome));
    }
}
