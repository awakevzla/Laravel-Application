<?php

namespace App\Http\Controllers\API;

use DB;
use Validator;

class UserCredentialsController extends Controller {

    public function getWhereEmail(Request $request) {

      $this->validate($request, [
          'email' => 'required|exists:UserCredentials,email'
      ]);

        $result = DB::select('call UserCredentials_GetWhereEmail(?)', array($request['email']));
        return json_encode($result);
    }

    public function getWhereId($id) {

        $result = DB::select('call UserCredentials_GetWhereId(?)', array($id));
        return json_encode($result);
    }

}
