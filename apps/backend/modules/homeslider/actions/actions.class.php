<?php

require_once dirname(__FILE__).'/../lib/homesliderGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/homesliderGeneratorHelper.class.php';

/**
 * homeslider actions.
 *
 * @package    sf_sandbox
 * @subpackage homeslider
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homesliderActions extends autoHomesliderActions
{
  public function preExecute()
  {
    parent::preExecute();
    sfConfig::set('app_menu','home_slider');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->marka_home_slider = $this->form->getObject();

    if ( $this->processForm($request, $this->form) ) {
      $this->redirect('@marka_home_slider');
    } else {
      $this->setTemplate('new'); 
    }    
  }
  
  public function executeUpdate(sfWebRequest $request)
  {
    $this->marka_home_slider = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->marka_home_slider);

    if ( $this->processForm($request, $this->form) )
      $this->redirect(array('sf_route' => 'marka_home_slider_edit', 'sf_subject' => $this->marka_home_slider));
    else
      $this->setTemplate('edit');
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $object = $form->save();
      } catch (Doctrine_Validator_Exception $e) {

        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
            $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        return false;
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $object)));
      $this->getUser()->setFlash('notice', $notice);
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
      return false;
    }
    return true;
  }
}
