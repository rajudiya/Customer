<?php
namespace Customer\Salesman\Controller\Adminhtml\Salesman;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Customer\Salesman\Model\SalesmanFactory
     */
    var $SalesmanFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Customer\Salesman\Model\SalesmanFactory $SalesmanFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Customer\Salesman\Model\SalesmanModelFactory $SalesmanFactory
    ) {
        parent::__construct($context);
        $this->SalesmanFactory = $SalesmanFactory;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        array_shift($data);
        if (!$data) {
            $this->_redirect('*/*/addrow');
            return;
        }
        try {
            $rowData = $this->SalesmanFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setEntityId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Salesman has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('*/*/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Customer_Salesman::save');
    }
}