<?php

namespace App\Http\Controllers\API;

use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class SessionController extends BaseController {

  public function getUserTypeWhereToken($token) {

    $result = DB::select('call Sessions_GetUserTypeWhereToken(?)', array($token));

    return json_encode($result);
  }
}
