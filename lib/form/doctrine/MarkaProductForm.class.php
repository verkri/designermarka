<?php

/**
 * MarkaProduct form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MarkaProductForm extends BaseMarkaProductForm
{
  public function configure() {
    unset($this['created_at'], $this['slug'], $this['token']);

    $subForm = new sfForm();
    for ($i = 0; $i < 4; $i++) {
      $productPhoto = new MarkaProductImage();
      $productPhoto->Product = $this->getObject();

      $form = new MarkaProductImageForm($productPhoto);
      $form->configureForUpload();
      $subForm->embedForm($i, $form);
      
    }
    $subForm->mergePostValidator(new MarkaProductUploadImageValidatorSchema());
    $this->embedForm('newPhotos', $subForm);
    
    $i = 0;
    $subForm = new sfForm();
    foreach ( $this->getObject()->getImages() as $image ) {
      $form = new MarkaProductImageForm($image);
      $form->configureForDisplayAndRemove();
      
      $subForm->embedForm($i++, $form);
    }
    $this->embedForm('Photos', $subForm);
    
  } 
  
  public function saveEmbeddedForms($con = null, $forms = null) {
    if (null === $forms) {
      
      $images = $this->getValue('newPhotos');
      $forms = $this->embeddedForms;
      
      foreach ($this->embeddedForms['newPhotos'] as $name => $form) {
        if (!isset($images[$name])) {
          unset($forms['newPhotos'][$name]);
        }
      }
    }
    return parent::saveEmbeddedForms($con, $forms);
  }
  
  
  /* This is needed because the database records are not deleted when an image is deleted physically,
   * rather the image filename is set to blank.
   */
  
  protected function doSave($con = null) {
       
    parent::doSave($con);
    
    // do the DB cleanup and filesystem cleanup
    foreach ($this->getObject()->getImages() as $photo) {
      if ($photo->getFilename() == '') {
        $photo->delete();
      }
    }
    
  
  }
}
