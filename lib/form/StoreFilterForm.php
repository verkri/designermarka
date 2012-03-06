<?php 

class StoreFilterForm extends BaseForm
{
  public function configure()
  {
    $this->widgetSchema['colorscheme'] = new sfWidgetFormChoice(array(
      'choices' => Doctrine_Core::getTable('MarkaColorscheme')->getChoices(),
      'expanded' => true,
      'multiple' => true
    ));    
    $this->validatorSchema['colorscheme'] = new sfValidatorChoice(array(
      'choices' => array_keys(Doctrine_Core::getTable('MarkaColorscheme')->getChoices()),
      'multiple' => true,
      'min' => 1
    ));
        
    $this->widgetSchema['category'] = new sfWidgetFormChoice(array(
      'choices' => MarkaCategoryTable::getInstance()->getChoices(),
      'expanded' => true,
      'multiple' => true
    ));
    
    $this->validatorSchema['category'] = new sfValidatorChoice(array(
      'choices' => array_keys(Doctrine_Core::getTable('MarkaCategory')->getChoices()),
      'multiple' => true,
      'min' => 1
    ));
    
    $this->widgetSchema->setFormFormatterName('list');
    
    $this->widgetSchema->setNameFormat('store_filter[%s]');
  }
  
}