<?php

/**
 * event module configuration.
 *
 * @package    sf_sandbox
 * @subpackage event
 * @author     Your name here
 * @version    SVN: $Id: configuration.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eventGeneratorConfiguration extends BaseEventGeneratorConfiguration
{
  public function getCurrentImagesForm($event) {
    $ret = new sfForm;
    if ( $images != null ) {
      $i = 0;
      foreach ($event->getImages() as $image) {
        $form = new MarkaEventImageForm($image);
        $form->configureForDisplayAndRemove();

        $ret->embedForm($i++, $form);
      }
    }
    return $ret;
  }
  
  public function getUploadImagesForm($event) {
    return new MarkaEventUploadImageForm(null, array(
      'event' => $event
    ));
  
  }
}
