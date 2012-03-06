<?php

/**
 * MarkaColorScheme filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMarkaColorSchemeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slug'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hexcolor1'   => new sfWidgetFormFilterInput(),
      'hexcolor2'   => new sfWidgetFormFilterInput(),
      'hexcolor3'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'slug'        => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'hexcolor1'   => new sfValidatorPass(array('required' => false)),
      'hexcolor2'   => new sfValidatorPass(array('required' => false)),
      'hexcolor3'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('marka_color_scheme_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MarkaColorScheme';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'slug'        => 'Text',
      'description' => 'Text',
      'hexcolor1'   => 'Text',
      'hexcolor2'   => 'Text',
      'hexcolor3'   => 'Text',
    );
  }
}
