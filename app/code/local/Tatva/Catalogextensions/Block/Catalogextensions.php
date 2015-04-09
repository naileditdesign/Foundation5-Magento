<?php
class Tatva_Catalogextensions_Block_Catalogextensions extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getCatalogextensions()     
     { 
        if (!$this->hasData('catalogextensions')) {
            $this->setData('catalogextensions', Mage::registry('catalogextensions'));
        }
        return $this->getData('catalogextensions');
        
    }
}