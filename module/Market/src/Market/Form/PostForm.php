<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 09/04/2015
 * Time: 23:37
 */

namespace Market\Form;

use Zend\Form\Form;

class PostForm extends Form
{
    public $categories;

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function buildForm()
    {

    }

}