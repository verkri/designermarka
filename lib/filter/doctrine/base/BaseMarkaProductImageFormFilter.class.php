<?php

/**
 * MarkaProductImage filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMarkaProductImageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'filename'   => new sfWidgetFormFilterInput(),
      'product_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Product'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'filename'   => new sfValidatorPass(array('required' => false)),
      'product_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Product'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('marka_product_image_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MarkaProductImage';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'filename'   => 'Text',
      'product_id' => 'ForeignKey',
    );
  }
}
