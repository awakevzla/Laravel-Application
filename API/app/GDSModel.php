<?php

namespace App;

use \GDS\Entity;
use \GDS\Store;
use \GDS\Schema;
use \GDS\Gateway\GoogleAPIClient;

abstract class GDSModel
{
  // For GDS transactions
  private $client;
  private $gateway;
  private $schema;
  private $store;
  private $entity;

  private $data;

  // Prepare this instance.
  function __construct()
  {
    $data = array();

    $this->client = GoogleAPIClient::createClientFromJson('../gdskey.json');
    $this->gateway = new GoogleAPIClient($this->client, 'laravel-api');
    $this->schema = new Schema(get_class($this));
    $this->store = new Store($this->schema, $this->gateway);
    $this->entity = new Entity();
    $this->entity->setSchema($this->schema);
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
    else if(property_exists($this, $name))
    {
      return $this->$name;
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
  public function upsert()
  {
    foreach ($this->data as $key => $value) {

      if(is_bool($value))
      {
        $this->schema->addBoolean($key);
      }
      else if(is_int($value))
      {
        $this->schema->addInteger($key);
      }
      else if(is_float($value))
      {
        $this->schema->addDouble($key, FALSE);
      }
      else
      {
        $this->schema->addString($key);
        $value = (string)$value;
      }

      $this->entity->$key = $value;
    }

    if(count($this->schema->getProperties(), COUNT_RECURSIVE) > 0)
    {
      var_dump($this->data);
      var_dump($this->schema->getProperties());
      var_dump($this->entity);

      $this->store->upsert($this->entity);
    }
  }

}
