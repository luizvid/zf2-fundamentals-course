<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 13/04/2015
 * Time: 21:39
 */

namespace Market\Form;


trait DeleteFilterTrait {

    private $deleteFilter;

    /**
     * @param mixed $deleteFilter
     */
    public function setDeleteFilter($deleteFilter)
    {
        $this->deleteFilter = $deleteFilter;
    }
} 