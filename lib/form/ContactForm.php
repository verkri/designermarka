<?php

class ContactForm extends BaseForm
{
  public function configure()
  {
    
    $this->setWidgets(array(
      'email'             => new sfWidgetFormInputText(array('label' => 'E-mail:'),array('size' => 40, 'maxlength' => 255)),
      'subject'           => new sfWidgetFormInputText(array('label' => 'Subject:'),array('size' => 40, 'maxlength' => 100)),
      'message'           => new sfWidgetFormTextArea(array('label' => 'Message:'),array('rows' => 15, 'cols' => 58))
    ));
    
    $this->widgetSchema->setNameFormat('contact[%s]');
    
    $this->setValidators(array(
      'email'          => new sfValidatorEmail(array('max_length' => 255, 'required' => true)),
      'subject'        => new sfValidatorString(array('max_length' => 100, 'required' => true)),
      'message'        => new sfValidatorString(array('max_length' => 1000, 'required' => true)),
    ));
    
  }
  
}