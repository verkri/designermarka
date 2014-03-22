<?php

/**
 * MarkaEvent filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMarkaEventFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
     'date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate())),
      'place'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_upcoming'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'description'  => new sfWidgetFormFilterInput(),
      'short'        => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'         => new sfValidatorPass(array('required' => false)),
	  'date' => new sfValidatorDateRange(array('required' => false )),
      'place'        => new sfValidatorPass(array('required' => false)),
      'is_upcoming'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'description'  => new sfValidatorPass(array('required' => false)),
      'short'        => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('marka_event_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MarkaEvent';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'name'         => 'Text',
      'date'         => 'Date',
      'place'        => 'Text',
      'is_upcoming'    => 'Boolean',
      'description'  => 'Text',
      'short'        => 'Text',
      'created_at'   => 'Date',
    );
  }
}
