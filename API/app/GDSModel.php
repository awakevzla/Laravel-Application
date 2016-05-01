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
  private $class;

  private $data;

  // Simple accessor
  public function getData()
  {
    return $this->data;
  }

  // Prepare this instance.
  function __construct()
  {
    $data = array();

    $this->class = substr(get_class($this), strrpos(get_class($this), '\\') + 1);

    $this->client = GoogleAPIClient::createClientFromJson('../gdskey.json');
    $this->gateway = new GoogleAPIClient($this->client, 'laravel-api');
    $this->schema = new Schema($this->class);
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

  // Persistance
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
      $this->store->upsert($this->entity);
    }
  }

  // Fetching
  public function fetch($count = 1)
  {
    if($count == 1)
    {
      $entity = $this->store->fetchOne();

      $this->data = $entity->getData();
      $this->data['id'] = $entity->getKeyId();

      return $this;
    }
    else
    {
      $farms = array();

      foreach ($this->store->fetchPage($count) as $entity)
      {
        $this->data = $entity->getData();
        $this->data['id'] = $entity->getKeyId();

        array_push($farms, clone $this);
      }

      return $farms;
    }
  }

  public function delete()
  {
    $entity = $this->store->fetchById($this->data['id']);
    $this->store->delete($entity);
  }
}
