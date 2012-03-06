<?php

/**
 * MarkaCategory form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MarkaCategoryForm extends BaseMarkaCategoryForm
{
  public function configure()
  {
    unset( $this['created_at'], $this['slug'] );
    
    $this->widgetSchema['image'] = new sfWidgetFormInputFile(array(
      'label' => 'Category Image',
    ));
    
    $this->validatorSchema['image'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/category',
      'mime_types' => 'web_images',
    ));
    
  }
}
