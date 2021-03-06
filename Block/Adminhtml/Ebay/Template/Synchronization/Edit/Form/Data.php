<?php

namespace Ess\M2ePro\Block\Adminhtml\Ebay\Template\Synchronization\Edit\Form;

use Ess\M2ePro\Block\Adminhtml\Magento\AbstractBlock;

class Data extends AbstractBlock
{
    protected $_template = 'ebay/template/synchronization/form/data.phtml';

    protected function _prepareLayout()
    {
        $this->getHelper('Data\GlobalData')->setValue('synchronization_form_data', $this->getFormData());

        $this->getHelper('Data\GlobalData')->setValue('is_custom', $this->getData('is_custom'));
        $this->getHelper('Data\GlobalData')->setValue('custom_title', $this->getData('custom_title'));

        $this->setChild('tabs', $this->createBlock('Ebay\Template\Synchronization\Edit\Form\Tabs'));

        $this->jsPhp->addConstants(
            $this->getHelper('Data')->getClassConstants('\Ess\M2ePro\Model\Ebay\Template\Synchronization')
        );
        $this->jsPhp->addConstants(
            $this->getHelper('Data')->getClassConstants('\Ess\M2ePro\Model\Template\Synchronization')
        );

        $this->jsTranslator->addTranslations([
            'Wrong value. Only integer numbers.' => $this->__('Wrong value. Only integer numbers.'),

            'Must be greater than "Min".' => $this->__('Must be greater than "Min".'),
            'Inconsistent Settings in Relist and Stop Rules.' => $this->__(
                'Inconsistent Settings in Relist and Stop Rules.'
            ),

            'You need to choose at set at least one time for the schedule to run.' => $this->__(
                'You need to choose at least one Time for the schedule to run.'
            ),
            'You should specify time.' => $this->__('You should specify time.'),

            'Wrong value.' => $this->__('Wrong value.'),
            'Must be greater than "Active From" Date.' => $this->__('Must be greater than "Active From" Date.'),
            'Must be greater than "From Time".' => $this->__('Must be greater than "From Time".'),

            'Quantity' => $this->__('Quantity'),
            'Min Quantity' => $this->__('Min Quantity'),
        ]);

        $this->js->add(<<<JS
    require([
        'M2ePro/Ebay/Template/Synchronization',
    ], function(){
        window.EbayTemplateSynchronizationObj = new EbayTemplateSynchronization();
        EbayTemplateSynchronizationObj.initObservers();
    });
JS
        );

        return parent::_prepareLayout();
    }
}