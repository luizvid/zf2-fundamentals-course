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
use Zend\Captcha\Image as ImageCaptcha;

class PostForm extends Form
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
     * @param mixed $cityList
     */
    public function setCities($cities)
    {
        $this->cities = $cities;
    }

    public function buildForm()
    {
        $this->setAttributes(array('id' => 'post-form', 'method' => 'post'));

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

        $photoFilename = new Element\Url('photo_filename');
        $photoFilename->setAttribute('class', 'form-control');
        $photoFilename->setLabel('Foto');

        $contactName = new Element\Text('contact_name');
        $contactName->setAttribute('class', 'form-control');
        $contactName->setLabel('Nome completo');

        $contactEmail = new Element\Email('contact_email');
        $contactEmail->setAttribute('class', 'form-control');
        $contactEmail->setLabel('E-mail');

        $contactPhone = new Element\Text('contact_phone');
        $contactPhone->setAttribute('class', 'form-control');
        $contactPhone->setLabel('Contato');

        $cityCode = new Element\Select('cityCode');
        $cityCode->setAttribute('class', 'form-control');
        $cityCode->setValueOptions($this->cities);
        $cityCode->setLabel('Cidade');

        $deleteCode = new Element\Number('delete_code');
        $deleteCode->setAttribute('class', 'form-control');
        $deleteCode->setLabel('Código de deleção');

        $captcha = new Element\Captcha('captcha');
        $captchaAdapter = new ImageCaptcha(array(
            'font' => './public/fonts/arial.ttf',
            'imgDir' => './public/img/captcha',
            'imgUrl' => '/img/captcha',
        ));
        $captchaAdapter->setWordlen(4);
        $captcha->setCaptcha($captchaAdapter)
            ->setLabel('Você é um ser humano ou um robô?')
            ->setAttribute('class', 'captchaStyle')
            ->setAttribute('title', 'Você é um ser humano ou um robô?');

        /*$captcha = new Element\Captcha('captcha');
        $captcha->setCaptcha(new \Zend\Captcha\Dumb());
        $captcha->setAttribute('class', 'form-control');
        $captcha->setOptions(array('label' => 'Você é um ser humano ou um robô?'));
*/
        $price = new Element\Number('price');
        $price->setAttributes(array('class' => 'form-control', 'maxlength' => 12, 'min' => 0, 'max' => '999999999999'));
        $price->setLabel('Preço');

        $dateExpires = new Element\Radio('date_expires');
        $dateExpires->setLabel('Expira em (dias)');
        $dateExpires->setValueOptions(array_combine($this->dateExpires, $this->dateExpires));

        $csrf = new Element\Csrf('security');

        $submit = new Element\Submit('submit');
        $submit->setAttributes(array('class' => 'btn btn-default', 'value' => 'Enviar formulário'));

        //$form = new Form('contact');
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
            ->add($deleteCode)
            ->add($captcha)
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
