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
    public $categories;

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function buildForm()
    {
        $category = new Element\Select('category');
        $category->setLabel('Categoria')
            ->setValueOptions($this->categories);

        $title = new Element\Text('title');
        $title->setLabel('Título');
        $title->setAttributes(array(
            'maxlength' => 128
        ));

        $description = new Element('description');
        $description->setAttribute('type', 'textarea');
        $description->setLabel('Descrição');

        $photoFilename = new Element\File('photo_filename');
        $photoFilename->setAttribute('type', 'file');
        $photoFilename->setLabel('Foto');

        $contactName = new Element('contact_name');
        $contactName->setAttribute('type', 'text');
        $contactName->setLabel('Nome completo');

        $contactEmail = new Element\Email('contact_email');
        $contactEmail->setAttribute('type', 'email');
        $contactEmail->setLabel('E-mail');

        $contactPhone = new Element('contact_phone');
        $contactPhone->setAttribute('type', 'text');
        $contactPhone->setLabel('Telefone');

        $city = new Element('city');
        $city->setAttribute('type', 'text');
        $city->setLabel('Cidade');

        $country = new Element('country');
        $country->setAttributes(array('type' => 'text', 'maxlength' => 2));
        $country->setLabel('País');

        $csrf = new Element\Csrf('security');

        $submit = new Element\Submit('submit');
        $submit->setAttribute('value', 'Enviar');

        $form = new Form('contact');
        $form->add($category)
            ->add($title)
            ->add($description)
            ->add($photoFilename)
            ->add($contactName)
            ->add($contactEmail)
            ->add($contactPhone)
            ->add($city)
            ->add($country)
            ->add($csrf)
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