<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 14/04/2015
 * Time: 21:39
 */

namespace Application\Provider;


trait FileMailProvider {

    private $fileMail;

    /**
     * @param mixed $container
     */
    public function setFileMail($fileMail)
    {
        $this->fileMail = $fileMail;
    }
} 