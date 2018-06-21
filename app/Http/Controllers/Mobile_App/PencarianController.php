<?php

namespace App\Http\Controllers\Mobile_App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Room\RoomModel;
use App\Model\Venue\VenueModel;
use App\Model\Area\RegencyCooperateModel;
use App\Model\Area\AreaDistrictModel;
// use App\Model\Home\HomeVenueTypeModel;

class PencarianController extends Controller
{
    public function index(Request $request){
    	
    	// $data = RoomModel::join('venue','room.id_venue','venue.id_venue')
					// ->where('room.event','like','%'.$request->kegiatan.'%')
					// ->where('venue.city',$request->lokasi)
					// ->get();
    	$regency = RegencyCooperateModel::where('name',$request->lokasi)->first();
    	$kecamatan = [];
    	if(isset($regency->id_regency)){
	    	$kecamatan = AreaDistrictModel::where('regency_id',$regency->id_regency)->get(); 
    	}
        //mengubah id ke string untuk bisa dienkripsi
        for ($i=0; $i < count($kecamatan); $i++) { 
            $kecamatan[$i]->id_district = base64_encode(base64_encode(strval($kecamatan[$i]->id)));
        }

    	return view('mobile-app.pencarian',compact('request','kecamatan'));
    }
}
