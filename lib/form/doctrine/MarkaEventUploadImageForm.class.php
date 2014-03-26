<?php

class MarkaEventUploadImageForm extends sfForm {

  public function configure() {
    if (!$event = $this->getOption('event')) {
      throw new InvalidArgumentException('You must provide a event object.');
    }

    for ($i = 0; $i < $this->getOption('size', sfConfig::get('app_event_upload_image_count') ); $i++) {
      $eventImage = new MarkaEventImage();
      $eventImage->Event = $event;

      $form = new MarkaEventImageForm($eventImage);
      $form->configureForUpload();

      $this->embedForm($i, $form);
    }
    $this->mergePostValidator(new MarkaEventUploadImageValidatorSchema());
  }
  
}

?>
