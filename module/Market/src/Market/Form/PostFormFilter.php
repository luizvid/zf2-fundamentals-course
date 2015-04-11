<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 11/04/2015
 * Time: 00:29
 */

namespace Market\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Validator\InArray;
use Zend\Filter\StripTags;
use Zend\Filter\StringTrim;
use Zend\Filter\StringToLower;

class PostFormFilter extends InputFilter
{
    private $categories;

    /**
     * @param mixed $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function buildFilter()
    {
        $category = new Input('category');
        $category->getFilterChain()
            ->attach(new StripTags())
            ->attach(new StringTrim())
            ->attach(new StringToLower());
        $category->getValidatorChain()
            ->attach(new InArray(array('haystack' => $this->categories)));

        $title = new Input('title');
        $title->getFilterChain()
            ->attach(new StripTags())
            ->attach(new StringTrim());
        $title->getValidatorChain()
            ->attachByName('Alnum', array('allowWhiteSpace' => true))
            ->attachByName('StringLength', array('options' => array('min' => 6, 'max' => 128)));


        $this->add($category)
            ->add($title);
    }
}