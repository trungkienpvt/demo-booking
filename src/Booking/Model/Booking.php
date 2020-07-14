<?php

namespace Demo\Booking\Model;
class Booking extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
        $this->_init("Demo\Booking\Model\ResourceModel\Booking");
    }
}

?>