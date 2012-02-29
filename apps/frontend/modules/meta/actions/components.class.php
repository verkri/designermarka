<?php

class metaComponents extends sfComponents
{  
  public function executeHeadersubmenu(sfWebRequest $request)  
  {  
    $this->marka_categories = Doctrine_Core::getTable('MarkaCategory')->getNotEmptyCategories();
  }
}