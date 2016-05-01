<?php

namespace App\Http\Controllers;

//use DB;
use App\Farm;
use App\GDSModel;

class FarmController extends Controller {

    public function getWhereId($farmid, $token) {

        //$farm = App\Farm::find($farmid);
        $farm = new Farm();
        $farm->name = 'Farm Dude';
        $farm->number = 5;


        $farm->upsert();
        //return Response::json($farm);
        return $token;
    }

}
