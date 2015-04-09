<?php

class Tatva_Catalogextensions_Model_Mysql4_Catalogextensions_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('catalogextensions/catalogextensions');
    }
}