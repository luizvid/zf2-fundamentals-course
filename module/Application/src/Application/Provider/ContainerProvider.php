<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 14/04/2015
 * Time: 21:39
 */

namespace Application\Provider;


trait ContainerProvider {

    private $container;

    /**
     * @param mixed $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }
} 