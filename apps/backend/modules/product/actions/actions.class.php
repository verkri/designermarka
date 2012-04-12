<?php

require_once dirname(__FILE__).'/../lib/productGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/productGeneratorHelper.class.php';

/**
 * product actions.
 *
 * @package    sf_sandbox
 * @subpackage product
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class productActions extends autoProductActions
{
  
  public function preExecute()
  {
    parent::preExecute();
    sfConfig::set('app_menu','product');
  }
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->marka_product = $this->form->getObject();

    if ( $this->processForm($request, $this->form) ) {
      $this->redirect('@marka_product');
    } else {
      $this->setTemplate('new'); 
    }    
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
    
  public function executeBatchActivate(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $records = Doctrine_Query::create()
      ->from('MarkaProduct')
      ->whereIn('id', $ids)
      ->execute();

    foreach ($records as $record)
    {
      $this->dispatcher->notify(new sfEvent($this, 'admin.publish_object', array('object' => $record)));
      $record->activate();
    }

    $this->getUser()->setFlash('notice', 'The selected items have been activated successfully.');
    $this->redirect('@marka_product');
  }
  
  public function executeBatchDeactivate(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $records = Doctrine_Query::create()
      ->from('MarkaProduct')
      ->whereIn('id', $ids)
      ->execute();

    foreach ($records as $record)
    {
      $this->dispatcher->notify(new sfEvent($this, 'admin.unpublish_object', array('object' => $record)));
      $record->deactivate();
    }

    $this->getUser()->setFlash('notice', 'The selected items have been deactivated successfully.');
    $this->redirect('@marka_product');
  }
    
  public function executeBatchFeaturize(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $records = Doctrine_Query::create()
      ->from('MarkaProduct')
      ->whereIn('id', $ids)
      ->execute();

    foreach ($records as $record)
    {
      $this->dispatcher->notify(new sfEvent($this, 'admin.featuring_object', array('object' => $record)));
      $record->featurize();
    }

    $this->getUser()->setFlash('notice', 'The selected items have been set featured.');
    $this->redirect('@marka_product');
  }
  
  public function executeBatchUnfeaturize(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $records = Doctrine_Query::create()
      ->from('MarkaProduct')
      ->whereIn('id', $ids)
      ->execute();

    foreach ($records as $record)
    {
      $this->dispatcher->notify(new sfEvent($this, 'admin.featuring_object', array('object' => $record)));
      $record->unfeaturize();
    }

    $this->getUser()->setFlash('notice', 'The selected items have been removed from the featured set.');
    $this->redirect('@marka_product');
  }
  
}
