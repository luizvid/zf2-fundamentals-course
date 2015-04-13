<?php
namespace Market\Controller;

use Market\Model\WorldCityAreaCodesTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Market\Form\PostForm;

class PostController extends AbstractActionController
{
    use ListingsTableTrait;
    use WorldCityAreaCodesTableTrait;

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

        $vm = new ViewModel(array('postForm' => $this->postForm, 'data' => $data));
        $vm->setTemplate('market/post/index.phtml');

        if($this->getRequest()->isPost()) {
            $this->postForm->setData($data);

            if($this->postForm->isValid()) {

                //if ($this->listingsTable->addPosting($data)) {
                    $this->flashMessenger()->addMessage("Dados postados com sucesso!");
               //}

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
