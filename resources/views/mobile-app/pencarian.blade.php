<!DOCTYPE html>
<html lang="en">
<head>
    @include('mobile-app.header')
    <style type="text/css">
        *{
                font-family: 'Oxygen', sans-serif;
        }
        body{
            background: #eee;
            font-size:12px !important;
        }
        .line-height{
            line-height: 1.6rem;
            color: #000;
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
        .collection{
            margin: 0 0 1rem 0;
        }
        .collection .collection-item.avatar{
            padding-left: 100px;
        }
        .collection .collection-item .title{
            font-weight: 500;
            color: #0089ec;
            letter-spacing: .06rem;
            font-size: 13px !important;
        }
        .collection .collection-item{
            padding: 5px 10px;
            margin: 0 0 10px;
        }
        .collection .collection-item.avatar:not(.circle-clipper) > .circle, .collection .collection-item.avatar :not(.circle-clipper) > .circle{
            border-radius: 0;
            width:85px;
            height:auto;
            left:5px;
            top:5px;
        }
        .collection .collection-item.avatar .secondary-content{
            bottom: 5px;
            right: 20px;
            top:inherit;
        }
        .modal{
            background-color: #fff;
        }
        .modal-footer{
            background-color: #fff;
        }
        .modal.bottom-sheet{
            top: 0;
            max-height: 100%;
        }
        label{
            color: rgba(0, 0, 0, 0.87);
        }
    </style>
</head>
<body>
    <div class="section" style="padding-top: 0;">
        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m12" style="padding: 0;">
                <div class="row ">
                    <a href="#modal1" class="btn cyan modal-trigger" style="margin: 0;text-transform: none;width: 100%;position: fixed;bottom: 0px;z-index: 999;padding: 7px;
    height: 51px;">Filter & Sort</a>
                </div>
                <div class="row ">
                    <div class="col s12 m12" style="padding: 0;">
                        <ul class="collection" style="border: none;margin: 0;" id="hasilPencarian">
                            <div class="center" id="hasilLoader" style="padding: 30px;">
                                <div class="preloader-wrapper big active">
                                    <div class="spinner-layer spinner-blue-only">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="gap-patch">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="circle-clipper right">
                                            <div class="circle"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Modal Structure -->
    <div id="modal1" class="modal bottom-sheet">
        <div class="modal-footer">
            <a href="javascript:;" class="modal-action modal-close waves-effect waves-green btn-flat left"><i class="material-icons">clear</i></a>
            <a href="javascript:;" class="waves-effect waves-green btn-flat right">Reset</a>
        </div>
        <div class="modal-content pad-0">
            
            <!-- <div class="row">
                <div class="col s12 m12 l12 pad-0">
                    <div class="card mar-0">
                        <div class="card-content">
                            <h6>Urutkan Berdasarkan</h6>
                            <p>
                                <input name="group1" type="radio" id="test1" />
                                <label for="test1">Harga Terendah</label>
                            </p>
                            <p>
                                <input name="group1" type="radio" id="test2" />
                                <label for="test2">Harga Tertinggi</label>
                            </p>
                            <p>
                                <input class="with-gap" name="group1" type="radio" id="test3"  />
                                <label for="test3">Kapasitas Terendah</label>
                            </p>
                            <p>
                                <input name="group1" type="radio" id="test4" disabled="disabled" />
                                <label for="test4">Kapasitas Tertinggi</label>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mar-top-10">
                <div class="col s12 m12 l12 pad-0">
                    <div class="card mar-0">
                        <div class="card-content">
                            <span class="card-title">Lokasi</span>
                            <p>
                                <input name="group1" type="radio" id="lokasi" />
                                <label for="lokasi">Harga Terendah</label>
                            </p>
                        </div>
                    </div>
                </div>
            </div> -->
            <ul class="collection" style="border: none;padding: 0 14px;padding-bottom: 35px;">
                <li class="collection-item">
                    <span class="title">Lokasi</span>
                    <?php $i=1;?>
                    @foreach($kecamatan as $kec)
                    <p class="<?php if($i>4)echo 'sembunyi';?>">
                        <input name="kecamatan" class="filled-in " type="checkbox" id="kecamatan{{$i}}" />
                        <label for="kecamatan{{$i++}}">{{ucwords(strtolower($kec->name))}}</label>
                    </p>
                    @endforeach
                    <h6 id="btnSembunyi" class="blue-text"><b>Lihat Semua</b></h6>
                </li>
               <!--  <li class="collection-item">
                  <span class="title">Title</span>
                  <p>First Line <br>
                     Second Line
                  </p>
                  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                </li>
                <li class="collection-item">
                  <i class="material-icons circle red">play_arrow</i>
                  <span class="title">Title</span>
                  <p>First Line <br>
                     Second Line
                  </p>
                  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                </li> -->
            </ul>
            <a class="btn cyan" style="text-transform: none;width: 100%;position: fixed;bottom: 0px;z-index: 999;padding: 7px;
    height: 51px;">Terapkan</a>
        </div>
    </div>
  <!--  Scripts-->
    <script src="{{asset('assets/m9199/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('assets/m9199/js/materialize.js')}}"></script>
    <script src="{{asset('assets/m9199/js/init.js')}}"></script>
    <script type="text/javascript">
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            //setup
             $('.modal').modal();

            //error handling
            $("img").on("error", function(){
                $(this).attr('src', '{{asset("assets/m9199/background1.jpg")}}');
            });

            $('.sembunyi').css("display", "none");
            $('#btnSembunyi').click(function(){
                if($('.sembunyi').css("display") == 'none'){
                    $('.sembunyi').css("display", "block");
                    $('#btnSembunyi>b').text('Sembunyikan');
                }
                else{ 
                    $('.sembunyi').css("display", "none");
                    $('#btnSembunyi>b').text('Lihat Semua');
                }
            });

            var dataLokasi = "{{$request->lokasi}}";
            var dataTipe = "{{$request->tipe}}";
            var dataVenue= [];
            var selectedKecamatan = "";
            var urutan = 0;
            
            var getDataVenue = function(){
              $.ajax({
                url: "{{url('api/v1/search')}}", 
                method:'post',
                data: {
                        'kecamatan':selectedKecamatan,
                        'lokasi':dataLokasi,
                        'tipe':dataTipe,
                        'urutan':urutan,
                      },
                dataType:'json',
                success: function(result){
                  dataVenue = result;
                  setDataVenue();
                }
              });
            }

            getDataVenue();

            
            var setDataVenue = function(){
                $('#hasilPencarian').html(' ');
                if(dataVenue.response.length < 1){
                    $('#hasilPencarian').html('<div class="center" style="padding:30px;"><h6>Hasil tidak ditemukan...</h6><p>Atur pencarian filter Anda untuk menampilkan semua hasil.</p></div>');
                }else{
                    $.each(dataVenue.response, function (index, itemData) {
                        $('#hasilPencarian').append(
                            '<li class="collection-item avatar">'+
                                '<div class="row">'+
                                    '<img src="'+itemData.image_profil+'" alt="" onerror="imgError(this);" class="circle">'+
                                    '<span class="title">'+itemData.type+'</span>'+
                                    '<p class="line-height price">'+itemData.venue_name+'</p>'+
                                    '<p class="line-height"><i class="material-icons tiny">place</i> '+itemData.lokasi.substr(0,35)+'..</p>'+
                                '</div>'+
                            '</li>');    
                    });
                }
            }//batas setDataVenue

          //filter kecamatan
          $('input[name=cbLokasi]').change(function() {
            selectedKecamatan = "";
            $('input[name="cbLokasi"]:checked').each(function() {
              if(selectedKecamatan == "")
                selectedKecamatan=this.value;
              else
                selectedKecamatan+=','+this.value;
            });
            getDataVenue();
          });

          //filter untuk urutan 
          $(document).on('click','.urutan',function(){
            urutan = $(this).attr('data-id');
            getDataVenue();
          });
        });

    </script>
    </body>
</html>
