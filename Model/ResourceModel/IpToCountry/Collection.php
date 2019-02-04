<?php

namespace Magneto\ChangeStore\Model\ResourceModel\IpToCountry;

/**
 * Class Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magneto\ChangeStore\Model\IpToCountry', 'Magneto\ChangeStore\Model\ResourceModel\IpToCountry');
    }

}