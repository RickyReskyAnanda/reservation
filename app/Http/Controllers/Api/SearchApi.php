<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\HomeVenueTypeModel;
use App\Model\Area\RegencyCooperateModel;
use App\Model\Venue\VenueModel;
use App\Model\Room\RoomModel;
class SearchApi extends Controller
{
    public function getSearchData(Request $request){
        // setup data
        $regency = strtolower($request->lokasi);
        $venueType = strtolower($request->tipe);
        $district=[];
        if(isset($request->kecamatan)){
            $district = $request->kecamatan;
            $district = explode(',', $district);

            for ($i=0; $i < count($district); $i++) { 
                $district[$i] = base64_decode(base64_decode($district[$i])); 
            }
        }

        $dataVenue = [];
        $dataKind = '';
        $urutan = $request->urutan;

        $fieldUrutan='name';
        $valueUrutan='asc';

        if($urutan == '1'){
            $fieldUrutan='name';
            $valueUrutan='asc';
        }

        // penambahan else if dikondisikan
        // elseif($urutan == 2){
        // }
        
        // mulai mencari data
        $kota = RegencyCooperateModel::where('name',$regency)->first();//mencari id_regency 
        $homeVenueType = HomeVenueTypeModel::where('name',$venueType)->first();//mencari tipe venue atau room 

        if($homeVenueType->type == '0'){

            $dataKind = 'venue'; // jenisnya yg akan diturunkan
            //mengambil data venue
            if(count($district)<1){
                $dataVenue = VenueModel::where('venue_type',$venueType)
                                        ->where('city',$kota->id_regency)
                                        ->where('sts','1')
                                        ->orderBy($dataKind.'_'.$fieldUrutan,$valueUrutan)
                                        ->get();
            }elseif(count($district)>=1){
                $dataVenue = VenueModel::where('venue_type',$venueType)
                                        ->where('city',$kota->id_regency)
                                        ->where('sts','1')
                                        ->whereIn('district',$district)
                                        ->orderBy($dataKind.'_'.$fieldUrutan,$valueUrutan)
                                        ->get();
            }
            

            //mengelola dan menyusun data sebelum di respon balik
            for ($i=0; $i < count($dataVenue); $i++) { 
                $dataVenue[$i]->name = $dataVenue[$i]->venue_type;
                $dataVenue[$i]->type = ucfirst($dataVenue[$i]->venue_type);
                $dataVenue[$i]->lokasi = ucwords(strtolower($dataVenue[$i]->getKecamatan->name.', '.$dataVenue[$i]->getKota->name.', '.$dataVenue[$i]->getProvinsi->name));
                $dataVenue[$i]->url_venue = url('venue/'.str_replace(' ', '-',strtolower($dataVenue[$i]->type)).'/'.str_replace(' ', '-',strtolower($dataVenue[$i]->name)).'_'.base64_encode(base64_encode(strval($dataVenue[$i]->id_venue)))).'?lokasi='.str_replace(' ', '+',$request->lokasi).'&tipe='.str_replace(' ', '+',$request->tipe);
                if(isset($dataVenue[$i]->getProfil->url))
                    $dataVenue[$i]->image_profil = $dataVenue[$i]->getProfil->url;

                if (isset($dataVenue[$i]->information) && strlen($dataVenue[$i]->information) > 50)
                    $dataVenue[$i]->description = substr($dataVenue[$i]->information, 0, 49) . '...';
                else
                    $dataVenue[$i]->description = ucfirst($dataVenue[$i]->information);
            }

        }elseif($homeVenueType->type == '1'){
            $dataKind = 'room';
            if(count($district)<1){
                $dataVenue = RoomModel::join('venue', 'room.id_venue', '=', 'venue.id_venue')
                                        ->where('room.room_type',$venueType)
                                        ->where('venue.city',$kota->id_regency)
                                        ->where('venue.sts','1')
                                        ->where('room.sts','1')
                                        ->get();
            }elseif(count($district)>=1){
                $dataVenue = RoomModel::join('venue', 'room.id_venue', '=', 'venue.id_venue')
                                        ->where('room.room_type',$venueType)
                                        ->where('venue.city',$kota->id_regency)
                                        ->whereIn('venue.district',$district)
                                        ->where('venue.sts','1')
                                        ->where('room.sts','1')
                                        ->get();
            }

            //mengelola dan menyusun data sebelum di respon balik
            for ($i=0; $i < count($dataVenue); $i++) { 
                $dataVenue[$i]->type = ucfirst($dataVenue[$i]->room_type);
                $dataVenue[$i]->lokasi = ucwords(strtolower($dataVenue[$i]->getVenue->getKecamatan->name.', '.$dataVenue[$i]->getVenue->getKota->name.', '.$dataVenue[$i]->getVenue->getProvinsi->name));
                $dataVenue[$i]->url_venue = url('venue/'.str_replace(' ', '-',strtolower($dataVenue[$i]->type)).'/'.str_replace(' ', '-',strtolower($dataVenue[$i]->name)).'_'.base64_encode(base64_encode(strval($dataVenue[$i]->id_room)))).'?lokasi='.str_replace(' ', '+',$request->lokasi).'&tipe='.str_replace(' ', '+',$request->tipe);
                if(isset($dataVenue[$i]->getProfil->url))
                    $dataVenue[$i]->image_profil = $dataVenue[$i]->getProfil->url;
                if (isset($dataVenue[$i]->description) && strlen($dataVenue[$i]->description) > 50)
                   $dataVenue[$i]->description = substr($dataVenue[$i]->description, 0, 49) . '...';
                
                //untuk menghilangkan data venue yang banyak
                unset($dataVenue[$i]->getVenue);
                unset($dataVenue[$i]->getProfil);
            }
        }
        return response()
                ->json(['response' => $dataVenue, 'kind' => $dataKind]);
    }
}
