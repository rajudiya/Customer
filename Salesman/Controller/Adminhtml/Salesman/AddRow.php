<?php
namespace Customer\Salesman\Controller\Adminhtml\Salesman;

use Magento\Framework\Controller\ResultFactory;

class AddRow extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\Registry
     */
    private $coreRegistry;

    /**
     * @var \Customer\Salesman\Model\SalesmanFactory
     */
    private $SalesmanFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry,
     * @param \Customer\Salesman\Model\SalesmanModelFactory $SalesmanFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Customer\Salesman\Model\SalesmanModelFactory $SalesmanFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->SalesmanFactory = $SalesmanFactory;
    }

    /**
     * Mapped Salesman List page.
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $rowId = (int) $this->getRequest()->getParam('id');
        $rowData = $this->SalesmanFactory->create();
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        if ($rowId) {
           $rowData = $rowData->load($rowId);
           $rowTitle = $rowData->getTitle();
           if ($rowData->getEntityId()) {
               $this->messageManager->addError(__('Salesman data no longer exist.'));
               $this->_redirect('salesman/salesman/index');
               return;
           }
       }

       $this->coreRegistry->register('id', $rowData);
       $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
       $resultPage->setActiveMenu('Customer_Salesman::customersalesman');
       $title = $rowId ? __('Edit Salesman Data ').$rowTitle : __('Add Salesman');
       $resultPage->getConfig()->getTitle()->prepend($title);
       return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Customer_Salesman::add_row');
    }
}