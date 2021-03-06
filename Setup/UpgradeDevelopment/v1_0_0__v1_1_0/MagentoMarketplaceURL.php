<?php

/*
 * @author     M2E Pro Developers Team
 * @copyright  2011-2015 ESS-UA [M2E Pro]
 * @license    Commercial use is forbidden
 */

namespace Ess\M2ePro\Setup\UpgradeDevelopment\v1_0_0__v1_1_0;

use Ess\M2ePro\Model\Setup\Upgrade\Entity\AbstractFeature;

class MagentoMarketplaceURL extends AbstractFeature
{
    //########################################

    public function execute()
    {
        $this->getConfigModifier('module')->getEntity('/support/', 'magento_connect_url')
                                          ->updateKey('magento_marketplace_url');
    }

    //########################################
}