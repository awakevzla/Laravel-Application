<?php

namespace App\Models;

use App\Models\GDSModel;

class Farm extends GDSModel
{
  function __construct()
  {
    parent::__construct();

    $blueprint = [
      'name' => 'required|alpha|max:85',
      'subdomain' => 'required|alpha|max:45',
    ];

    $this->setBlueprint($blueprint);
  }

}
