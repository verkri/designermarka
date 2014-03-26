<?php

class MarkaEventUploadImageValidatorSchema extends sfValidatorSchema
{
  protected function configure($options = array(), $messages = array())
  {
    $this->addMessage('filename', 'The filename is required.');
  }
 
  protected function doClean($values)
  {
    foreach($values as $key => $value)
    {
      // no filename, remove the empty values
      if (!$value['filename'])
      {
        unset($values[$key]);
      }
    }
    return $values;
  }
}

?>
