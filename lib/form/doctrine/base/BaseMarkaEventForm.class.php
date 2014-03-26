<?php

/**
 * MarkaEvent form base class.
 *
 * @method MarkaEvent getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMarkaEventForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'name'         => new sfWidgetFormInputText(),
      'manufactured' => new sfWidgetFormDate(),
      'token'        => new sfWidgetFormInputText(),
      'stockqty'     => new sfWidgetFormInputText(),
      'cadprice'     => new sfWidgetFormInputText(),
      'is_active'    => new sfWidgetFormInputCheckbox(),
      'featured'     => new sfWidgetFormInputCheckbox(),
      'description'  => new sfWidgetFormTextarea(),
      'short'        => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 50)),
      'slug'         => new sfValidatorString(array('max_length' => 50)),


      'manufactured' => new sfValidatorDate(array('required' => false)),
      'token'        => new sfValidatorString(array('max_length' => 255)),
      'stockqty'     => new sfValidatorInteger(array('required' => false)),
      'cadprice'     => new sfValidatorPass(),
      'is_active'    => new sfValidatorBoolean(array('required' => false)),
      'featured'     => new sfValidatorBoolean(array('required' => false)),
      'description'  => new sfValidatorString(array('max_length' => 2000, 'required' => false)),
      'short'        => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'   => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'MarkaEvent', 'column' => array('name'))),
      ))
    );

    $this->widgetSchema->setNameFormat('marka_event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MarkaEvent';
  }

}
