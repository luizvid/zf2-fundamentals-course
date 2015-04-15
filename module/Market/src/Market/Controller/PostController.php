<?php
namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Provider\ContainerProvider;

class PostController extends AbstractActionController
{
    use ListingsTableTrait;
    use WorldCityAreaCodesTableTrait;
    use ContainerProvider;

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

                if (isset($data['cityCode'])) {
                    $data['cityCode'] = $this->worldCityAreaCodesTable->getCodeById($data['cityCode']);
                }

                if ($this->listingsTable->addPosting($data)) {
                    $this->flashMessenger()->addMessage("Dados postados com sucesso.");
                } else {
                    $this->flashMessenger()->addMessage("Houve um problema ao inserir os dados do formulário.");
                }

                return $this->redirect()->toRoute('home');

            } else {
                if ($this->invalidCount()) {
                    $this->flashMessenger()->addMessage("Você ultrapassou o limite de tentativas. Tente mais tarde.");

                    return $this->redirect()->toRoute('home');
                }

                $invalidView = new ViewModel();
                $invalidView->setTemplate('market/post/invalid.phtml');
                $invalidView->addChild($vm, 'main');

                return $invalidView;
            }
        }

        return $vm;
    }

    public function invalidCount()
    {
        if (isset($this->container->invalidCount)) {
            $this->container->invalidCount++;

            if ($this->container->invalidCount >= 3) {
                $this->container->invalidCount = 0;
                return TRUE;
            }

            return FALSE;
        } else {
            $this->container->invalidCount = 1;
        }
    }
}
