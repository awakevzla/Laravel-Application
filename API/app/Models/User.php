<?php

namespace App\Models;;

use App\Models\GDSModel;

class User extends GDSModel
{
  function __construct()
  {
    parent::__construct();

    $blueprint = [
      'firstname' => 'required|alpha|max:85',
      'lastname' => 'required|alpha|max:85',
      'email' => 'required|email',
      'password' => 'required|between:8,16|confirmed',
      'gender' => 'required|alpha|max:6',
      'type' => 'required|max:12',
      'farmid' => 'numeric'
    ];

    $this->setBlueprint($blueprint);
  }

  function login()
  {
    $entity = $this->store->fetchOne("SELECT * FROM User WHERE email = @email", [
      'email' => $this->email
    ]);

    if($entity !== null)
    {
      $this->data = $entity->getData();
      $this->data['id'] = $entity->getKeyId();

      return $this;
    }
  }
}
