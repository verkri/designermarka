<?php

require_once dirname(__FILE__).'/../lib/eventGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/eventGeneratorHelper.class.php';

/**
 * event actions.
 *
 * @package    sf_sandbox
 * @subpackage event
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eventActions extends autoEventActions
{
  
  public function preExecute()
  {
    parent::preExecute();
    sfConfig::set('app_menu','event');
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $this->marka_event = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->marka_event);
    
    $this->image_count = $this->marka_event->getImages()->count();
    
  }
  
   
  
}
