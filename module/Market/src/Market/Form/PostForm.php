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

        $csrf = new Element\Csrf('security');

        $submit = new Element\Submit('submit');
        $submit->setAttributes(array('class' => 'btn btn-default', 'value' => 'Enviar formulário'));

        //$form = new Form('contact');
        $this->add($category)
            ->add($title)
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