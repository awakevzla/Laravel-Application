<?php

namespace App\Http\Controllers\API;

use DB;
use Illuminate\Routing\Controller as BaseController;

class FarmController extends BaseController {

    public function getWhereId($farmid) {
        
        $result = DB::select('call Farms_GetWhereId(?)', array($farmid));
        return json_encode($result);
    }

}
