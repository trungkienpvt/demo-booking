<?php

namespace Demo\Booking\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


/**
 * Class InstallData
 *
 * @package Blackbird\ContentManager\Setup
 */
class InstallData implements InstallDataInterface
{

    /** @var \Magento\Framework\App\State **/
    private $state;

    /**
     * InstallData constructor
     */
    public function __construct(
        \Magento\Framework\App\State $state

    )
    {
        $this->state = $state;
        $this->state->setAreaCode(\Magento\Framework\App\Area::AREA_GLOBAL);
    }

    /**
     * Installs entities for the module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {

    }



}
