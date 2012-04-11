<?php

/**
 * MarkaProduct filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMarkaProductFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slug'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'category_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
      'colorscheme_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ColorScheme'), 'add_empty' => true)),
      'manufactured'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'token'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'stockqty'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cadprice'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_active'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'featured'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'description'    => new sfWidgetFormFilterInput(),
      'short'          => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'           => new sfValidatorPass(array('required' => false)),
      'slug'           => new sfValidatorPass(array('required' => false)),
      'category_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Category'), 'column' => 'id')),
      'colorscheme_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ColorScheme'), 'column' => 'id')),
      'manufactured'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'token'          => new sfValidatorPass(array('required' => false)),
      'stockqty'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cadprice'       => new sfValidatorPass(array('required' => false)),
      'is_active'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'featured'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'description'    => new sfValidatorPass(array('required' => false)),
      'short'          => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('marka_product_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MarkaProduct';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'name'           => 'Text',
      'slug'           => 'Text',
      'category_id'    => 'ForeignKey',
      'colorscheme_id' => 'ForeignKey',
      'manufactured'   => 'Date',
      'token'          => 'Text',
      'stockqty'       => 'Number',
      'cadprice'       => 'Text',
      'is_active'      => 'Boolean',
      'featured'       => 'Boolean',
      'description'    => 'Text',
      'short'          => 'Text',
      'created_at'     => 'Date',
    );
  }
}
