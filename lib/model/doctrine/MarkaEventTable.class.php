<?php

class MarkaEventTable extends Doctrine_Table {

  public static function getInstance() {
    return Doctrine_Core::getTable('MarkaEvent');
  }
  
  /*public function getEventsFiltered(MarkaCategory $category, MarkaColorScheme $cs) {
    $q = $this->createQuery('p')
            ->where('category_id = ?',$category->getId())
            ->andWhere('colorscheme_id = ?',$cs->getId())
            ->orderBy('cadprice DESC');
    return $this->filterActiveEvents($q)->execute();
  }*/
  
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
  
  public function getFeatured($count = 8) {
    $q = $this->createQuery('p')
            ->where('featured = true')
            ->orderBy('random()');            
    return $this->filterActiveEvents($q)->limit($count)->execute();
  }
  
  public function getFeaturedCount() {
    $q = $this->createQuery('p')
            ->where('featured = true');
    return $this->filterActiveEvents($q)->count();
  }
  
  public function getActiveEvents(Doctrine_Query $q = null) {
    return $this->filterActiveEvents($q)->execute();
  }
  
/*
  public function retrieveActiveEvent(Doctrine_Query $q) {
    return $this->filterActiveEvents($q)->fetchOne();
  }

  

  public function countActiveEvents(Doctrine_Query $q = null) {
    return $this->filterActiveEvents($q)->count();
  }
*/
  
  public function filterActiveEvents(Doctrine_Query $q = null) {
    if (is_null($q)) {
      $q = Doctrine_Query::create()
              ->from('MarkaEvent m');
    }

    $alias = $q->getRootAlias();

   
    return $q;
  }

}