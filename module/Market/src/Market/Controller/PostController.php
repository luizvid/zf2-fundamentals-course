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
        //$data = $this->params()->fromPost();
        $data = array_merge(
            $this->params()->fromPost(),
            $this->params()->fromFiles()
        );

        $vm = new ViewModel(array('postForm' => $this->postForm, 'data' => $data));
        $vm->setTemplate('market/post/index.phtml');

        if($this->getRequest()->isPost()) {
            $this->postForm->setData($data);

            if($this->postForm->isValid()) {
                $this->flashMessenger()->addMessage("Dados postados!");

                return $this->redirect()->toRoute('home');
            } else {
                $invalidView = new ViewModel();
                $invalidView->setTemplate('market/post/invalid.phtml');
                $invalidView->addChild($vm, 'main');

                return $invalidView;
            }
        }

        return $vm;
    }
}
