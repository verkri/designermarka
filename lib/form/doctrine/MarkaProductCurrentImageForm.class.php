<?php

class MarkaProductCurrentImageForm extends sfForm {

  public function configure() {
    if (!$product = $this->getOption('product')) {
      throw new InvalidArgumentException('You must provide a product object.');
    }

    $i = 0;
    foreach ( $product->getImages() as $image ) {
      $form = new MarkaProductImageForm($image);
      $form->configureForDisplayAndRemove();
      
      $this->embedForm($i++, $form);
    }
    //$this->mergePostValidator(new MarkaProductImageValidatorSchema());
  }
  
}

/*
class MarkaProductCurrentImageForm extends BaseMarkaProductImageForm {
  
  public function configure()
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
}*/

?>
