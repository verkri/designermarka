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
  }
  
  public function executeContact(sfWebRequest $request)
  {
    sfConfig::set('app_menu','contact');
    sfConfig::set('app_submenu','');
  }
  
}
