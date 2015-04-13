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
    private $dateExpires;
    private $cities;
    /**
     * @param mixed $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @param mixed $dateExpires
     */
    public function setDateExpires($dateExpires)
    {
        $this->dateExpires = $dateExpires;
    }

    /**
     * @param mixed $cities
     */
    public function setCities($cities)
    {
        $this->cities = $cities;
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
            ->attachByName('Alnum', array('allowWhiteSpace' => TRUE))
            ->attachByName('StringLength', array('options' => array('min' => 6, 'max' => 128)));

        $price = new Input('price');
        $price->getFilterChain()
            ->attach(new StripTags())
            ->attach(new StringTrim());

        $priceRegex = new \Zend\Validator\Regex(array('pattern' => '/^[0-9]{1,10}+(\.[0-9]{1,2})?$/'));
        $priceRegex->setMessage('Preço deve ter no máximo 12 caracteres, incluindo opcionalmente 2 casas decimais separadas por ".".');

        $price->getValidatorChain()
            ->attach($priceRegex);

        $dateExpires = new Input('date_expires');
        $dateExpires->setAllowEmpty(TRUE);
        $dateExpires->getValidatorChain()
            ->attach(new InArray(array('haystack' => $this->dateExpires)));

        $description = new Input('description');
        $description->setAllowEmpty(TRUE);
        $description->getFilterChain()
            ->attach(new StripTags())
            ->attach(new StringTrim());
        $description->getValidatorChain()
            ->attachByName('StringLength', array('options' => array('max' => 4096)));

        $photoFilename = new Input('photo_filename');
        $photoFilename->setAllowEmpty(TRUE);
        $photoFilename->getValidatorChain()
            ->attachByName('Regex', array('pattern' => '!^(http://)?[a-z0-9./_-]+(jp(e)?g|png)$!i'));
        $photoFilename->setErrorMessage('Photo must be a URL or a valid filename ending with jpg or png');

        $contactName = new Input('contact_name');
        $contactName->getFilterChain()
            ->attach(new StripTags())
            ->attach(new StringTrim());
        $contactName->getValidatorChain()
            ->attachByName('Regex', array('pattern' => '/^[a-z0-9., -]{1,255}$/i'));
        $contactName->setErrorMessage('Name should only contain letters, numbers, and some punctuation.');

        $contactEmail = new Input('contact_email');
        $contactEmail->setAllowEmpty(TRUE);
        $contactEmail->getFilterChain()
            ->attach(new StripTags())
            ->attach(new StringTrim());
        $contactEmail->getValidatorChain()
            ->attachByName('EmailAddress');

        /* TODO: testar Regex de contato */
        $contactPhone = new Input('contact_phone');
        $contactPhone->setAllowEmpty(TRUE);
        $contactPhone->getFilterChain()
            ->attach(new StripTags())
            ->attach(new StringTrim());
        $contactPhone->getValidatorChain()
            ->attachByName('Regex', array('pattern' => '/^(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})$/'));
        $contactPhone->setErrorMessage('Contato deve ter o seguinte formato:(99) 9999-9999 ou (99) 99999-9999');

        $cityCode = new Input('cityCode');
        $cityCode->setAllowEmpty(TRUE);
        $cityCode->getFilterChain()
            ->attach(new StripTags())
            ->attach(new StringTrim());
        //$cityCode->getValidatorChain()
            //->attach(new InArray(array('haystack' => array_keys($this->cities))));

        $deleteCode = new Input('delete_code');
        $deleteCode->setAllowEmpty(TRUE);
        $deleteCode->getFilterChain()
            ->attach(new StripTags())
            ->attach(new StringTrim());
        $deleteCode->getValidatorChain()
            ->attachByName('Alnum', array('allowWhiteSpace' => TRUE));

        $this->add($category)
            ->add($title)
            ->add($price)
            ->add($dateExpires)
            ->add($description)
            ->add($photoFilename)
            ->add($contactName)
            ->add($contactEmail)
            ->add($contactPhone)
            ->add($cityCode)
            ->add($deleteCode);
    }
}