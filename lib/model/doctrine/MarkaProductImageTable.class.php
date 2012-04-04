<?php

/**
 * MarkaProductImageTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MarkaProductImageTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object MarkaProductImageTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('MarkaProductImage');
    }
    
    public function getPrimaryImageOf($product_id) {
      $coll = $this->createQuery('c')->where("c.product_id = $product_id")->andWhere('is_primary = true')->limit(1)->execute();
      return $coll->getFirst();
    }
    
    public function getAdditionalImagesOf($product_id) {
      return $this->createQuery('c')->where("c.product_id = $product_id")->andWhere('is_primary = false')->limit(1)->execute();
    }
}