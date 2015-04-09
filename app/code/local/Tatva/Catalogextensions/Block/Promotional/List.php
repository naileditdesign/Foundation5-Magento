<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of List
 *
 * @author om
 */
class Tatva_Catalogextensions_Block_Promotional_List extends Mage_Catalog_Block_Product_List
{
    protected function _getProductCollection()
    {
        parent::__construct();
        parent::__construct();
        	$storeId    = Mage::app()->getStore()->getId();
			$websiteId = Mage::app()->getWebsite()->getId();
			$customerGroupId = 0;
			$login = Mage::getSingleton( 'customer/session' )->isLoggedIn();
			$attributes = Mage::getSingleton('catalog/config')->getProductAttributes();
			
			if($login)
				$customerGroupId = Mage::getSingleton('customer/session')->getCustomerGroupId(); 
			
			$products = Mage::getModel('catalog/product')->getCollection()
							->setStoreId($storeId)
            				->addStoreFilter($storeId)
							->addAttributeToSelect($attributes)
							->addMinimalPrice()
                    		->addFinalPrice()
                    		->addTaxPercents()
							->setPageSize($this->get_prod_count())
            				->setOrder($this->get_order(), $this->get_order_dir())
            				->setCurPage($this->get_cur_page());;
			
			
			
			Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
       		Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);
			
			$todayDate = date("Y-m-d H:i:00", Mage::getModel('core/date')->timestamp(time()));
			$catalogRuleProducts = Mage::getResourceModel('catalogrule/rule_product_price_collection')
							   	->addFieldToFilter('customer_group_id',$customerGroupId)
								->addFieldToFilter('website_id',$websiteId)
                                ->addFieldToFilter('latest_start_date', array(array('lteq'=>$todayDate),array('null'=>true)))
								->addFieldToFilter('earliest_end_date', array(array('gteq'=>$todayDate),array('null'=>true)));
			
			$catalogRuleProductID = $catalogRuleProducts->getProductIds();
			
			$products->getSelect()->where('e.entity_id IN(?)',$catalogRuleProductID);
			$this->_productCollection = $products;
        	return $this->_productCollection;
    }

    function get_prod_count()
	{
		//unset any saved limits
	    Mage::getSingleton('catalog/session')->unsLimitPage();
	    return (isset($_REQUEST['limit'])) ? intval($_REQUEST['limit']) : 9;
	}// get_prod_count

	function get_cur_page()
	{
		return (isset($_REQUEST['p'])) ? intval($_REQUEST['p']) : 1;
	}// get_cur_page

    function get_order()
	{
		return (isset($_REQUEST['order'])) ? ($_REQUEST['order']) : 'entity_id';
	}// get_order

    function get_order_dir()
	{
		return (isset($_REQUEST['dir'])) ? ($_REQUEST['dir']) : 'desc';
	}// get_direction
}

?>
