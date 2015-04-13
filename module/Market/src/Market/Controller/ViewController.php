<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Market for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Market\Controller;

use Market\Model\ListingsTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ViewController extends AbstractActionController
{
    use ListingsTableTrait;

    public function indexAction()
    {

        $category = $this->params()->fromRoute('category');
        $listingsResult = $this->listingsTable->getListingsByCategory($category);

        return new ViewModel(array('category' => $category, 'listingsResult' => $listingsResult));
    }

    public function itemAction()
    {
        $itemId = $this->params()->fromRoute('itemId');

        $listingResult = $this->listingsTable->getListingById($itemId);
        if(empty($itemId)) {
            $this->flashMessenger()->addMessage('Item não encontrado');
            return $this->redirect()->toRoute('market');
        }

        return new ViewModel(array('itemId' => $itemId, 'listing' => $listingResult));
    }
}