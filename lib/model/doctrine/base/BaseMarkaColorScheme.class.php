<?php

/**
 * BaseMarkaColorScheme
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $slug
 * @property Doctrine_Collection $Products
 * 
 * @method string              getName()     Returns the current record's "name" value
 * @method string              getSlug()     Returns the current record's "slug" value
 * @method Doctrine_Collection getProducts() Returns the current record's "Products" collection
 * @method MarkaColorScheme    setName()     Sets the current record's "name" value
 * @method MarkaColorScheme    setSlug()     Sets the current record's "slug" value
 * @method MarkaColorScheme    setProducts() Sets the current record's "Products" collection
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMarkaColorScheme extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('marka_color_scheme');
        $this->hasColumn('name', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 100,
             ));
        $this->hasColumn('slug', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('MarkaProduct as Products', array(
             'local' => 'id',
             'foreign' => 'colorscheme_id'));
    }
}