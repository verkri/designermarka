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
      $this->dispatcher->notify(new sfEvent($this, 'admin.publish_object', array('object' => $record)));
      $record->deactivate();
    }

    $this->getUser()->setFlash('notice', 'The selected items have been deactivated successfully.');
    $this->redirect('@marka_product');
  }
    
}
