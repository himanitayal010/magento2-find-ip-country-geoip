<?php

namespace Magneto\ChangeStore\Model\ResourceModel;

/**
 * Class IpToCountry
 */
class IpToCountry extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('magneto_geoip_country', 'id');
    }
}