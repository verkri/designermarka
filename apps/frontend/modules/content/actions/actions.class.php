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
    sfConfig::set('app_menu','world');
    sfConfig::set('app_submenu','');
    
    // search for slides
    $dir_pattern = sfConfig::get('app_slider_image_dir').'*.'.sfConfig::get('app_image_ext');
    $this->slides=glob($dir_pattern);
  }
    
  public function executeContact(sfWebRequest $request)
  {
    sfConfig::set('app_menu','contact');
    sfConfig::set('app_submenu','');
  }
  
  public function executeAboutDesigner(sfWebRequest $request)
  {
    sfConfig::set('app_menu','about');
    sfConfig::set('app_submenu','designer');
    
    $this->setTemplate('about');
  }
  
  public function executeAboutPress(sfWebRequest $request)
  {
    sfConfig::set('app_menu','about');
    sfConfig::set('app_submenu','press');
    
    $this->setTemplate('about');
  }
  
  public function executeAboutBlog(sfWebRequest $request)
  {
    sfConfig::set('app_menu','about');
    sfConfig::set('app_submenu','blog');
    
    $this->setTemplate('about');
  }
}
