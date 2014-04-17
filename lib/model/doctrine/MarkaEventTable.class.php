<?php

class MarkaEventTable extends Doctrine_Table {

  public static function getInstance() {
    return Doctrine_Core::getTable('MarkaEvent');
  }
  
    public function getUpcoming() {
    $q = $this->createQuery('p')
            ->where('is_upcoming = true')
            ->orderBy('date');            
    return $this->filterUpcomingEvents($q)->execute();
  }
  
    public function getNotUpcoming() {
    $q = $this->createQuery('p')
            ->where('is_upcoming = false')
            ->orderBy('date');            
    return $this->filterUpcomingEvents($q)->execute();
  }
  
    public function filterUpcomingEvents(Doctrine_Query $q = null) {
    if (is_null($q)) {
      $q = Doctrine_Query::create()
              ->from('MarkaEvent m');
    }

    $alias = $q->getRootAlias();

   
    return $q;
  }

}