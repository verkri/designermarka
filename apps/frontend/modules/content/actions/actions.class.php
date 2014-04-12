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
    $this->logMessage('[ DISPLAY ] Home','notice');
    
    $this->slides = Doctrine_Core::getTable('MarkaHomeSlider')->getSlides();
    
    if ( $this->slides->count() == 0 )
      $this->logMessage('[ DISPLAY ] There are no slides to show!','warning');
  }
    
  public function executeContact(sfWebRequest $request)
  {
    sfConfig::set('app_menu','contact');
    $this->logMessage('[ DISPLAY ] Contact','notice');
    
    $this->form = new ContactForm();
  }
  
  public function executeContactSubmit(sfWebRequest $request)
  {
    sfConfig::set('app_menu','contact');
    $this->logMessage('[ USER ACTION ] Contact form submitted.','notice');
    
    $this->form = new ContactForm();
    
    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('contact'));
      if ($this->form->isValid()) {

        $msg = $this->form->getValue('message');
        $email = $this->form->getValue('email');
        
        $this->logMessage('[ FORM ] Contact form is valid. End user is '.$email,'notice');
        
        $message = $this->getMailer()->compose( 
                  array(sfConfig::get('app_contact_email') => 'DesignerMarka Contact'), 
                  sfConfig::get('app_contact_email'), 
                  $this->form->getValue('subject'), 
                  $msg );
        
        $message->setReplyTo($email);
        
        if ( $this->getMailer()->send($message) ) {
          
          $this->logMessage('[ MAILER ] E-mail sent successfully to '.sfConfig::get('app_contact_email'),'notice');
          
          // Check if notification is needed
          if ( sfConfig::get('app_write_notification_email') == true ) {
            
            $this->logMessage('[ NOTIFIER ] E-mail notification requested to '.sfConfig::get('app_notification_email'),'notice');
            
            if ( $this->getMailer()->composeAndSend(
                    array(sfConfig::get('app_contact_email') => 'DesignerMarka Notification'),
                    sfConfig::get('app_notification_email'),
                    'New contact message received!',
                    file_get_contents(sfConfig::get('sf_data_dir').'/mails/notification.html')
              ) ) {
              $this->logMessage('[ NOTIFIER ] E-mail notification sent successfully to '.sfConfig::get('app_notification_email'),'notice');              
            } else {
              $this->logMessage('[ NOTIFIER ] E-mail notification failed!','crit');
            }
          }
          
          $this->getUser()->setFlash('notice','Your message has been successfully submitted. We will contact you soon!');
          $this->redirect('@contact');
        
          
        } else {
          $this->logMessage('[ MAILER ] E-mail sending failed.','crit');
        }
      } else {
        $this->logMessage('[ FORM ] Contact form is invalid.','warning');
      }
    } else {
      $this->logMessage('[ FORM ] Contact form is posted by GET!','warning');
    }
  
    $this->getUser()->setFlash('error','An error occured when processing your message.');
    $this->setTemplate('contact');

  }
  
  public function executeAbout(sfWebRequest $request)
  {
    sfConfig::set('app_menu','about');
    $this->logMessage('[ DISPLAY ] About','notice');
  }
  
  public function executeBrowserView(sfWebRequest $request)
  {
    sfConfig::set('app_menu','world');
    
    //$this->cs_slug = $request->getParameter('colorscheme');
    $this->cat_slug = $request->getParameter('category_slug');
    $this->t_slug = $request->getParameter('type_slug');
  
    $this->logMessage('[ DISPLAY ] BrowserView, Category/Type : ['.$this->cat_slug.'/'.$this->t_slug.']','notice');
    
    $this->categories = Doctrine_Core::getTable('MarkaCategory')->getActiveCategories();
    
    /*if ( sfConfig::get('app_browser_type') == 'colorschemeByCategory' ) {
      $this->colorschemes = Doctrine_Core::getTable('MarkaColorScheme')->getActiveColorSchemes();
    } else {
      $this->categories = Doctrine_Core::getTable('MarkaCategory')->getActiveCategories();
    }*/
    
    $this->featured_count = Doctrine_Core::getTable('MarkaProduct')->getFeaturedCount();

    $this->logMessage('[ DISPLAY ] Featured item count is '.$this->featured_count,'notice');
  }  
  
  public function executeProductView(sfWebRequest $request)
  {
    sfConfig::set('app_menu','world');
    
    $this->product = $this->getRoute()->getObject();
    $this->logMessage('[ PRODUCT VIEW ] '.$this->product->getName(),'notice');
    
    $cat_slug = $request->getParameter('category_slug');
    //$cs_slug = $request->getParameter('colorscheme_slug');
    $t_slug = $request->getParameter('type_slug');
    
    $this->category = Doctrine_Core::getTable('MarkaCategory')->findBy('slug',$cat_slug)->getFirst();
    $this->type = Doctrine_Core::getTable('MarkaType')->findBy('slug',$t_slug)->getFirst();
    //$this->colorscheme = Doctrine_Core::getTable('MarkaColorScheme')->findBy('slug',$cs_slug)->getFirst();
        
    $this->images = $this->product->getImages();
        
    $date = new DateTime($this->product->getManufactured());
    $this->manufactured_timestamp = $date->format('U');
    
    $this->forward404Unless( $this->category && $this->type );
    
    // extra check for URL forgery
    $validURI = $this->product->getCategoryId() == $this->category->getId();
    //$validURI &= $this->product->getColorschemeId() == $this->colorscheme->getId();
    $validURI &= $this->product->getTypeId() == $this->type->getId();
    $this->forward404Unless($validURI);
    
  }
  
    public function executeEventbrowserView(sfWebRequest $request)
  {
    sfConfig::set('app_menu','event');
    
    $this->logMessage('[ DISPLAY ] BrowserView, Category/Type : ['.$this->cat_slug.'/'.$this->t_slug.']','notice');
    
	$this->events = Doctrine_Core::getTable('MarkaEvent')->getUpcoming();
	
	$this->events_n = Doctrine_Core::getTable('MarkaEvent')->getNotUpcoming();

    $this->logMessage('[ DISPLAY ] Featured item count is '.$this->featured_count,'notice');
  } 
  
   public function executeEventView(sfWebRequest $request)
  {
    sfConfig::set('app_menu','event');
    $this->event = $this->getRoute()->getObject();
    $this->logMessage('[ EVENT VIEW ] '.$this->event->getName(),'notice');
    
	$event_id = $request->getParameter('id');

    $this->images = $this->event->getImages();
   
    $date = new DateTime($this->event->getDate());

  }
  
  public function executeFetch(sfWebRequest $request)
  {
    $cat_slug = $request->getParameter('category_slug');
    $t_slug = $request->getParameter('type_slug');
    
    $this->logMessage('[ FETCH ] Category/Type : ['.$cat_slug.'/'.$t_slug.']','notice');
    
    $this->category = Doctrine_Core::getTable('MarkaCategory')->findBy('slug',$cat_slug)->getFirst();
    $this->type = Doctrine_Core::getTable('MarkaType')->findBy('slug',$t_slug)->getFirst();
    //$this->colorscheme = Doctrine_Core::getTable('MarkaColorScheme')->findBy('slug',$cs_slug)->getFirst();
      
    $this->products = Doctrine_Core::getTable('MarkaProduct')
            ->getProductsFiltered($this->category,$this->type);
    
    if ( $this->products->count() == 0 )
      $this->logMessage('[ FETCH ] There are no products in : ['.$cat_slug.'/'.$t_slug.']','crit');
    
    $this->is_featured_displayed = false;
  }
  
  public function executeFetchFeatured(sfWebRequest $request)
  {
    $this->logMessage('[ FETCH ] Featured','notice');
    $this->products = Doctrine_Core::getTable('MarkaProduct')->getFeatured(sfConfig::get('app_featured_display_count'));
    
    if ( $this->products->count() == 0 )
      $this->logMessage('[ FETCH ] There are no featured products!','crit');
    
    $this->setTemplate('fetch');
    $this->is_featured_displayed = true;
  }
  
}
