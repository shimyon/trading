<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Configuration;

use Illuminate\Support\Facades\DB;
class configApiController extends BaseController {

    public function config(Request $request) {
        $data = configuration::where('id', $request->id)->get();   
        if (count($data)>0){
        return $this->sendResponse('', $data[0]);            
        }     
        return $this->sendError('No data found', $data);
    }

    
}