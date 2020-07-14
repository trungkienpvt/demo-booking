<?php

namespace Demo\Booking\Model\ResourceModel\Booking;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    public function _construct()
    {
        $this->_init("Demo\Booking\Model\Booking", "Demo\Booking\Model\ResourceModel\Booking");
    }
}
