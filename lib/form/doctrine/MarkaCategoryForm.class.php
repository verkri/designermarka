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
    
    $icon_options = array(
      'label' => "Category Icon",
      'file_src' => $this->getObject()->getIconpath(),
      'edit_mode' => true,
      'template'  => '<div>%input%</div><br/>',
      'with_delete' => true,
      'delete_label' => 'Remove icon',
    );
    
    if ( $this->getObject()->hasIcon() ) {
      $icon_options['is_image'] = true;
      $icon_options['template'] .= '<div class="clearfix">%delete_label% %delete%</div><br/><div>%file%</div><br/>';
      $icon_options['with_delete'] = true;
    }
    
    $this->widgetSchema['icon'] = new sfWidgetFormInputFileEditable($icon_options);
    
    $this->validatorSchema['icon'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_web_dir') . sfConfig::get('app_category_icon_dir'),
      'mime_types' => 'web_images'
    ));
    
    $this->validatorSchema['icon_delete'] = new sfValidatorPass();
  }
}
