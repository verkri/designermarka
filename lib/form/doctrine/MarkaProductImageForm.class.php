<?php

/**
 * MarkaProductImage form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MarkaProductImageForm extends BaseMarkaProductImageForm
{

  public function configureForUpload()
  {
    $this->useFields(array('filename'));
    
    $this->setWidget('filename', new sfWidgetFormInputFile(array('label' => false)));
    
    $this->setValidator('filename', new sfValidatorFile(array(
      'required' => false,
      'mime_types' => 'web_images',
      'path' => sfConfig::get('sf_web_dir') . sfConfig::get('app_product_image_dir'),
    )));
  }
  
  public function configureForDisplayAndRemove()
  {
    $this->useFields(array('filename'));
    
    $image_options = array(
      'label' => false,
      'is_image' => true,
      'file_src' => $this->getObject()->getImagepath(),
      'edit_mode' => true,
      'with_delete' => true,
      'delete_label' => 'Delete photo',
      'template'  => '<div class="current_photo">%file%</div><br/>%delete%%delete_label%'
    );
    $this->widgetSchema['filename'] = new sfWidgetFormInputFileEditable($image_options);
    
    $this->validatorSchema['filename'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_web_dir') . sfConfig::get('app_product_image_dir'),
      'mime_types' => 'web_images'
    ));
    
    $this->validatorSchema['filename_delete'] = new sfValidatorPass();
  }
  

}
