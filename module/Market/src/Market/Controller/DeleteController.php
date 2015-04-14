<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Market for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DeleteController extends AbstractActionController
{
    use \Market\Form\DeleteFormTrait;
    use \Market\Form\DeleteFilterTrait;
    use ListingsTableTrait;

    public function indexAction()
    {
        $data = $this->params()->fromPost();

        $vm = new ViewModel(array('deleteForm' => $this->deleteForm, 'data' => $data));
        $vm->setTemplate('market/delete/index.phtml');

        if($this->getRequest()->isPost()) {
            $this->deleteForm->setData($data);

            if($this->deleteForm->isValid()) {

                if ($this->listingsTable->deleteByDeleteCode($data['listings_id'], $data['delete_code'])) {
                    $this->flashMessenger()->addMessage("Post deletado com sucesso.");
                } else {
                    $this->flashMessenger()->addMessage("Código de deleção incorreto.");
                }

                return $this->redirect()->toRoute('home');

            } else {
                $invalidView = new ViewModel();
                $invalidView->setTemplate('market/delete/invalid.phtml');
                $invalidView->addChild($vm, 'main');

                return $invalidView;
            }
        }

        return $vm;
    }
}