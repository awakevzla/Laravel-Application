<?php

namespace App\Http\Controllers;

//use DB;
use App\Farm;

class FarmController extends Controller {

    public function getWhereId($farmid, $token) {

        //$farm = App\Farm::find($farmid);
        $farm = new Farm();
        $thing = $farm->buildSchema();
        //return Response::json($farm);
        return $token;
    }

}
