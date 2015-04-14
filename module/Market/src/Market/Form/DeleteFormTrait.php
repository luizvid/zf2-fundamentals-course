<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 13/04/2015
 * Time: 21:38
 */

namespace Market\Form;


trait DeleteFormTrait {

    private $deleteForm;

    /**
     * @param mixed $deleteForm
     */
    public function setDeleteForm($deleteForm)
    {
        $this->deleteForm = $deleteForm;
    }
} 