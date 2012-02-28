<?php

/**
 * MarkaOrderDetails form base class.
 *
 * @method MarkaOrderDetails getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMarkaOrderDetailsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'order_id'   => new sfWidgetFormInputHidden(),
      'product_id' => new sfWidgetFormInputHidden(),
      'quantity'   => new sfWidgetFormInputText(),
      'cadprice'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'order_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('order_id')), 'empty_value' => $this->getObject()->get('order_id'), 'required' => false)),
      'product_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('product_id')), 'empty_value' => $this->getObject()->get('product_id'), 'required' => false)),
      'quantity'   => new sfValidatorInteger(array('required' => false)),
      'cadprice'   => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('marka_order_details[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MarkaOrderDetails';
  }

}
