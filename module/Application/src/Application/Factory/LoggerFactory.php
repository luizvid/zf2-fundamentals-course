<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 14/04/2015
 * Time: 23:40
 */

namespace Application\Factory;

use Zend\Log\Logger;
use Zend\Log\Writer\Stream;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoggerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $applicationLogFile = $serviceManager->get('application-log-file');

        $writer = new Stream($applicationLogFile);
        $logger = new Logger();
        $logger->addWriter($writer);

        return $logger;
    }
} 