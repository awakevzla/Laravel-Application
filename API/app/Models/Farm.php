<?php

namespace App;

use App\GDSModel;

class Farm extends GDSModel
{
  function __construct()
  {
    parent::__construct();

    $blueprint = [
      'name' => 'required|alpha|max:255',
      'number' => 'required|numeric|between:1,1000',
    ];

    $this->setBlueprint($blueprint);
  }

}
