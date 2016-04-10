<?php

namespace App\Http\Controllers\API;

use DB;
use Validator;

class SessionController extends Controller {

  public function getUserWhereToken($token) {

    $validator = Validator::make(array('token' => $token), [
      'token' => 'required|size:32'
    ]);

    if ($validator->fails()) {
      return $validator->errors()->all();
    }

    $result = DB::select('call Sessions_GetUserWhereToken(?)', array($token));

    return json_encode($result);
  }
}
