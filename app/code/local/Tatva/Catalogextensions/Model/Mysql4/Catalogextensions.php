<?php

class Tatva_Catalogextensions_Model_Mysql4_Catalogextensions extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the catalogextensions_id refers to the key field in your database table.
        $this->_init('catalogextensions/catalogextensions', 'catalogextensions_id');
    }
}