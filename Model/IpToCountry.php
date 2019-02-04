<?php

namespace Magneto\ChangeStore\Model;

/**
 * Class IpToCountry
 */
class IpToCountry extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Init resourse model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magneto\ChangeStore\Model\ResourceModel\IpToCountry');
    }

}