<?php
namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Market\Form\PostForm;

class PostController extends AbstractActionController
{
    public $categories;
    public $postForm;

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function setPostForm($postForm)
    {
        $this->postForm = $postForm;
    }

    public function indexAction()
    {
        $data = $this->params()->fromPost();
        $this->postForm->setData($data);

        $vm = new ViewModel(array('postForm' => $this->postForm));
        //$vm->setTemplate('market/post/invalid.phtml');

        return $vm;
    }
}
