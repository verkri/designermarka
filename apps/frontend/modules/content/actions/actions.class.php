<?php

/**
 * content actions.
 *
 * @package    sf_sandbox
 * @subpackage content
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contentActions extends sfActions
{
  
  public function executeHome(sfWebRequest $request)
  {
    sfConfig::set('app_menu','home');
    
    // search for slides
    $dir_pattern = sfConfig::get('sf_web_dir').sfConfig::get('app_slider_image_dir').'*.'.sfConfig::get('app_slider_image_ext');
    $this->slides=glob($dir_pattern);
    for ( $i= 0; $i < count($this->slides); ++$i ) {
      $this->slides[$i] = sfConfig::get('app_slider_image_dir') . basename($this->slides[$i]);
    }
  }
    
  public function executeContact(sfWebRequest $request)
  {
    sfConfig::set('app_menu','contact');
  }
  
  public function executeAbout(sfWebRequest $request)
  {
    sfConfig::set('app_menu','about');
  }
  
  public function executeBrowserView(sfWebRequest $request)
  {
    $this->cs_slug = $request->getParameter('colorscheme');
    $this->cat_slug = $request->getParameter('category');
  
    $this->colorschemes = Doctrine_Core::getTable('MarkaColorScheme')->getActiveColorSchemes();
    
    sfConfig::set('app_menu','world');
  }  
  
  public function executeProductView(sfWebRequest $request)
  {
    $this->product = $this->getRoute()->getObject();
    
    $cat_slug = $request->getParameter('category_slug');
    $cs_slug = $request->getParameter('colorscheme_slug');
    
    $this->category = Doctrine_Core::getTable('MarkaCategory')->findBy('slug',$cat_slug)->getFirst();
    $this->colorscheme = Doctrine_Core::getTable('MarkaColorScheme')->findBy('slug',$cs_slug)->getFirst();
        
    $this->images = $this->product->getImages();
        
    $date = new DateTime($this->product->getManufactured());
    $this->manufactured_timestamp = $date->format('U');
    
    $this->forward404Unless( $this->category && $this->colorscheme );
    
    // extra check for URL forgery
    $validURI = $this->product->getCategoryId() == $this->category->getId();
    $validURI &= $this->product->getColorschemeId() == $this->colorscheme->getId();
    $this->forward404Unless($validURI);
    
    sfConfig::set('app_menu','world');
  }
  
  public function executeFetch(sfWebRequest $request)
  {
    $cat_slug = $request->getParameter('category_slug');
    $cs_slug = $request->getParameter('colorscheme_slug');
    
    $this->category = Doctrine_Core::getTable('MarkaCategory')->findBy('slug',$cat_slug)->getFirst();
    $this->colorscheme = Doctrine_Core::getTable('MarkaColorScheme')->findBy('slug',$cs_slug)->getFirst();
      
    $this->products = Doctrine_Core::getTable('MarkaProduct')
            ->getProductsFiltered($this->category,$this->colorscheme);
  }
  
  public function executeFetchFeatured(sfWebRequest $request)
  {
    $this->products = Doctrine_Core::getTable('MarkaProduct')->getFeatured(sfConfig::get('app_featured_display_count'));
    $this->setTemplate('fetch');
  }
  
}
