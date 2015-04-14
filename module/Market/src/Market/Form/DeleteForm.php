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

class DeleteForm extends Form
{
    public function buildForm()
    {
        $this->setAttributes(array('id' => 'delete-form', 'method' => 'post'));

        $listingsId = new Element\Text('listings_id');
        $listingsId->setLabel('ID do Post');
        $listingsId->setAttributes(array('class' => 'form-control'));

        $deleteCode = new Element\Text('delete_code');
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

        $csrf = new Element\Csrf('security');

        $submit = new Element\Submit('submit');
        $submit->setAttributes(array('class' => 'btn btn-default', 'value' => 'Enviar formulário'));

        $this->add($listingsId)
            ->add($deleteCode)
            ->add($captcha)
            ->add($csrf)
            ->add($submit);
    }
}
