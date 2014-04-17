<?php

require_once dirname(__FILE__).'/../lib/eventGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/eventGeneratorHelper.class.php';

/**
 * event actions.
 *
 * @package    sf_sandbox
 * @subpackage event
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class eventActions extends autoEventActions
{
  
  public function preExecute()
  {
    parent::preExecute();
    sfConfig::set('app_menu','event');
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $this->marka_event = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->marka_event);
    
    $this->image_count = $this->marka_event->getImages()->count();
    
  }
  
 public function executeBatchMarkAsPastEvent(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $records = Doctrine_Query::create()
      ->from('MarkaEvent')
      ->whereIn('id', $ids)
      ->execute();

    foreach ($records as $record)
    {
      $this->dispatcher->notify(new sfEvent($this, 'admin.past_object', array('object' => $record)));
      $record->markAsPastEvent();
    }

    $this->getUser()->setFlash('notice', 'The selected items have been marked as past event.');
    $this->redirect('@marka_event');
  }
  
      public function executeBatchMarkAsUpcomingEvent(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $records = Doctrine_Query::create()
      ->from('MarkaEvent')
      ->whereIn('id', $ids)
      ->execute();

    foreach ($records as $record)
    {
      $this->dispatcher->notify(new sfEvent($this, 'admin.upcoming_object', array('object' => $record)));
      $record->markAsUpcomingEvent();
    }

    $this->getUser()->setFlash('notice', 'The selected items have been marked as upcoming event.');
    $this->redirect('@marka_event');
  }
  
}
