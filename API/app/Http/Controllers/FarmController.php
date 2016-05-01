<?php

namespace App\Http\Controllers;

use App\Farm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FarmController extends Controller {

  public function getWhereId($farmid, $token) {

    $farm = new Farm;
    $farm = $farm->fetchById(5681034041491456);

    return json_encode($farm->getData());
  }

  public function getAll()
  {
    $farms = $farm->fetch(100);
    return json_encode($farms);
  }

  public function upsert(Request $request)
  {
    $farm = new Farm;
    $valid = $farm->validateRequest($request);

    if($valid === true)
    {
      $farm->consume($request->all());
      $farm->upsert();
      return json_encode($farm->getData());
    }
    else
    {
      return json_encode($valid);
    }
  }
}
