<?php

namespace Customer\Salesman\Controller\Adminhtml\Salesman;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    protected $_Salesman;

    /**
     * @param \Magento\Backend\App\Action\Context        $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Customer\Salesman\Model\SalesmanModelFactory $Salesman
    ) 
    {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
        $this->_Salesman = $Salesman; 
    }

    /**
     * Product List page.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Customer_Salesman::customersalesman');
        $resultPage->getConfig()->getTitle()->set(__('All Salesman'));
        $result = $this->_Salesman->create()->getCollection();
        return $resultPage;
    }
        protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Customer_Salesman::salesman_list');
    }
}
