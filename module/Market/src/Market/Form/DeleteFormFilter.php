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
use Zend\Filter\StripTags;
use Zend\Filter\StringTrim;
use Zend\Filter\StringToLower;

class DeleteFormFilter extends InputFilter
{
    public function buildFilter()
    {
        $listingsId = new Input('listings_id');
        $listingsId->getFilterChain()
            ->attach(new StripTags())
            ->attach(new StringTrim())
            ->attach(new StringToLower());
        $listingsId->getValidatorChain()
            ->attachByName('Digits');

        $deleteCode = new Input('delete_code');
        $deleteCode->setAllowEmpty(TRUE);
        $deleteCode->getFilterChain()
            ->attach(new StripTags())
            ->attach(new StringTrim());
        $deleteCode->getValidatorChain()
            ->attachByName('Alnum', array('allowWhiteSpace' => false));

        $this->add($listingsId)
            ->add($deleteCode);
    }
}
