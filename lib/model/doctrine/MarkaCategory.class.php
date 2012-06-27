<?php

/**
 * MarkaCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class MarkaCategory extends BaseMarkaCategory
{
  public function save(Doctrine_Connection $conn = null)
  {
    $this->setSlug( Utility::slugify($this->getName()) );
    return parent::save($conn);
  }
  
  public function getProductCount() {
    return $this->getProducts()->count();
  }
  
  /*public function getActiveColorschemes()
  {
    $q = Doctrine_Query::create()
      ->select('c.*')
      ->from('MarkaColorscheme c')
      ->innerJoin('c.Products p')
      ->where('p.category_id = ?', $this->getId())
      ->andWhere('p.is_active = true');
 
    return $q->execute();
  }*/
  
  public function getActiveTypes()
  {
    $q = Doctrine_Query::create()
      ->select('t.*')
      ->from('MarkaType t')
      ->innerJoin('t.Products p')
      ->where('p.category_id = ?', $this->getId())
      ->andWhere('p.is_active = true');
 
    return $q->execute();
  }
  
  
  /*
  public function countActiveProducts()
  {
    $q = Doctrine_Query::create()
      ->from('MarkaProduct m')
      ->where('m.category_id = ?', $this->getId());
 
    return Doctrine_Core::getTable('MarkaProduct')->countActiveProducts($q);
  }
  
  public function getActiveProducts()
  {
    $q = Doctrine_Query::create()
      ->from('MarkaProduct m')
      ->where('m.category_id = ?', $this->getId());
 
    return Doctrine_Core::getTable('MarkaProduct')->getActiveProducts($q);
  }*/
  
}
