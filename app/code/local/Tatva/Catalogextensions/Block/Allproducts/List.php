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
class Tatva_Catalogextensions_Block_Allproducts_List extends Mage_Catalog_Block_Product_List {

    protected function _getProductCollection() 
	{
		parent::__construct();

        $storeId    = Mage::app()->getStore()->getId();
        $products = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('*')
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
    		->setPageSize($this->get_prod_count())
            ->addAttributeToSort($this->get_order(), $this->get_order_dir())
            ->setCurPage($this->get_cur_page());
        
        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);
        Mage::getSingleton('cataloginventory/stock')->addInStockFilterToCollection($products);
		
        $this->_productCollection = $products;

        return $this->_productCollection;
    }
	
	function get_order()
	{
		//unset any saved limits
	    return (isset($_REQUEST['order'])) ? $_REQUEST['order'] : "entity_id";
	}// get_prod_count
	
	function get_order_dir()
	{
		//unset any saved limits
	    return (isset($_REQUEST['dir'])) ? $_REQUEST['dir'] : "asc";
	}// get_prod_count
	
    	
	function get_prod_count()
	{
		//unset any saved limits
	    Mage::getSingleton('catalog/session')->unsLimitPage();
	    return (isset($_REQUEST['limit'])) ? intval($_REQUEST['limit']) : 12;
	}// get_prod_count
 
	function get_cur_page()
	{
		return (isset($_REQUEST['p'])) ? intval($_REQUEST['p']) : 1;
	}// get_cur_page
	
	
}

?>