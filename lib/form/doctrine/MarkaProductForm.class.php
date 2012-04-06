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
  public function configure()
  {
    unset($this['created_at'], $this['slug'], $this['token']);
    
    $form = new MarkaProductCurrentImageForm(null, array(
      'product' => $this->getObject()
    ));
    $this->embedForm('currentImages',$form);
    
    $form = new MarkaProductUploadImageForm(null, array(
      'product' => $this->getObject()
    ));
    $this->embedForm('newImages', $form);
  }
  
  public function saveEmbeddedForms($con = null, $forms = null) {
    if (null === $forms) {
      
      $images = $this->getValue('newImages');
      $forms = $this->embeddedForms;
      
      foreach ($this->embeddedForms['newImages'] as $name => $form) {
        if (!isset($images[$name])) {
          unset($forms['newImages'][$name]);
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
    foreach ($this->getObject()->getImages() as $photo) {
      if ($photo->getFilename() == '') {
        $photo->delete();
      }
    }
  }
}
