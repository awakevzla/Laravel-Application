<?php

namespace App\Http\Controllers\API;

use DB;

class FarmController extends Controller {

    public function getWhereId($farmid) {

        $result = DB::select('call Farms_GetWhereId(?)', array($farmid));
        return json_encode($result);
    }

}
