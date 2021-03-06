@extends('administrator.index')

@section('content')
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			@if (session('pesan'))
		        <div class="alert alert-success alert-dismissable">
		            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		            {{session('pesan')}}
		        </div>
		    @endif
		    @if (session('gagal'))
		        <div class="alert alert-danger alert-dismissable">
		            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
		            {{session('gagal')}}
		        </div>
		    @endif

		     @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
			<div class="row">
				<div class="col-sm-4">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- PROFILE HEADER -->
							<div class="profile-header">
								<div class="overlay"></div>
								<div class="profile-main" style="background-image:url(<?php if(isset($gambarProfil->url))echo $gambarProfil->url;?>);padding: 100px;">
									<h3 class="name">{{$detail->venue_name}}</h3>
								</div>
								<div class="profile-stat">
									<div class="row">
										<div class="col-md-4 stat-item">
											45 <span>View</span>
										</div>
										<div class="col-md-4 stat-item">
											15 <span>Review</span>
										</div>
										<div class="col-md-4 stat-item">
											2174 <span>Order</span>
										</div>
									</div>
								</div>
							</div>
							<!-- END PROFILE HEADER -->
							<!-- PROFILE DETAIL -->
							<div class="profile-detail">
								<div class="profile-info">
									<h4 class="heading">Basic Info</h4>
									<ul class="list-unstyled list-justify">
										<li>Jenis Venue  <span class="label label-success"><b>{{strtoupper($detail->venue_kind)}}</b></span></li>
										<li>No Handphone  <span>{{$detail->contact_number}}</span></li>
										<li>No Telpon Kantor  <span>{{$detail->official_number}}</span></li>
										<li>Email Kantor <span>{{$detail->official_email}}</span></li>
										<li>Website <span><a href="{{$detail->website}}">{{$detail->website}}</a></span></li>
										<li>Alamat <span>{{$detail->address}}</span></li>
										<li>Kerja Sama <span>{{$detail->cooperate}}</span></li>
									</ul>
								</div>
								<div class="profile-info">
									<h4 class="heading">Social</h4>
									<ul class="list-inline social-icons">
										<li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#" class="google-plus-bg"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#" class="github-bg"><i class="fa fa-github"></i></a></li>
									</ul>
								</div>
								<div class="profile-info">
									<button class="btn btn-primary" data-toggle="modal" data-target="#pengaturan"> Pengaturan Profil</button>

								</div>
							</div>
							<!-- END PROFILE DETAIL -->
						</div>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">{{$detail->venue_name}}</h3>
							<p class="panel-subtitle">Kec. Mamajang, Kota Makassar, Indonesia</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<h4 class="heading">Informasi</h4>
									<p>{{$detail->information}}</p>
								</div>
								
							</div>
							<!-- TABBED CONTENT -->
							<div class="custom-tabs-line tabs-line-bottom left-aligned">
								<ul class="nav" role="tablist">
									@if($detail->room == '2' || $detail->room == '4')
									<li class="active"><a href="#tab1" role="tab" data-toggle="tab">Ruangan</a></li>
									@endif
									@if($detail->room == '3' || $detail->room == '4')
									<li <?php if($detail->room =='3')echo "class='active'";?>><a href="#tab11" role="tab" data-toggle="tab">Meja</a></li>
									@endif
									<li <?php if($detail->room =='1')echo "class='active'";?>><a href="#tab2" role="tab" data-toggle="tab">Galeri <!-- <span class="badge">7</span> --></a></li>
									<li><a href="#tab3" role="tab" data-toggle="tab">Jam Operational</a></li>
									<li><a href="#tab4" role="tab" data-toggle="tab">Fasilitas Venue</a></li>
								</ul>
							</div>
							<!-- RUANGAN -->
							<div class="tab-content">
								@if($detail->room == '2' || $detail->room == '4')
								<div class="tab-pane fade in active" id="tab1">
									<div class="table-responsive">
										<button class="btn btn-primary btn-sm"  style="margin-bottom: 10px;" data-toggle="modal" data-target="#tambahRuangan"><i class="fa fa-plus"></i> Tambah Ruangan</button>
										<table class="table project-table">
											<thead>
												<tr>
													<th>Nama Ruangan</th>
													<th>Kapasitas</th>
													<th>Leader</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												@foreach($detail->getRoom as $room)
												<tr>
													<td><a href="{{url('sandwich/venue/ruangan/detail.'.base64_encode(base64_encode($room->id_room)))}}"><b>{{$room->name}}</b></a></td>
													<td>
														<span class="label label-danger">{{$room->capacity}} Orang</span>
													</td>
													<td>Meeting Room</td>
													<td>
														@if($room->is_published == '1')
														<span class="label label-success">Ditampil</span>
														@else
														<span class="label label-danger">Disembunyikan</span>
														@endif
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
								@endif
								@if($detail->room == '3' || $detail->room == '4')
								<div class="tab-pane fade <?php if($detail->room =='3')echo "in active";?>" id="tab11">
									<div class="table-responsive">
										<button class="btn btn-primary btn-sm"  style="margin-bottom: 10px;" data-toggle="modal" data-target="#tambahRuangan"><i class="fa fa-plus"></i> Tambah Ruangan</button>
										<table class="table project-table">
											<thead>
												<tr>
													<th>Nama Ruangan</th>
													<th>Kapasitas</th>
													<th>Leader</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												@foreach($detail->getRoom as $room)
												<tr>
													<td><a href="{{url('sandwich/venue/ruangan/detail.'.base64_encode(base64_encode($room->id_room)))}}"><b>{{$room->name}}</b></a></td>
													<td>
														<span class="label label-danger">{{$room->capacity}} Orang</span>
													</td>
													<td>Meeting Room</td>
													<td>
														@if($room->is_published == '1')
														<span class="label label-success">Ditampil</span>
														@else
														<span class="label label-danger">Disembunyikan</span>
														@endif
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
								@endif
								<!-- Batas RUANGAN -->
								<div class="tab-pane fade <?php if($detail->room =='1')echo "in active";?>" id="tab2">
									<div class="table-responsive">
										<form action="{{url('sandwich/venue/gallery/select-profil')}}" method="post">
										<a href="javascript:;" class="btn btn-primary btn-sm"  style="margin-bottom: 10px;" data-toggle="modal" data-target="#tambahGaleri"><i class="fa fa-plus"></i> Tambah Gambar</a>
											<button class="btn btn-success btn-sm" type="submit"  style="margin-bottom: 10px;"><i class="fa fa-save"></i> Simpan Pengaturan</button>
											{{csrf_field()}}
											<input type="hidden" name="id_venue" value="{{base64_encode(base64_encode($detail->id_venue))}}">
											<table class="table project-table">
												<thead>
													<tr>
														<th>Aksi</th>
														<th>Gambar</th>
														<th>Nama</th>
														<th>Gambar Profil</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													@foreach($detail->getGallery as $galeri)
													<tr>
														<td><a href="javascript:;" onclick="setHapusGaleri('{{base64_encode(base64_encode($galeri->id_venue_gallery))}}')" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#hapusGaleri"><i class="fa fa-trash"></i></a></td>
														<td><img src="{{asset($galeri->url)}}" style="width: 300px;"></td>
														<td>{{$galeri->name}}</td>
														<td>
															@if($galeri->sts == '1')
															<input type="radio" name="profil" value="{{base64_encode(base64_encode($galeri->id_venue_gallery))}}" <?php if($galeri->profil =='1')echo "checked";?>>
															@endif
														</td>
														<td>
															@if($galeri->sts == '1')
															<a href="{{asset('sandwich/venue/gallery/show-hide.'.base64_encode(base64_encode($galeri->id_venue_gallery)))}}" class="btn btn-sm btn-success">Ditampilkan</a>
															@else
															<a href="{{asset('sandwich/venue/gallery/show-hide.'.base64_encode(base64_encode($galeri->id_venue_gallery)))}}" class="btn btn-sm btn-danger">Disembuyikan</a>
															@endif

														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</form>
									</div>
								</div>
								<div class="tab-pane fade" id="tab3">
									<div class="table-responsive">
										<form action="{{url('sandwich/venue/operational/edit')}}" method="post">
											{{csrf_field()}}
											<input type="hidden" name="id_venue" value="{{base64_encode(base64_encode($detail->id_venue))}}">
											<button class="btn btn-success btn-sm" type="submit"  style="margin-bottom: 10px;"><i class="fa fa-save"></i> Simpan Pengaturan</button>
											<table class="table project-table">
												<thead>
													<tr>
														<th>Hari</th>
														<th>Buka</th>
														<th>Tutup</th>
													</tr>
												</thead>
												<tbody>
													@foreach($detail->getOperationalHours as $operational)
													<tr>
														<td>{{$hari[$operational->day]}}</td>
														<td>
															<select class="form-control" name="buka{{$operational->day}}" required>
																@for($i=0;$i<24;$i++)
																<option value="{{$i}}" <?php if($operational->start == $i)echo "selected='selected'";?>><?php if(strlen($i)<2)echo "0";echo $i.":00";?></option>
																@endfor
															</select>
														</td>
														<td>
															<select class="form-control" name="tutup{{$operational->day}}" required>
																@for($i=0;$i<24;$i++)
																<option value="{{$i}}" <?php if($operational->end == $i)echo "selected='selected'";?>><?php if(strlen($i)<2)echo "0";echo $i.":00";?></option>
																@endfor
															</select>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</form>
									</div>
								</div>
								<div class="tab-pane fade" id="tab4">
									<div class="table-responsive">
										<a href="javascript:;" class="btn btn-primary btn-sm"  style="margin-bottom: 10px;" data-toggle="modal" data-target="#tambahFasilitas"><i class="fa fa-plus"></i> Tambah Fasilitas</a>
										<table class="table project-table">
											<thead>
												<tr>
													<th>Aksi</th>
													<th>Nama</th>
													<th>Perhari</th>
													<th>Perjam</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												@foreach($detail->getFacility as $fasilitas)
												<tr>
													<td>
														<a href="javascript:;" onclick="setHapusFasilitas('{{base64_encode(base64_encode($fasilitas->id_venue_facility))}}')" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#hapusFasilitas"><i class="fa fa-trash"></i></a>
													</td>
													<td>{{$fasilitas->name}}</td>
													<td>IDR {{number_format($fasilitas->price_perday)}}</td>
													<td>IDR {{number_format($fasilitas->price_perhour)}}</td>
													<td>
														@if($fasilitas->sts == '1')
														<a href="{{asset('sandwich/venue/fasilitas/show-hide.'.base64_encode(base64_encode($fasilitas->id_venue_facility)))}}" class="btn btn-sm btn-success">Ditampilkan</a>
														@else
														<a href="{{asset('sandwich/venue/fasilitas/show-hide.'.base64_encode(base64_encode($fasilitas->id_venue_facility)))}}" class="btn btn-sm btn-danger">Disembuyikan</a>
														@endif

													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
								<!-- END TABBED CONTENT -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->

<!-- Modal -->
<div class="modal fade" id="tambahRuangan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    			<h4 class="modal-title" id="myModalLabel">Daftarkan Venue Baru</h4>
	      	</div>
	      	<form method="post" action="{{url('sandwich/venue/ruangan/tambah')}}">
	      		{{csrf_field()}}
	      		<input type="hidden" name="id_venue" value="{{base64_encode(base64_encode($detail->id_venue))}}">
		      	<div class="modal-body">
		      		<div class="form-group">
		      			<label>Tipe Ruangan</label>
		      			<select class="form-control" name="tipe" required>
		      				<option value="" disabled selected> --- </option>
		      				@foreach($tipeRuangan as $tipe)
		      				<option value="{{$tipe->type_name}}">{{ucfirst($tipe->type_name)}}</option>
		      				@endforeach
		      			</select>
		      		</div>
		      		<div class="form-group">
		      			<label>Nama Ruangan</label>
		      			<input class="form-control" name="nama" placeholder="Masukkan Nama Venue.." type="text" required>
		      		</div>
		      		<div class="form-group">
		      			<label>Kode Ruangan</label>
		      			<input class="form-control" name="kode" placeholder="Masukkan Nomor telpon kantor.." type="text" required>
		      		</div>
		      		<div class="form-group">
		      			<label>Kapasitas Ruangan</label>
		      			<input class="form-control" name="kapasitas" placeholder="Masukkan Kontak yang dapat dihubungi.." type="number" required>
		      		</div>
		      		<div class="form-group">
		      			<label>Deskripsi Ruangan</label>
		      			<textarea class="form-control" name="deskripsi"></textarea>
		      		</div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
		        	<button type="submit" class="btn btn-primary">Tambahkan</button>
		      	</div>
	      	</form>
    	</div>
  	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahGaleri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    			<h4 class="modal-title" id="myModalLabel">Input Foto</h4>
	      	</div>
	      	<form method="post" action="{{url('sandwich/venue/gallery/tambah')}}" enctype="multipart/form-data">
	      		{{csrf_field()}}
	      		<input type="hidden" name="id_venue" value="{{base64_encode(base64_encode($detail->id_venue))}}">
		      	<div class="modal-body">
		      		<div class="form-group">
		      			<label>Gambar</label>
		      			<input class="form-control" name="gambar" type="file" accept=".jpg,.png" required>
		      		</div>
		      		<div class="form-group">
		      			<label>Nama Gambar</label>
		      			<input class="form-control" name="nama" placeholder="Masukkan Nama Gambar.." type="text" required>
		      		</div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
		        	<button type="submit" class="btn btn-primary">Tambahkan</button>
		      	</div>
	      	</form>
    	</div>
  	</div>
</div>
<div class="modal fade" id="hapusGaleri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog modal-sm" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    			<h4 class="modal-title" id="myModalLabel">Hapus Foto</h4>
	      	</div>
	      	<div class="modal-body" style="text-align: ">
	      		<h4>Ingin menghapus foto ?</h4>
	      		<p>Data tidak dapat dikembalikan !</p>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        	<a href="" class="btn btn-danger" id="tombolHapusGaleri">Hapus</a>
	      	</div>
    	</div>
  	</div>
</div>

<script type="text/javascript">
    function setHapusGaleri($id){
        $('#tombolHapusGaleri').attr("href", "{{url('sandwich/venue/gallery/hapus.')}}"+$id);
    }
</script>

<!-- Modal -->
<div class="modal fade" id="tambahFasilitas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    			<h4 class="modal-title" id="myModalLabel">Tambah Fasilitas</h4>
	      	</div>
	      	<form method="post" action="{{url('sandwich/venue/fasilitas/tambah')}}" >
	      		{{csrf_field()}}
	      		<input type="hidden" name="id_venue" value="{{base64_encode(base64_encode($detail->id_venue))}}">
		      	<div class="modal-body">
		      		<div class="form-group">
		      			<label>Nama</label>
		      			<input class="form-control" name="nama" type="text" required>
		      		</div>
		      		<div class="form-group">
		      			<label>Harga Perhari</label>
		      			<div class="input-group">
							<span class="input-group-addon">IDR</span>
							<input class="form-control" type="number" value="0" name="perhari" min="0" placeholder="Isikan Harga" required>
							<span class="input-group-addon">.00</span>
						</div>
						<small>*isikan angka 0 jika gratis</small>
		      		</div>
		      		<div class="form-group">
		      			<label>Harga Perjam</label>
		      			<div class="input-group">
							<span class="input-group-addon">IDR</span>
							<input class="form-control" type="number" value="0" name="perjam"  min="0" placeholder="Isikan Harga" required>
							<span class="input-group-addon">.00</span>
						</div>
						<small>*isikan angka 0 jika gratis</small>
		      		</div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
		        	<button type="submit" class="btn btn-primary">Tambahkan</button>
		      	</div>
	      	</form>
    	</div>
  	</div>
</div>
<div class="modal fade" id="hapusFasilitas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog modal-sm" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    			<h4 class="modal-title" id="myModalLabel">Hapus Fasilitas</h4>
	      	</div>
	      	<div class="modal-body" style="text-align:center; ">
	      		<h4>Ingin menghapus fasilitas ?</h4>
	      		<p>Data tidak dapat dikembalikan !</p>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        	<a href="" class="btn btn-danger" id="tombolHapusFasilitas">Hapus</a>
	      	</div>
    	</div>
  	</div>
</div>

<script type="text/javascript">
    function setHapusFasilitas($id){
        $('#tombolHapusFasilitas').attr("href", "{{url('sandwich/venue/fasilitas/hapus.')}}"+$id);
    }
</script>
<div class="modal fade bd-example-modal-lg" id="pengaturan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    			<h4 class="modal-title" id="myModalLabel">Hapus Fasilitas</h4>
	      	</div>
	      	<form action="{{url('sandwich/venue/pengaturan')}}" method="post">
      		{{csrf_field()}}
      		<input type="hidden" name="id_venue" value="{{base64_encode(base64_encode($detail->id_venue))}}">
	      	<div class="modal-body">
	      		<div class="custom-tabs-line tabs-line-bottom left-aligned">
					<ul class="nav" role="tablist">
						<li class="active"><a href="#pengaturan1" role="tab" data-toggle="tab">Ruangan</a></li>
						<li><a href="#pengaturan2" role="tab" data-toggle="tab">Kontak</a></li>
						<li><a href="#pengaturan3" role="tab" data-toggle="tab">Lokasi</a></li>
					</ul>
				</div>
				<!-- RUANGAN -->
				<div class="tab-content">
					<div class="tab-pane fade in active" id="pengaturan1">
						<div class="form-group row">
		    				<label class="col-sm-2 control-label text-right">Nama venue</label>
		    				<div class="col-sm-10">
		      					<input type="text" name="venue_name" class="form-control" placeholder="Nama Venue" value="{{$detail->venue_name}}" required="required">
		    				</div>
		  				</div>
		  				<div class="form-group row">
		    				<label class="col-sm-2 control-label text-right">Jenis venue</label>
		    				<div class="col-sm-10">
		      					<select class="form-control" name="venue_kind" required="required">
		      						@foreach($venueKind as $jenisVenue)
		      						<option value="{{$jenisVenue->name}}" <?php if($jenisVenue->name == $detail->venue_kind)echo "selected='selected'";?>>{{$jenisVenue->name}}</option>
		      						@endforeach
		      					</select>
		    				</div>
		  				</div>
		  				<div class="form-group row">
		    				<label class="col-sm-2 control-label text-right">Tipe venue</label>
		    				<div class="col-sm-10">
		      					<select class="form-control" name="venue_type" required="required">
		      						<option value="" disabled selected> --- </option>
		      						@foreach($venueType as $tipeVenue)
		      						<option value="{{$tipeVenue->name}}" <?php if($tipeVenue->name == $detail->venue_type)echo "selected='selected'"?>> {{$tipeVenue->name}} </option>
		      						@endforeach
		      					</select>
		    				</div>
		  				</div>
		  				<div class="form-group row">
		    				<label class="col-sm-2 control-label text-right">Jenis penyewaan venue</label>
		    				<div class="col-sm-10">
		      					<select class="form-control" name="room" required>
		      						<option value="" disabled="disabled" selected="selected"> --- </option>
		      						<option value="1" <?php if($detail->room == '1')echo "selected";?>>Venue</option>
		      						<option value="2" <?php if($detail->room == '2')echo "selected";?>>Ruangan</option>
		      						<option value="3" <?php if($detail->room == '3')echo "selected";?>>Meja </option>
		      						<option value="4" <?php if($detail->room == '4')echo "selected";?>>Ruangan dan Meja</option>
		      					</select>
		    				</div>
		  				</div>
		  				<div class="form-group row">
		    				<label class="col-sm-2 control-label text-right">Kerja sama venue</label>
		    				<div class="col-sm-10">
		      					<select class="form-control" name="cooperate" required>
		      						<option value="0" <?php if($detail->cooperate == '0')echo "selected";?>>Belum bekerja sama</option>
		      						<option value="1" <?php if($detail->cooperate == '1')echo "selected";?>>Telah bekerja sama</option>
		      					</select>
		    				</div>
		  				</div>
					</div>
					<div class="tab-pane fade" id="pengaturan2">
						
						<div class="form-group row">
		    				<label class="col-sm-2 control-label text-right">Nama Kontak</label>
		    				<div class="col-sm-10">
		      					<input type="text" name="contact_name" class="form-control" value="{{$detail->contact_name}}" placeholder="Nama Kontak">
		    				</div>
		  				</div>
		  				<div class="form-group row">
		    				<label class="col-sm-2 control-label text-right">No.HP Kontak</label>
		    				<div class="col-sm-10">
		      					<input type="text" name="contact_number" class="form-control" value="{{$detail->contact_number}}" placeholder="No.Handphone Kontak">
		    				</div>
		  				</div>
		  				<div class="form-group row">
		    				<label class="col-sm-2 control-label text-right">Email Kontak</label>
		    				<div class="col-sm-10">
		      					<input type="email" name="contact_email" class="form-control" value="{{$detail->contact_email}}" placeholder="Email Kontak">
		    				</div>
		  				</div>
		  				<div class="form-group row">
		    				<label class="col-sm-2 control-label text-right">Nomor Telpon Kantor</label>
		    				<div class="col-sm-10">
		      					<input type="text" name="official_number" class="form-control" value="{{$detail->official_number}}" placeholder="Nomor Telpon Kantor">
		    				</div>
		  				</div>
		  				<div class="form-group row">
		    				<label class="col-sm-2 control-label text-right">Email Kantor</label>
		    				<div class="col-sm-10">
		      					<input type="email" name="official_email" class="form-control" value="{{$detail->official_email}}" placeholder="Email Kantor">
		    				</div>
		  				</div>
		  				<div class="form-group row">
		    				<label class="col-sm-2 control-label text-right">Website</label>
		    				<div class="col-sm-10">
		      					<input type="text" name="website" class="form-control" value="{{$detail->website}}" placeholder="Website">
		    				</div>
		  				</div>
					</div>
					<div class="tab-pane fade" id="pengaturan3">
						
						<div class="form-group row">
		    				<label class="col-sm-2 control-label text-right">Alamat</label>
		    				<div class="col-sm-10">
		      					<input type="text" class="form-control" name="address" value="{{$detail->address}}"  placeholder="Nama Venue" required="required">
		    				</div>
		  				</div>
		  				<div class="form-group row">
		    				<label class="col-sm-2 control-label text-right">Provinsi</label>
		    				<div class="col-sm-10">
		      					<select class="form-control" name="province" required="required">
		      						<option value="" disabled="disabled" selected="selected"> --- </option>
		      						@foreach($areaProvince as $provinsi)
		      						<option value="{{$provinsi->id}}" <?php if($provinsi->id == $detail->province)echo "selected='selected'";?>>{{ucwords(strtolower($provinsi->name))}}</option>
		      						@endforeach
		      					</select>
		    				</div>
		  				</div>
		  				<div class="form-group row">
		    				<label class="col-sm-2 control-label text-right">Kabupaten/Kota</label>
		    				<div class="col-sm-10">
		      					<select class="form-control" name="city" required="required">
		      						<option value="" disabled="disabled" selected="selected"> --- </option>
		      						@foreach($areaCity as $kota)
		      						<option value="{{$kota->id}}" <?php if($kota->id == $detail->city)echo "selected='selected'";?>>{{ucwords(strtolower($kota->name))}}</option>
		      						@endforeach
		      					</select>
		    				</div>
		  				</div>
		  				<div class="form-group row">
		    				<label class="col-sm-2 control-label text-right">Kecamatan</label>
		    				<div class="col-sm-10">
		      					<select class="form-control" name="district" required="required">
		      						<option value="" disabled="disabled" selected="selected"> --- </option>
		      						@foreach($areaDistrict as $kecamatan)
		      						<option value="{{$kecamatan->id}}" <?php if($kecamatan->id == $detail->district)echo "selected='selected'";?>>{{ucwords(strtolower($kecamatan->name))}}</option>
		      						@endforeach
		      					</select>
		    				</div>
		  				</div>
		  				<div class="form-group row">
		    				<label class="col-sm-2 control-label text-right">Koordinat</label>
		    				<div class="col-sm-5">
		      					<input type="text" name="lat" value="{{$detail->lat}}" class="form-control" placeholder="Latitude">
		    				</div>
		    				<div class="col-sm-5">
		      					<input type="text" name="lon" value="{{$detail->lon}}" class="form-control" placeholder="Longitude">
		    				</div>
		  				</div>
					</div>
				</div>
  				
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        	<button type="submit" class="btn btn-danger">Simpan</a>
	      	</div>
	      	</form>
    	</div>
  	</div>
</div>
<script type="text/javascript">
	$("select[name=venue_kind]").change(function() {
	    $.get("{{url('api/v1/venue/getvenuetype')}}/"+$(this).val(), function(data, status){
	        $("select[name=venue_type]").html('');
	        $.each(data, function(index, hasil) {
		        $("select[name=venue_type]").append('<option value="'+hasil.name+'">'+hasil.name+'</option>');
			});
	    });
	});
	$("select[name=province]").change(function() {
	    $.get("{{url('api/v1/area/getcitybyprovince')}}/"+$(this).val(), function(data, status){
	        $("select[name=city]").html('<option value="" disabled="disabled" selected="selected"> --- </option>');
	        $.each(data, function(index, hasil) {
		        $("select[name=city]").append('<option value="'+hasil.id+'">'+hasil.name+'</option>');
			});
	    });
	});
	$("select[name=city]").change(function() {
	    $.get("{{url('api/v1/area/getdistrictbycity')}}/"+$(this).val(), function(data, status){
	        $("select[name=district]").html('<option value="" disabled="disabled" selected="selected"> --- </option>');
	        $.each(data, function(index, hasil) {
		        $("select[name=district]").append('<option value="'+hasil.id+'">'+hasil.name+'</option>');
			});
	    });
	});

</script>

<script type="text/javascript">
      var lokasi = {lat: -5.137845496694135, lng: 119.40707525634753};
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: lokasi
        });
        var marker = new google.maps.Marker({
          position: lokasi,
          map: map,
          draggable:true
        });

        google.maps.event.addListener(marker,'dragend',function(){
          $('input[name=area_lat').val(marker.getPosition().lat());
          $('input[name=area_lng').val(marker.getPosition().lng());
        });
   
      }
    </script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoq04fAVg-LNmUp4jisrlUBtCphBA5l6c&callback=initMap">
</script>
@endsection