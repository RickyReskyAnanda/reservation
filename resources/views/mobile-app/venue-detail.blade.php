<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Parallax Template - Materialize</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('assets/m9199/css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{asset('assets/m9199/css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <style type="text/css">
    .collection{
        margin: 0.2rem 0;
    }
        .collection .collection-item .venue{
            border-radius: 0;
            width:85px !important;
            height:auto !important;
            left:5px !important;
            top:5px !important;
        }
        .collection .collection-item.venue-content{
            padding-left: 100px !important;
        }
        
        .collection .collection-item.avatar{
            min-height: 30px;
        }
        body{
            background: #eee;
        }
        .card{
          box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
        }
        .card .card-action{
            padding: 5px;
        }
        .card .card-content{
            padding: 15px 15px 0px;
        }
        .row{
            margin-bottom: 0;
        }
        .pad-0{
            padding: 0 !important;
        }
        .mar-0{
            margin: 0;
        }
        .ico-rata{
          display: flex;
          -webkit-tap-highlight-color: transparent;
          line-height: 2;
        }
        .ico-rata .material-icons{
          margin-right: 15px;
        }
        .w-100{
          width: 100% !important;
        }

        .card .card-title {
            font-size: 16px;
            font-weight: 400;
        }
    </style>
</head>
<body>
    
    <div class="section pad-0">
    <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m12 l12 pad-0">
                <div class="card mar-0">
                    <div class="card-image waves-effect waves-block waves-light">
                        <div class="slider">
                            <ul class="slides" style="height: 250px !important;">
                                
                              <li>
                                <img src="https://lorempixel.com/580/250/nature/1"> <!-- random image -->
                                
                              </li>
                              <li>
                                <img src="https://lorempixel.com/580/250/nature/2"> <!-- random image -->
                              </li>
                              <li>
                                <img src="https://lorempixel.com/580/250/nature/3"> <!-- random image -->
                              </li>
                              <li>
                                <img src="https://lorempixel.com/580/250/nature/4"> <!-- random image -->
                              </li>
                            </ul>
                          </div>
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">{{$detail->name.', '.$detail->venue_name}}</span>
                        <p><a href="#">{{$detail->venue_kind}}</a> <span class="right">329 Ulasan</span></p>
                    </div>
                    <div class="card-footer" style="padding: 5px;">
                        <a href="#harga" class="waves-effect waves-light amber btn w-100 black-text" >Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section">
        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m12" style="padding: 0;">
                <ul class="collection">
                    <li class="collection-item blue lighten-2">Informasi : </li>
                    <li class="collection-item">
                        <div class="row">
                            @foreach($detail->fasilitas as $fasilitas)
                            <div class="col s6 m6 l6 ico-rata pad-0 mar-0"> <i class="material-icons">check</i> {{$fasilitas->name}}</div>
                            @endforeach
                        </div>
                    </li>
                    <li class="collection-item">
                        <div class="row">
                            <div class="col s12 m12 l12"> <i class="material-icons">place</i> {{$detail->address}}, {{ucwords(strtolower($detail->kota->regency_name))}}</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- informasi penting -->
        <div class="row">
            <div class="col s12 m12 pad-0">
                <ul class="collection">
                    <li class="collection-item blue lighten-2">Catatan Penting</li>
                    <li class="collection-item">
                      <p>{{$detail->description}}</p>
                    </li>
                </ul>
            </div>
        </div>
        <!-- batas informasi penting -->

       

        <!-- harga reguler-->
        <div class="row" id="harga">
            <div class="col s12 m12" style="padding: 0;">
                <ul class="collection">
                    <li class="collection-item blue lighten-2">Harga Requler</li>
                    <?php if($detail->is_hourly == 1){?>
                    <a href="" class="black-text">
                        <li class="collection-item">Perjam <span class="right blue-text text-darken-1">Rp{{number_format($detail->hour_price)}}</span></li>
                    </a>
                    <?php } if($detail->is_halfday == 1){?>
                    <a href="" class="black-text">
                        <li class="collection-item">Halfday <span class="right blue-text text-darken-1">Rp{{number_format($detail->halfday_price)}}</span></li>
                    </a>
                    <?php } if($detail->is_fullday == 1){?>
                    <a href="" class="black-text">
                        <li class="collection-item">Fullday <span class="right blue-text text-darken-1">Rp{{number_format($detail->fullday_price)}}</span></li>
                    </a>
                    <?php } if($detail->is_fullboard == 1){?>
                    <a href="" class="black-text">
                        <li class="collection-item">Fullboard <span class="right blue-text text-darken-1">Rp{{number_format($detail->fullboard_price)}}</span></li>
                    </a>
                    <?php } if($detail->is_daily == 1){?>
                    <a href="" class="black-text">
                        <li class="collection-item">Daily <span class="right blue-text text-darken-1">Rp{{number_format($detail->day_price)}}</span></li>
                    </a>
                    <?php } if($detail->is_weekly == 1){?>
                    <a href="" class="black-text">
                        <li class="collection-item">Weekly <span class="right blue-text text-darken-1">Rp{{number_format($detail->week_price)}}</span></li>
                    </a>
                    <?php } if($detail->is_monthly == 1){?>
                    <a href="" class="black-text">
                        <li class="collection-item">Monthly <span class="right blue-text text-darken-1">Rp{{number_format($detail->month_price)}}</span></li>
                    </a>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <!-- batas harga reguler-->

        <!-- harga reguler-->
        @if(count($detail->paket) >0)
        <div class="row">
            <div class="col s12 m12" style="padding: 0;">
                <ul class="collection">
                    <li class="collection-item blue lighten-2">Harga Paket</li>
                    @foreach($detail->paket as $paket)
                    <a href="" class="black-text">
                        <li class="collection-item">{{$paket->name}} <span class="right blue-text text-darken-2">Rp{{number_format($paket->price)}}</span></li>
                    </a>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        <!-- batas harga reguler-->

        <div class="row">
            <div class="col s12 m12 l12" style="padding: 0;">
                <ul class="collection">
                    <li class="collection-item blue lighten-2">Ruangan Lain</li>
                    @foreach($detail->ruangan as $ruangan)
                    @if($ruangan->id_room != $detail->id_room)
                    <a href="">
                        <li class="collection-item avatar venue-content">
                            <div class="row">
                                <img src="{{$ruangan->image}}" alt="" class="venue circle ">
                                <span class="title black-text">{{$ruangan->name}}</span>
                                <p class="line-height black-text"><i class="material-icons tiny">group</i> <span>{{$ruangan->capacity}} orang</span></p>
                            </div>
                            <div class="row">
                                <!-- <p class="line-height price">Rp. 6.0000.000 </p> -->
                                <p class="line-height price-p black-text">mulai dari <span class="price blue-text text-darken-1">Rp<?php
                                if($ruangan->is_hourly == 1){
                                    echo number_format($ruangan->hour_price).'/hour';
                                }elseif($ruangan->is_halfday == 1){
                                    echo number_format($ruangan->halfday_price).'/halfday';
                                }elseif($ruangan->is_fullday == 1){
                                    echo number_format($ruangan->fullday_price).'/fullday';
                                }elseif($ruangan->is_fullboard == 1){
                                    echo number_format($ruangan->fullboard_price).'/fullboard';
                                }elseif($ruangan->is_daily == 1){
                                    echo number_format($ruangan->main_price).'/day';
                                }elseif($ruangan->is_weekly == 1){
                                    echo number_format($ruangan->week_price).'/week';
                                }elseif($ruangan->is_monthly == 1){
                                    echo number_format($ruangan->month_price).'/month';
                                }
                            ?>
                            </span> </p>
                            </div>
                        </li>
                    </a>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- ulasan -->
        <div class="row">
            <div class="col s12 m12" style="padding: 0;">
                <ul class="collection">
                    <li class="collection-item blue lighten-2">Ulasan</li>
                  @foreach($detail->komentar as $komen)
                    <li class="collection-item avatar">
                        <i class="material-icons circle">account_circle</i>
                        <span class="title">{{$komen->name}}</span>
                        <p>"{{ucfirst($komen->comment)}}"</p>
                        <a href="javascript:;" class="secondary-content amber-text"><i class="material-icons">grade</i></a>
                    </li>
                  @endforeach
                    <li class="collection-item">
                        <button class="waves-effect waves-light grey lighten-3 btn btn-small black-text" style="width: 100%">Tulis Ulasan</button>
                    </li>
                </ul>
            </div>
        </div>

    </div>

  <!--  Scripts-->
    <script src="{{asset('assets/m9199/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('assets/m9199/js/materialize.js')}}"></script>
    <script src="{{asset('assets/m9199/js/init.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

      $('.slider').slider({
        height:210,
        indicators:false,
        interval:4000
      });

            $('select').material_select();
            var aa ={
              "Apple": null,
              "Appleas": null,
              "Appsale": null,
              "Appasdle": null,
              "Appdle": null,
              "Appzxcle": null,
              "Apcxple": null,
              "Appzcle": null,
              "Appzxcle": null,
              "Appzxcle": null,
              "Apzxcple": null,
              "Apzxccxvple": null,
              "Apdfgple": null,
              "Aprple": null,
              "Apdsple": null,
              "Appble": null,
              "Apggdpvcle": null,
              "Apzple": null,
              "Apple": null,
              "Apbcple": null,
              "Apxcple": null,
              "Apple": null,
              "Ap le": null,
              "Appccxvle": null,
              "Appvcvle": null,
              "Appxcvle": null,
              "Appxcxle": null,
              "Appvxle": null,
              "Appxle": null,
              "Appcle": null,
              "Apcxvxple": null,
              "Apcvxple": null,
              "Apcvxvple": null,
              "Microsoft": null,
              // "Google": 'https://placehold.it/250x250'
            };
            $('input#lokasi').autocomplete({
                data: aa,
                limit: 5, // The max amount of results that can be shown at once. Default: Infinity.
                onAutocomplete: function(val) {
                  // Callback function when value is autcompleted.
                },
                minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
            });

            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year,
                today: 'Today',
                clear: 'Clear',
                close: 'Ok',
                closeOnSelect: false // Close upon selecting a date,
            });
        });

    </script>
    </body>
</html>
