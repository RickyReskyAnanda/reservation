<!DOCTYPE html>
<html lang="en">
<head>
    @include('mobile-app.header')
    <style type="text/css">
        .collection .collection-item.avatar:not(.circle-clipper) > .circle, .collection .collection-item.avatar :not(.circle-clipper) > .circle{
            top:7px;
            width: 30px;
            height: 30px;
            line-height: 30px;
        }
        .collection .collection-item{
            padding: 12px 20px;
            border-bottom: 0; 
        }
        .collection .collection-item.avatar{
            min-height: 30px;
        }
        body{
            background: #eee;
        }
        .card{
            margin: 0 0 1rem 0;
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
    </style>
</head>
<body>
        <div class="section" style="padding-top: 0;">
        <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m12 l12" style="padding: 0;">
                    <form method="get" action="{{url('mobile-app/venue')}}">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s10 m10 l10 offset-s1 offset-m1 offset-l1">
                                    <p align="center">Cari tempat terbaik anda dengan harga sesuai.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="row">
                                        <!-- <div class="input-field col s12">
                                            <i class="material-icons prefix">location_on</i>
                                            <input type="text" id="lokasi" class="autocomplete" placeholder="Ketik Lokasi Anda.">
                                            <label>Lokasi</label>
                                        </div> -->
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">location_on</i>
                                            <select name="lokasi" required>
                                                <?php $i=0;?>
                                                @foreach($regencyCooperate as $rc)
                                                <option value="{{$rc->name}}" <?php if($i==0){ echo "selected";$i++;}?>>{{$rc->name}}</option>
                                                @endforeach
                                            </select>
                                          <label>Lokasi :</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">class</i>
                                            <select name="tipe" required>
                                                <?php $i=0;?>
                                                @foreach($venueType as $vt)
                                                <option value="{{$vt->name}}" <?php if($i==0){ echo "selected";$i++;}?>>{{$vt->name}}</option>
                                                @endforeach
                                            </select>
                                            <label>Tipe Venue</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="waves-effect waves-light amber btn black-text" style="width: 100%">Lihat Penawaran</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>


    <div class="section">
        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m12">
                <span>Mencari Tempat Lain ?</span>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12" style="padding: 0;">
                <ul class="collection">
                    <li class="collection-item avatar">
                        <i class="material-icons circle green">domain</i>
                        <span class="title">Meeting Room</span>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle red">play_arrow</i>
                        <span class="title">Cafe</span>
                    </li>
                    <li class="collection-item avatar">
                        <i class="material-icons circle blue">local_dining</i>
                        <span class="title">Restoran</span>
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
            $('select').material_select();
        });
    </script>
    </body>
</html>
