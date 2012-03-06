<?php

class metaComponents extends sfComponents
{  
  public function executeWorldSubmenu(sfWebRequest $request)  
  {  
    $this->marka_colorschemes = Doctrine_Core::getTable('MarkaColorScheme')->getNotEmptyColorSchemes();
  }
  
  public function executeAboutSubmenu(sfWebRequest $request)  
  {     
  }
  
  public function executeContactSubmenu(sfWebRequest $request)  
  {
    return sfView::NONE;
  }
}