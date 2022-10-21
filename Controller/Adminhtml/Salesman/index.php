<?php

namespace Customer\Salesman\Controller\Adminhtml\Salesman;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    protected $_salesmans;

    /**
     * @param \Magento\Backend\App\Action\Context        $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Customer\Salesman\Model\SalesmanModelFactory $salesmans
    ) 
    {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
        $this->_salesmans = $salesmans; 
    }

    /**
     * Salesman List page.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('All Salesmans'));
        $result = $this->_salesmans->create()->getCollection();
        return $resultPage;
    }
}
