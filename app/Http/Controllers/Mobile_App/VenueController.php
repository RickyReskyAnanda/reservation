<?php

namespace App\Http\Controllers\Mobile_App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\RoomModel;

class VenueController extends Controller
{
    public function index(Request $request,$id){
    	$detail = RoomModel::join('venue','room.id_venue','venue.id_venue')->find($id);
    	return view('mobile-app.venue-detail',compact('detail','request'));
    }
}
