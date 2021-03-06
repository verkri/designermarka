<?php

/**
 * BaseMarkaCustomer
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $telephone
 * @property string $country
 * @property string $state
 * @property integer $zipcode
 * @property string $city
 * @property string $address
 * @property Doctrine_Collection $Orders
 * 
 * @method string              getName()      Returns the current record's "name" value
 * @method string              getSurname()   Returns the current record's "surname" value
 * @method string              getEmail()     Returns the current record's "email" value
 * @method string              getTelephone() Returns the current record's "telephone" value
 * @method string              getCountry()   Returns the current record's "country" value
 * @method string              getState()     Returns the current record's "state" value
 * @method integer             getZipcode()   Returns the current record's "zipcode" value
 * @method string              getCity()      Returns the current record's "city" value
 * @method string              getAddress()   Returns the current record's "address" value
 * @method Doctrine_Collection getOrders()    Returns the current record's "Orders" collection
 * @method MarkaCustomer       setName()      Sets the current record's "name" value
 * @method MarkaCustomer       setSurname()   Sets the current record's "surname" value
 * @method MarkaCustomer       setEmail()     Sets the current record's "email" value
 * @method MarkaCustomer       setTelephone() Sets the current record's "telephone" value
 * @method MarkaCustomer       setCountry()   Sets the current record's "country" value
 * @method MarkaCustomer       setState()     Sets the current record's "state" value
 * @method MarkaCustomer       setZipcode()   Sets the current record's "zipcode" value
 * @method MarkaCustomer       setCity()      Sets the current record's "city" value
 * @method MarkaCustomer       setAddress()   Sets the current record's "address" value
 * @method MarkaCustomer       setOrders()    Sets the current record's "Orders" collection
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMarkaCustomer extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('marka_customer');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('surname', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('email', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'email' => true,
             'length' => 100,
             ));
        $this->hasColumn('telephone', 'string', 15, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 15,
             ));
        $this->hasColumn('country', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('state', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('zipcode', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('city', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('address', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('MarkaOrder as Orders', array(
             'local' => 'id',
             'foreign' => 'customer_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             'created' => 
             array(
              'name' => 'created_at',
              'type' => 'timestamp',
             ),
             'updated' => 
             array(
              'disabled' => true,
             ),
             ));
        $this->actAs($timestampable0);
    }
}