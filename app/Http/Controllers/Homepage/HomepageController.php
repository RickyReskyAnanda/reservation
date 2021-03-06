<?php

namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Area\RegencyCooperateModel;
use App\Model\Home\HomeVenueTypeModel;
use App\Model\Setting\SettingModel;

class HomepageController extends Controller
{
    public function viewHomepage(){
    	$setting = SettingModel::find(1);
    	$regencyCooperate = RegencyCooperateModel::orderBy('urutan','asc')->get();
    	$venueType = HomeVenueTypeModel::orderBy('sort_type','asc')->where('sts','1')->get();
    	return view('homepage.index ',compact('regencyCooperate','setting','venueType'));
    }

    public function viewMaintenance(){
    	return view('homepage.undermaintenance');
    }
}
