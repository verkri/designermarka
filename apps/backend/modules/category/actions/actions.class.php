<?php

require_once dirname(__FILE__).'/../lib/categoryGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/categoryGeneratorHelper.class.php';

/**
 * category actions.
 *
 * @package    sf_sandbox
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoryActions extends autoCategoryActions
{
  
  public function preExecute()
  {
    parent::preExecute();
    sfConfig::set('app_menu','category');
  }
  
  public function executeDelete(sfWebRequest $request)
  {
    $object = $this->getRoute()->getObject();
    $product_count = $object->getProductCount();
    
    if ( $product_count > 0 ) {
      $this->getUser()->setFlash('error', "There are $product_count product(s) associated with this category (".$object->getName()."). Deletion is denied.");
      $this->redirect('@marka_category');
    } else {
      parent::executeDelete($request);
    }
  } 
}
