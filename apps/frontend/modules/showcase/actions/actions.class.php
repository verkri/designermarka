<?php

/**
 * showcase actions.
 *
 * @package    sf_sandbox
 * @subpackage showcase
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class showcaseActions extends sfActions
{
  
  public function executeColorschemeView(sfWebRequest $request)
  {
    $this->colorscheme = $this->getRoute()->getObject();
    $this->categories = $this->colorscheme->getCategories();
  }
  
  public function executeCategoryView(sfWebRequest $request)
  {
    $cat_slug = $request->getParameter('category_slug');
    $cs_slug = $request->getParameter('colorscheme_slug');
    
    $this->category = Doctrine_Core::getTable('MarkaCategory')->findBy('slug',$cat_slug)->getFirst();
    $this->colorscheme = Doctrine_Core::getTable('MarkaColorScheme')->findBy('slug',$cs_slug)->getFirst();
      
    $this->products = Doctrine_Core::getTable('MarkaProduct')
            ->getProductsFiltered($this->category,$this->colorscheme);
  }
 
  public function executeProductView(sfWebRequest $request)
  {
    $this->product = $this->getRoute()->getObject();
    
    $cat_slug = $request->getParameter('category_slug');
    $cs_slug = $request->getParameter('colorscheme_slug');
    
    $this->category = Doctrine_Core::getTable('MarkaCategory')->findBy('slug',$cat_slug)->getFirst();
    $this->colorscheme = Doctrine_Core::getTable('MarkaColorScheme')->findBy('slug',$cs_slug)->getFirst();
    
    $this->forward404Unless( $this->category && $this->colorscheme );
    
    // extra check for URL forgery
    $validURI = $this->product->getCategoryId() == $this->category->getId();
    $validURI &= $this->product->getColorschemeId() == $this->colorscheme->getId();
    $this->forward404Unless($validURI);
  }
}
