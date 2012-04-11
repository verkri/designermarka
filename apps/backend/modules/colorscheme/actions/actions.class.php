<?php

require_once dirname(__FILE__).'/../lib/colorschemeGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/colorschemeGeneratorHelper.class.php';

/**
 * colorscheme actions.
 *
 * @package    sf_sandbox
 * @subpackage colorscheme
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class colorschemeActions extends autoColorschemeActions
{
  public function preExecute()
  {
    parent::preExecute();
    sfConfig::set('app_menu','colorscheme');
  }
  
  public function executeDelete(sfWebRequest $request)
  {
    $object = $this->getRoute()->getObject();
    $product_count = $object->getProductCount();
    
    if ( $product_count > 0 ) {
      $this->getUser()->setFlash('error', "There are $product_count product(s) associated with this colorscheme (".$object->getName()."). Deletion is denied.");
      $this->redirect('@marka_color_scheme');
    } else {
      parent::executeDelete($request);
    }
  } 
  
}
