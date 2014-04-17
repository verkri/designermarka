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
      'is_upcoming'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'date'   => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'is_upcoming'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'date'        => new sfValidatorPass(array('required' => false)),   
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
      'date'		 => 'Date',
      'place'        => 'Text',
      'upcoming'     => 'Boolean',
      'description'  => 'Text',
      'short'        => 'Text',
      'created_at'   => 'Date',
    );
  }
}
