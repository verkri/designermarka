<?php

/**
 * store actions.
 *
 * @package    sf_sandbox
 * @subpackage store
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class storeActions extends sfActions
{
 
  public function executeDisplay(sfWebRequest $request)
  {
    $this->marka_categories = Doctrine_Core::getTable('MarkaCategory')->getRandomLimitedCategories(4);
    $this->marka_category_count = array();
    
    // All categories are removed from the collection which does not have any 
    // active product.
    foreach( $this->marka_categories as $i => $category ) {
      $count = $category->countActiveProducts();
      if ( $count != 0 ) {
        $this->marka_category_count[$i] = $count;
      } else {        
        unset($this->marka_categories[$i]);
      }      
    }
    /*
    $this->marka_categories = Doctrine_Core::getTable('MarkaCategory')->getCategories();
    $this->marka_products = array();
    $this->marka_category_count = array();
    
    // Fetch the categories & the active products of the categories.
    // All categories are removed from the collection which does not have any 
    // active product.
    foreach( $this->marka_categories as $i => $category ) {
      $count = $category->countActiveProducts();
      if ( $count != 0 ) {
        $this->marka_category_count[$i] = $count;
        $this->marka_products[$i] = $category->getActiveProducts();
      } else {        
        unset($this->marka_categories[$i]);
      }      
    }*/   
  }
  
  public function executeShowcategory(sfWebRequest $request)
  {
    $this->marka_categories = Doctrine_Core::getTable('MarkaCategory')->getNotEmptyCategories();
    
    $this->category = $this->getRoute()->getObject();
    $this->category_products = $this->category->getActiveProducts();
  }
  
  public function executeShowproduct(sfWebRequest $request)
  {
    $this->marka_categories = Doctrine_Core::getTable('MarkaCategory')->getNotEmptyCategories();
       
    $this->product = $this->getRoute()->getObject();
    $this->category = $this->product->getCategory();
  }
}
