<?php

/**
 * MarkaColorScheme form base class.
 *
 * @method MarkaColorScheme getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMarkaColorSchemeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'name' => new sfWidgetFormInputText(),
      'slug' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name' => new sfValidatorString(array('max_length' => 100)),
      'slug' => new sfValidatorString(array('max_length' => 100)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'MarkaColorScheme', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'MarkaColorScheme', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('marka_color_scheme[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MarkaColorScheme';
  }

}
