<?php

namespace Customer\Salesman\Model;

class SalesmanModel extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const SALESMAN_ID = 'id';
    const SALESMAN_NAME = 'name';
    const sALESMAN_PHONE = 'phone';
    const EMAIL = 'email';
    const CREATED_AT = 'created_at';
    const UPDATE_AT = 'update_at';
    
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'customer_manu_records';

    /**
     * @var string
     */
    protected $_cacheTag = 'customer_manu_records';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'customer_manu_records';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Customer\Salesman\Model\ResourceModel\SalesmanModel');
    }
    /**
     * Get salesman Id.
     *
     * @return int
     */
    public function getSalesmanId()
    {
        return $this->getData(self::SALESMAN_ID);
    }

    /**
     * Set salesman Id.
     *
     * @param int $salesman Id
     * @return void
     */
    public function setSalesmanId($salesmanId)
    {
        return $this->setData(self::SALESMAN_ID, $salesmanId);
    }

    /**
     * Get salesman Name.
     *
     * @return varchar
     */
    public function getSalesmanName()
    {
        return $this->getData(self::SALESMAN_NAME);
    }

    /**
     * Set salesman Name.
     *
     * @param int $salesman Name
     * @return void
     */
    public function setSalesmanName($salesmanName)
    {
        return $this->setData(self::SALESMAN_NAME, $salesmanName);
    }

    /**
     * Get Salesman Phone.
     *
     * @return bool
     */
    public function getSalesmanPhone()
    {
        return $this->getData(self::SALESMAN_PHONE);
    }

    /**
     * Set Salesman Phone.
     *
     * @param int $salesmanPhone
     * @return void
     */
    public function setSalesmanPhone($salesmanPhone)
    {
        return $this->setData(self::SALESMAN_PHONE, $salesmanPhone);
    }

    /**
     * Get Salesman Email.
     *
     * @return bool
     */
    public function getSalesmanEmail()
    {
        return $this->getData(self::SALESMAN_EMAIL);
    }

    /**
     * Set Salesman Email.
     *
     * @param int $salesmanEmail
     * @return void
     */
    public function setSalesmanEmail($salesmanEmail)
    {
        return $this->setData(self::SALESMAN_EMAIL, $salesmanEmail);
    }
    
    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     *
     * @param int $createdAt
     * @return void
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
     /**
     * Get UpdateAt.
     *
     * @return varchar
     */
    public function getUpdateAt()
    {
        return $this->getData(self::UPDATE_AT);
    }

    /**
     * Set UpdateAt.
     *
     * @param int $updateAt
     * @return void
     */
    public function setUpdateAt($updateAt)
    {
        return $this->setData(self::UPDATE_AT, $updateAt);
    }
}
