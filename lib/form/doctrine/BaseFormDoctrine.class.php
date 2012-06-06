<?php

/**
 * Project form base class.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormBaseTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class BaseFormDoctrine extends sfFormDoctrine
{
  public function setup()
  {
  }
  
  
  protected function removeFile($field)
  {
   
    Utility::logModel('BaseFormDoctrine','removeFile: '.$this->getObject()->$field);
    
    $directory = $this->validatorSchema[$field]->getOption('path');
    Utility::logModel('BaseFormDoctrine','directory: '.$directory);
    
    if ($directory && is_file($directory.DIRECTORY_SEPARATOR.$this->getObject()->$field) )
    {
      $filesystem = new sfFilesystem();
      
      $finder = sfFinder::type('file');
      $finder->name($this->getObject()->$field);
      
      $files = $finder->in(sfConfig::get('sf_web_dir').sfConfig::get('app_product_image_thumbnail_dir'));
      $filesystem->remove($files);
      
      $files = $finder->in(sfConfig::get('sf_web_dir').sfConfig::get('app_product_image_medium_dir'));
      $filesystem->remove($files);
    }
    
    parent::removeFile($field);
  }
  
}
