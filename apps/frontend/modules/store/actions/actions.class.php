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
  private function setMenus() {
    sfConfig::set('app_menu','store');
    sfConfig::set('app_submenu','');
  }
  
  public function executeDisplay(sfWebRequest $request)
  {
    $this->setMenus();
    $this->form = new StoreFilterForm();
    
    $submitted = $request->getParameter($this->form->getName());
    if ( $submitted ) {
      $this->form->bind( $request->getParameter($this->form->getName()) );
      if ( $this->form->isValid() ) {
        echo "Form is valid!";
      } else
        echo "Form is invalid!";
    }
    
    
    
    $this->marka_categories = Doctrine_Core::getTable('MarkaCategory')->getNotEmptyCategories();
    $this->marka_colorschemes = Doctrine_Core::getTable('MarkaColorScheme')->getNotEmptyColorSchemes();
    $this->marka_products = Doctrine_Core::getTable('MarkaProduct')->getActiveProducts();
  }
  
  public function executeShowcolorscheme(sfWebRequest $request)
  {
    $this->setMenus();
    $this->form = new StoreFilterForm();

    $this->colorscheme = $this->getRoute()->getObject();
    $this->marka_categories = $this->colorscheme->getActiveCategories();
  }
  
  
  public function executeShowproduct(sfWebRequest $request)
  {
    $this->setMenus();
    $this->form = new StoreFilterForm();

    $this->marka_categories = Doctrine_Core::getTable('MarkaCategory')->getNotEmptyCategories();
    $this->product = $this->getRoute()->getObject();
    $this->category = $this->product->getCategory();
  }
  
}
