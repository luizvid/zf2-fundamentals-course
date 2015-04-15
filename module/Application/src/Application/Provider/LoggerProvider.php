<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 14/04/2015
 * Time: 21:39
 */

namespace Application\Provider;


trait LoggerProvider {

    private $logger;

    /**
     * @param mixed $container
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }
} 