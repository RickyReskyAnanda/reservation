<?php

namespace App\Http\Controllers\Mobile_App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Area\RegencyCooperateModel;
use App\Model\Home\HomeVenueTypeModel;

class BasicController extends Controller
{
    public function index(){
    	$regencyCooperate = RegencyCooperateModel::orderBy('urutan','asc')->get();
    	$venueType = HomeVenueTypeModel::orderBy('sort_type','asc')->where('sts','1')->get();
    	return view('mobile-app.index',compact('venueType','regencyCooperate'));
    }
}
