<?php

namespace App\Http\Controllers\API;

use DB;
use App\Models\Farm;

class FarmController extends Controller {

    public function getWhereId($farmid) {

        //$farm = App\Farm::find($farmid);
        //return Response::json($farm);
        return Response::json(1);
    }

}
