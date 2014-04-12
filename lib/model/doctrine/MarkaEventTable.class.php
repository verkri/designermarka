<?php

class MarkaEventTable extends Doctrine_Table {

  public static function getInstance() {
    return Doctrine_Core::getTable('MarkaEvent');
  }
  
  public function getEventsFiltered(MarkaCategory $category, MarkaType $t) {
    $q = $this->createQuery('p')
            ->where('category_id = ?',$category->getId())
            ->andWhere('type_id = ?',$t->getId())
            ->orderBy('cadprice DESC');
    return $this->filterActiveEvents($q)->execute();
  }
  
    public function getUpcoming() {
    $q = $this->createQuery('p')
            ->where('is_upcoming = true')
            ->orderBy('date');            
    return $this->filterActiveEvents($q)->execute();
  }
  
    public function getNotUpcoming() {
    $q = $this->createQuery('p')
            ->where('is_upcoming = false')
            ->orderBy('date');            
    return $this->filterActiveEvents($q)->execute();
  }
  
  public function getActiveEvents(Doctrine_Query $q = null) {
    return $this->filterActiveEvents($q)->execute();
  }

  
  public function filterActiveEvents(Doctrine_Query $q = null) {
    if (is_null($q)) {
      $q = Doctrine_Query::create()
              ->from('MarkaEvent m');
    }

    $alias = $q->getRootAlias();

   
    return $q;
  }

}