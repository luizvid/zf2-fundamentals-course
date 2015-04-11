<?php
/**
 * Created by PhpStorm.
 * User: Luiz
 * Date: 09/04/2015
 * Time: 23:37
 */

namespace Market\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class PostForm extends Form
{
    private $categories;

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function buildForm()
    {
        $this->setAttribute('method', 'post');

        $category = new Element\Select('category');
        $category->setLabel('Categoria');
        $category->setValueOptions(array_combine($this->categories, $this->categories));
        $category->setAttribute('class', 'form-control');

        $title = new Element\Text('title');
        $title->setLabel('Título');
        $title->setAttributes(array('maxlength' => 128, 'class' => 'form-control'));

        $description = new Element\Textarea('description');
        $description->setAttribute('class', 'form-control');
        $description->setLabel('Descrição');

        $photoFilename = new Element\File('photo_filename');
        $photoFilename->setLabel('Foto');

        $contactName = new Element\Text('contact_name');
        $contactName->setAttribute('class', 'form-control');
        $contactName->setLabel('Nome completo');

        $contactEmail = new Element\Email('contact_email');
        $contactEmail->setAttribute('class', 'form-control');
        $contactEmail->setLabel('E-mail');

        $contactPhone = new Element\Text('contact_phone');
        $contactPhone->setAttribute('class', 'form-control');
        $contactPhone->setLabel('Telefone');

        $city = new Element\Text('city');
        $city->setAttribute('class', 'form-control');
        $city->setLabel('Cidade');

        $country = new Element\Text('country');
        $country->setAttributes(array('class' => 'form-control', 'maxlength' => 2));
        $country->setLabel('País');

        $price = new Element\Number('price');
        $price->setAttributes(array('class' => 'form-control', 'maxlength' => 12, 'min' => 0, 'max' => '999999999999'));
        $price->setLabel('Preço');

        $csrf = new Element\Csrf('security');

        $submit = new Element\Submit('submit');
        $submit->setAttributes(array('class' => 'btn btn-default', 'value' => 'Enviar formulário'));

        //$form = new Form('contact');
        $this->add($category)
            ->add($title)
            ->add($description)
            ->add($photoFilename)
            ->add($contactName)
            ->add($contactEmail)
            ->add($contactPhone)
            ->add($city)
            ->add($country)
            ->add($csrf)
            ->add($price)
            ->add($submit);


        /*
        $factory = new \Zend\Form\Factory();
        $factory->createForm(array(
            'hydrator' => 'Zend\Stdlib\Hydrator\ArraySerializable',
            'elements' => array(
                array(
                    'name' => 'category',
                    'type' => 'text',
                    'options' => array(
                        'label' => 'Category'
                    )
                ),
                array(
                    'name' => 'title',
                    'type' => 'text',
                    'options' => array(
                        'label' => 'Title'
                    )
                ),
            )
        )); */



    }

}