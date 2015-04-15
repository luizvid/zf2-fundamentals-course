<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 14/04/2015
 * Time: 23:40
 */

namespace Application\Factory;

use Zend\Mail\Transport\File as FileTransport;
use Zend\Mail\Transport\FileOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class FileMailFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $appMailInfo = $serviceManager->get('application-mail-info');

        $options = new FileOptions(array(
            'path' => $appMailInfo['email_dir']
        ));

        $transport = new FileTransport();
        $transport->setOptions($options);

        return $transport;
    }
} 