<?php

/**
 * MarkaCustomer form base class.
 *
 * @method MarkaCustomer getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMarkaCustomerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'surname'    => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'telephone'  => new sfWidgetFormInputText(),
      'country'    => new sfWidgetFormInputText(),
      'state'      => new sfWidgetFormInputText(),
      'zipcode'    => new sfWidgetFormInputText(),
      'city'       => new sfWidgetFormInputText(),
      'address'    => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'surname'    => new sfValidatorString(array('max_length' => 255)),
      'email'      => new sfValidatorEmail(array('max_length' => 100)),
      'telephone'  => new sfValidatorString(array('max_length' => 15)),
      'country'    => new sfValidatorString(array('max_length' => 100)),
      'state'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'zipcode'    => new sfValidatorInteger(array('required' => false)),
      'city'       => new sfValidatorString(array('max_length' => 100)),
      'address'    => new sfValidatorString(array('max_length' => 255)),
      'created_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('marka_customer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MarkaCustomer';
  }

}
