<?php

namespace Demo\Booking\Model\ResourceModel;
class Booking extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init("tbl_booking", "booking_id");
    }
}

?>