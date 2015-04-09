<?php

class Tatva_Catalogextensions_Model_Catalogextensions extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('catalogextensions/catalogextensions');
    }
}