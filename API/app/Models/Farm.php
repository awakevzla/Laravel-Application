<?php

namespace App\Models;

use App\Models\GDSModel;

class Farm extends GDSModel
{
  function __construct()
  {
    parent::__construct();

    $blueprint = [
      'name' => 'required|max:85|regex:/^((\w)*(\s)*)+$/',
      'subdomain' => 'required|alpha|max:25',
      'mission' => "required|max:200|regex:/^((\w)*(\s)?(\.)?(,)?(;)?(')?(\()?(\))?)+$/",
      'country' => 'required|alpha|max:85',
      'state' => 'required|alpha|max:85',
      'city' => 'required|max:85|regex:/^((\w)*(\s)*)+$/',
      'streetnumber' => 'required|numeric|max:100000',
      'street' => 'required|max:85|regex:/^((\w)*(\s)*)+$/',
      'postal' => 'required|alpha_num|max:8',
      'country' => 'required|alpha|max:85',
      'phone' => 'required|max:24|regex:/^(\(?\)?-?\s?\d?)+$/',
      'email' => 'required|email',
    ];

    $this->setBlueprint($blueprint);
  }

}
