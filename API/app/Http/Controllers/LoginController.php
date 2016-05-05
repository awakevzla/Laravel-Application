<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
  function login(Request $request)
  {
    $validator = Validator::make($request->all(),
    [
      'email' => 'required|email',
      'password' => 'required|between:8,16'
    ]
  );

  if ($validator->fails())
  {
    return json_encode(['error' => $validator->errors()->all()];
  }

  $user = new User;
  $user->consume($request->all());
  $user->login();

  if(!isset($user.firstname))
  {
    $json = json_encode(['error' => "Those credentials don't exist in our database."]);
    return response()->json($json, 404);
  }

  return json_encode($user);
}
}
