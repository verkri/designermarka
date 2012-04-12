<?php

/**
 * MarkaHomeSlider form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MarkaHomeSliderForm extends BaseMarkaHomeSliderForm
{
  public function configure()
  {
    $image_options = array(
      'is_image' => true,
      'file_src' => $this->getObject()->getImagepath(),
      'edit_mode' => true,
      'with_delete' => false
    );
    
    $this->widgetSchema['filename'] = new sfWidgetFormInputFileEditable($image_options,array('widht' => '640', 'height' => '480'));
    
    $this->validatorSchema['filename'] = new sfValidatorFile(array(
      'required'   => true,
      'path'       => sfConfig::get('sf_web_dir') . sfConfig::get('app_slider_image_dir'),
      'mime_types' => 'web_images'
    ));
  }
}
