<?php

class MarkaProductTable extends Doctrine_Table {

  public static function getInstance() {
    return Doctrine_Core::getTable('MarkaProduct');
  }
  
  public function getProductsFiltered(MarkaCategory $category, MarkaColorScheme $cs) {
    $q = $this->createQuery('p')
            ->where('category_id = ?',$category->getId())
            ->andWhere('colorscheme_id = ?',$cs->getId());
    return $this->filterActiveProducts($q)->execute();
  }
  
/*
  public function retrieveActiveProduct(Doctrine_Query $q) {
    return $this->filterActiveProducts($q)->fetchOne();
  }

  public function getActiveProducts(Doctrine_Query $q = null) {
    return $this->filterActiveProducts($q)->execute();
  }

  public function countActiveProducts(Doctrine_Query $q = null) {
    return $this->filterActiveProducts($q)->count();
  }
*/
  
  public function filterActiveProducts(Doctrine_Query $q = null) {
    if (is_null($q)) {
      $q = Doctrine_Query::create()
              ->from('MarkaProduct m');
    }

    $alias = $q->getRootAlias();

    $q->andWhere($alias . '.is_active = true');
    return $q;
  }

}