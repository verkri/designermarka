<?php

/**
 * MarkaProduct form base class.
 *
 * @method MarkaProduct getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMarkaProductForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'name'           => new sfWidgetFormInputText(),
      'slug'           => new sfWidgetFormInputText(),
      'category_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => false)),
      'colorscheme_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ColorScheme'), 'add_empty' => false)),
      'manufactured'   => new sfWidgetFormDate(),
      'token'          => new sfWidgetFormInputText(),
      'stockqty'       => new sfWidgetFormInputText(),
      'cadprice'       => new sfWidgetFormInputText(),
      'is_active'      => new sfWidgetFormInputCheckbox(),
      'description'    => new sfWidgetFormTextarea(),
      'short'          => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'           => new sfValidatorString(array('max_length' => 255)),
      'slug'           => new sfValidatorString(array('max_length' => 255)),
      'category_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'))),
      'colorscheme_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ColorScheme'))),
      'manufactured'   => new sfValidatorDate(array('required' => false)),
      'token'          => new sfValidatorString(array('max_length' => 255)),
      'stockqty'       => new sfValidatorInteger(array('required' => false)),
      'cadprice'       => new sfValidatorInteger(),
      'is_active'      => new sfValidatorBoolean(array('required' => false)),
      'description'    => new sfValidatorString(array('max_length' => 3000, 'required' => false)),
      'short'          => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'created_at'     => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'MarkaProduct', 'column' => array('name'))),
        new sfValidatorDoctrineUnique(array('model' => 'MarkaProduct', 'column' => array('slug'))),
        new sfValidatorDoctrineUnique(array('model' => 'MarkaProduct', 'column' => array('token'))),
      ))
    );

    $this->widgetSchema->setNameFormat('marka_product[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MarkaProduct';
  }

}
