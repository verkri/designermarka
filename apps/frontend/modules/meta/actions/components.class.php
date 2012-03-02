<?php

class metaComponents extends sfComponents
{  
  public function executeHeadersubmenu(sfWebRequest $request)  
  {  
    $this->marka_colorschemes = Doctrine_Core::getTable('MarkaColorScheme')->getNotEmptyColorSchemes();
  }
}