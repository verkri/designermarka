<?php

class MarkaEventCurrentImageForm extends sfForm {

  public function configure() {
    if (!$event = $this->getOption('event')) {
      throw new InvalidArgumentException('You must provide a event object.');
    }

    $i = 0;
    foreach ( $event->getImages() as $image ) {
      $form = new MarkaEventImageForm($image);
      $form->configureForDisplayAndRemove();
      
      $this->embedForm($i++, $form);
    }
    //$this->mergePostValidator(new MarkaEventImageValidatorSchema());
  }
  
}

/*
class MarkaEventCurrentImageForm extends BaseMarkaEventImageForm {
  
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
      'path'       => sfConfig::get('sf_web_dir') . sfConfig::get('app_event_image_dir'),
      'mime_types' => 'web_images'
    ));
    
    $this->validatorSchema['filename_delete'] = new sfValidatorPass();
  }
}*/

?>
