<?php

/**
 * MarkaHomeSlider form base class.
 *
 * @method MarkaHomeSlider getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMarkaHomeSliderForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'filename' => new sfWidgetFormInputText(),
      'caption'  => new sfWidgetFormInputText(),
      'priority' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'filename' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'caption'  => new sfValidatorString(array('max_length' => 100)),
      'priority' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('marka_home_slider[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MarkaHomeSlider';
  }

}
