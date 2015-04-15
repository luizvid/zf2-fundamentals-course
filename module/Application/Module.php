<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\ModuleManager;

class Module
{
    public function init(ModuleManager $mm)
    {
        //print_r($mm->getLoadedModules());
    }

    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        // listens "dispatch" = MvcEvent::EVENT_DISPATCH
        // context this
        // handler (callback) onDispatch()
        // priority 100
        // obs.: executa metodo onDispatch da classe definida, no caso $this
        // trigger está sendo executada em AbstractController
        $eventManager->attach(MvcEvent::EVENT_DISPATCH, array($this, 'onDispatch'), 100);
    }

    public function onDispatch(MvcEvent $e)
    {
        $vm = $e->getViewModel();
        $categoryList = $e->getApplication()->getServiceManager()->get('categories');
        
        $vm->setVariable('categories', $categoryList);
    }

    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                'SampleService' => 'Application\Service\SampleService',
                'application-session' => 'Zend\Session\Container',
            ),
            'factories' => array(
                'application-logger' => 'Application\Factory\LoggerFactory'
            ),
            'services' => array(
                'application-log-file' => __DIR__ . '/../../data/logs/post.log'
            )
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
