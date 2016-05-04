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
      'type' => 'required|max:12'
    ];

    $this->setBlueprint($blueprint);
  }
}
