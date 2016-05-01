<?php

namespace App\Models;;

use \GDS\Entity;
use \GDS\Store;
use \GDS\Schema;
use \GDS\Gateway\GoogleAPIClient;
use Illuminate\Http\Request;
use Validator;

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
  private $blueprint;

  // Simple mutator
  public function setBlueprint($blueprint)
  {
    return $this->blueprint = $blueprint;
  }

  // Simple accessors
  public function getData()
  {
    return $this->data;
  }

  public function getClass()
  {
    return $this->class;
  }

  public function getBlueprint()
  {
    return $this->blueprint;
  }

  // Prepare this instance.
  function __construct()
  {
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

      if($entity !== null)
      {
        $this->data = $entity->getData();
        $this->data['id'] = $entity->getKeyId();

        return $this;
      }
    }
    else
    {
      $entities = array();

      foreach ($this->store->fetchPage($count) as $entity)
      {
        $this->data = $entity->getData();
        $this->data['id'] = $entity->getKeyId();

        array_push($entities, clone $this);
      }

      return $entities;
    }
  }

  public function fetchById($id)
  {
    $entity = $this->store->fetchById($id);

    if($entity !== null)
    {
      $this->data = $entity->getData();
      $this->data['id'] = $entity->getKeyId();

      return $this;
    }
  }

  public function fetchByNamespace($namespace)
  {
    $entity = $this->store->fetchByName($namespace);

    if($entity !== null)
    {
      $this->data = $entity->getData();
      $this->data['id'] = $entity->getKeyId();

      return $this;
    }
  }

  // Deleting
  public function delete($id)
  {
    $entity = $this->store->fetchById($id);
    $this->store->delete($entity);
  }

  public function consume($array)
  {
    foreach ($array as $key => $value)
    {
      $this->data[$key] = $value;
    }
  }

  public function validateRequest(Request $request)
  {
    $validator = Validator::make($request->all(), $this->blueprint);

    if ($validator->fails())
    {
      return $validator->errors()->all();
    }
    else
    {
      foreach ($request->all() as $key => $value)
      {
        if (!array_key_exists($key, $this->blueprint))
        {
          return $key . " isn't a valid " . $this->class . " object property.";
        }
      }
    }

    return true;
  }
}
