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
    $this->slides = Doctrine_Core::getTable('MarkaHomeSlider')->getSlides();
  }
    
  public function executeContact(sfWebRequest $request)
  {
    sfConfig::set('app_menu','contact');
    $this->form = new ContactForm();
  }
  
  public function executeContactSubmit(sfWebRequest $request)
  {
    sfConfig::set('app_menu','contact');
    
    $this->form = new ContactForm();
    
    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('contact'));
      if ($this->form->isValid()) {

        $msg = $this->form->getValue('message');
        $email = $this->form->getValue('email');
        
        $this->message = $this->getMailer()->compose(
            'contact@designermarka.com',
            sfConfig::get('app_contact_email'),
            $this->form->getValue('subject'),
            <<<EOF
A new message has been received from $email :
$msg
EOF
        );
 
        $this->getMailer()->send($this->message);
        
        $this->getUser()->setFlash('notice','Your message has been successfully submitted.');
        $this->redirect('@contact');
      } else {
        $this->getUser()->setFlash('error','An error occured when processing your message.');
        $this->setTemplate('contact');
      }
    }
  }
  
  public function executeAbout(sfWebRequest $request)
  {
    sfConfig::set('app_menu','about');
  }
  
  public function executeBrowserView(sfWebRequest $request)
  {
    $this->cs_slug = $request->getParameter('colorscheme');
    $this->cat_slug = $request->getParameter('category');
  
    if ( sfConfig::get('app_browser_type') == 'colorschemeByCategory' ) {
      $this->colorschemes = Doctrine_Core::getTable('MarkaColorScheme')->getActiveColorSchemes();
    } else {
      $this->categories = Doctrine_Core::getTable('MarkaCategory')->getActiveCategories();
    }
    
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
