<?php

namespace App;

use GDS\Entity;
use GDS\Store;

abstract class GDSModel extends Entity
{
  // For GDS transactions
  private $client;
  private $gateway;
  private $schema;
  private $store;

  protected $data = array();

  // Prepare this instance.
  function __construct()
  {
    $client = \GDS\Gateway\GoogleAPIClient::createClientFromJson('../gdskey.json');
    $gateway = new \GDS\Gateway\GoogleAPIClient($client, 'laravel-api');
    $schema = new \GDS\Schema(get_class($this));

    $store = new \GDS\Store($schema, $gateway);
  }

  // Override to set values.
  public function __set($name, $value)
  {
    $this->data[$name] = $value;
  }

  // Override to get values.
  public function __get($name)
  {
    if (array_key_exists($name, $this->data))
    {
      return $this->data[$name];
    }

    return null;
  }

  // Override to check for properties.
  public function __isset($name)
  {
    return isset($this->data[$name]);
  }

  // Override to unset for properties.
  public function __unset($name)
  {
    unset($this->data[$name]);
  }

  /** Persistance **/
  protected function upsert()
  {
    foreach ($data as $key => $value) {

      switch(gettype($value))
      {
        case 'boolean':
        $schema->addBoolean($key);
        break;
        case 'integer':
        $schema->addInteger($key);
        break;
        case 'double':
        $schema->addDouble($key, FALSE);
        break;
        default:
        $schema->addString($key);
        break;
      }
    }

    $store->upsert($this);
  }

  /**
  * Build and return a Schema object describing the data model
  *
  * @return \GDS\Schema
  */
  // public function buildSchema()
  // {
  //
  //   // Define our Model Schema
  //
  //
  //   // Store requires a Gateway and Schema
  //
  //   //
  //   // $obj_book = new Entity();
  //   // $obj_book->title = 'Romeo and Juliet';
  //   // $obj_book->author = 'William Shakespeare';
  //   // $obj_book->isbn = '1840224339';
  //   //
  //   // $obj_book_store->upsert($obj_book);
  // }
}
