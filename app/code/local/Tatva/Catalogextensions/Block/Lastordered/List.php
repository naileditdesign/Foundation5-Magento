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
class Tatva_Catalogextensions_Block_Lastordered_List extends Mage_Catalog_Block_Product_List
{
    protected function _getProductCollection()
    {
       parent::__construct();
           
			$storeId = Mage::app()->getStore()->getId();
         	$itemsCollection = Mage::getResourceModel('sales/order_item_collection') 
                            ->join('order', 'order_id=entity_id') 
                            ->addFieldToFilter('main_table.store_id', array('eq'=>$storeId))
                            ->setOrder('main_table.created_at','desc');
	        $itemsCollection->getSelect()->group(`main_table`.'product_id');

	        $prod = array();        
	        if(sizeof($itemsCollection)>0)
	        {
	            foreach ($itemsCollection as $item) {
	                //$product = Mage::getModel('catalog/product')->load($item->getProductId());
	                $prod[] = $item->getProductId(); 
	            }    
	        }

			 $products = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('*')
            ->addAttributeToSelect(array('name', 'price', 'small_image'))
            ->setStoreId($storeId)
            ->addStoreFilter($storeId)
			->setPageSize($this->get_prod_count())
            ->setOrder($this->get_order(), $this->get_order_dir())
            ->setCurPage($this->get_cur_page());
			

		   	$products->getSelect()->where('e.entity_id IN(?)',$prod );
		  
			
			$products->setPageSize($this->get_prod_count())->setCurPage($this->get_cur_page());
			
			Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
	        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);
	        //echo $products->getSelect();exit;
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
		return (isset($_REQUEST['order'])) ? ($_REQUEST['order']) : 'item_id';
	}// get_order

    function get_order_dir()
	{
		return (isset($_REQUEST['dir'])) ? ($_REQUEST['dir']) : 'desc';
	}// get_direction
}

?>
