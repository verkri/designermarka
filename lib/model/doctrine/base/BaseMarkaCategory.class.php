<?php

/**
 * BaseMarkaCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property Doctrine_Collection $Products
 * 
 * @method string              getName()     Returns the current record's "name" value
 * @method Doctrine_Collection getProducts() Returns the current record's "Products" collection
 * @method MarkaCategory       setName()     Sets the current record's "name" value
 * @method MarkaCategory       setProducts() Sets the current record's "Products" collection
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMarkaCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('marka_category');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('MarkaProduct as Products', array(
             'local' => 'id',
             'foreign' => 'category_id'));
    }
}