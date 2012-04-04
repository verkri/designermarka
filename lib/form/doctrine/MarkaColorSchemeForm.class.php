<?php

/**
 * MarkaColorScheme form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MarkaColorSchemeForm extends BaseMarkaColorSchemeForm
{
  public function configure()
  {
    unset( $this['created_at'], $this['slug'] );
    
    $image_options = array(
      'label' => "Colorscheme's Image",
      'file_src' => $this->getObject()->getImagepath(),
      'edit_mode' => true,
      'template'  => '<div>%input%</div><br/>',
    );
    if ( $this->getObject()->hasImage() ) {
      $image_options['is_image'] = true;
      $image_options['template'] .= '<div class="clearfix">%delete_label% %delete%</div><br/><div>%file%</div><br/>';
      $image_options['with_delete'] = true;
      $image_options['delete_label'] = "Remove image";
    }
    $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable($image_options);
    
    $this->validatorSchema['image'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_web_dir') . sfConfig::get('app_colorscheme_image_dir'),
      'mime_types' => 'web_images'
    ));
    
    $this->validatorSchema['image_delete'] = new sfValidatorPass();
  }
 
}
