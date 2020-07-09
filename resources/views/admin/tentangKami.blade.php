@extends('layouts.layout')

@section('tittle')
Cara Kerja
@endsection

@section('content')
<div class="main-panel">
	<div class="content-wrapper">
	  {{-- <div class="row purchace-popup">
		<div class="col-12">
		  <span class="d-block d-md-flex align-items-center">
			<p>Like what you see? Check out our premium version for more.</p>
			<a class="btn ml-auto download-button d-none d-md-block" href="https://github.com/BootstrapDash/StarAdmin-Free-Bootstrap-Admin-Template" target="_blank">Download Free Version</a>
			<a class="btn purchase-button mt-4 mt-md-0" href="https://www.bootstrapdash.com/product/star-admin-pro/" target="_blank">Upgrade To Pro</a>
			<i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
		  </span>
		</div>
	  </div> --}}

	  @if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif


					@if ($message = Session::get('success'))
					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>{{ $message }}</strong>
					</div>
					@endif

	  <div class="row">
		<!-- Tab links -->
			<div class="tab col-lg-12">
			<button class="tablinks" onclick="openCity(event, 'kami')" id="defaultOpen">Tentang Kami</button>
			<button class="tablinks" onclick="openCity(event, 'team')">Team</button>
			<button class="tablinks" onclick="openCity(event, 'statistik')">Statistik</button>
			</div>

			<!-- Tab content -->
			<div id="kami" class="col-lg-12 tabcontent">
				<h3>Tentang Kami, Deskripsi</h3>
                <p style="color: green">*Tambah Deskripsi</p>
                <form action="{{ route('admin.TentangKamiController.input_deskripsi') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
					{!! csrf_field() !!}
					<div class="row">
						<div class="col-md-5">
                            <strong>Deskripsi:</strong>
							<textarea type="text" name="tambahKeterangan" class="form-control" ></textarea>
                        </div>
                        <div class="col-md-5">
							<br/><button type="submit" class="btn btn-info btn-block">Tambah</button>
						</div>
					</div>
                </form>
                <p>&nbsp</p>
                @foreach($keterangans as $keterangan)
                <form action="{{ route('admin.TentangKamiController.update_deskripsi') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
					{!! csrf_field() !!}
					<div class="row">
						<div class="col-md-5">
                            <strong>Paragraf Deskripsi:</strong>
                            <input type="hidden" name="keteranganId" value="{{$keterangan->keterangan_id}}">
							<textarea type="text" name="Keterangantext" class="form-control" rows="4" value="">{{$keterangan->keterangan_text}}</textarea>
                        </div>
                        <div class="col-md-5">
							<br/><button type="submit" class="btn btn-success btn-block">Simpan</button>
						</div>
					</div>
                </form>
                @endforeach
					
			</div>

			<div id="team" class="col-lg-12 tabcontent">
                <h3>Tambah Team</h3>
				<p style="color: green">*ukuran image foto 1125x834 pixels, max 200kb, PNG file, background transparant</p>
				<form action="{{ route('admin.TentangKamiController.upload_team') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
					{!! csrf_field() !!}
					{{-- @foreach($videos as $video) --}}
					{{-- <div class="row"> --}}
						<div class="col-lg-6">
							<div class="row">
                                <div class="col-md-6">
                                    <strong>Title / Jabatan:</strong>
                                    <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="">
                                </div>
                                <div class="col-md-6">
                                    <strong>Nama:</strong>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="">
                                </div>
                                
                            </div>
                            <p>&nbsp</p>
                            <strong>Pilih Foto:</strong>
                            <input type="file" name="image" class="form-control">
							<div class="row">
								<div class="col-lg-12">
									<p>&nbsp</p>
									<button type="submit" class="btn btn-success btn-block">Tambah</button>
								</div>
							</div>
						</div>
					{{-- </div> --}}
					
					{{-- @endforeach --}}
				</form>
				<p>&nbsp</p>
                <h3>Team Danain</h3>
                @foreach($teams as $team)
                    <form action="{{ route('admin.TentangKamiController.update_team') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        {{-- @foreach($videos as $video) --}}
                        <div class="row">
                            <div class="col-md-3">
                                    <a class="thumbnail fancybox" rel="ligthbox" href="/images/team/{{ $team->team_file }}">
                                        <img class="img-responsive" alt="" src="/images/team/{{ $team->team_file }}" />
                                        <div class='text-center'>
                                            <input type="hidden" name="idTeam" value="{{ $team->team_id }}">
                                            <small class='text-muted'>{{ $team->team_nama }}</small>
                                        </div> <!-- text-center / end -->
                                    </a>
                            </div>
                            <div class="col-md-8">
								<div class="row">
									<div class="col-md-6">
										<strong>Nama:</strong>
										{{-- <input type="hidden" name="idtes" value="{{ $testimoni->testimoni_id }}"> --}}
										<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ $team->team_nama }}">
									</div>
									<div class="col-md-6">
										<strong>Pekerjaan:</strong>
										<input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="{{ $team->team_jabatan }}">
									</div>
								</div>
                                <p>&nbsp</p>
                                <div class="row">
									<div class="col-md-6">
                                        <input type="file" name="image" class="form-control">
									</div>
									<div class="col-md-6">
                                        <button type="submit" class="btn btn-success btn-block">Simpan</button>
									</div>
								</div>
							</div>
                        </div>
                    </form>
                    <hr style="hr { display: block; margin-before: 0.5em; margin-after: 0.5em; margin-start: auto; margin-end: auto; overflow: hidden; border-style: inset; border-width: 4px;}">
                @endforeach
				
			</div>

			<div id="statistik" class="col-lg-12 tabcontent">
				<h3>Statistik</h3>
				@foreach($stats as $stat)
                <form action="{{ route('admin.TentangKamiController.update_stat') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
					<div class="row">
						<input type="hidden" name="idStat" value="{{ $stat->statistik_id }}">
                        <div class="col-md-4">
                            <strong>TKB:</strong>
						<input type="text" name="tkb" class="form-control" placeholder="TKB" value="{{$stat->statistik_tkb}}">
                        </div>
                        <div class="col-md-4">
                            <strong>Total Pinjaman:</strong>
                            <input type="text" name="totpinjaman" class="form-control" placeholder="Total Pinjaman" value="{{$stat->stat_tot_pinjaman}}">
                        </div>
                        <div class="col-md-4">
                            <strong>Total Outstanding:</strong>
                            <input type="text" name="totoutstand" class="form-control" placeholder="Total Outstanding" value="{{$stat->stat_tot_outstanding}}">
                        </div>
                    </div>
                    <p>&nbsp</p>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Jumlah Borrower:</strong>
                            <input type="text" name="jumborrow" class="form-control" placeholder="Jumlah Borrower" value="{{$stat->stat_jml_borrower}}">
                        </div>
                        <div class="col-md-4">
                            <strong>Jumlah Borrower Aktif:</strong>
                            <input type="text" name="jumborrowaktif" class="form-control" placeholder="Jumlah Borrower Aktif" value="{{$stat->stat_jml_borrower_aktif}}">
                        </div>
                        <div class="col-md-4">
                            <strong>Nilai Pinjaman Terendah:</strong>
                            <input type="text" name="pinjterrendah" class="form-control" placeholder="Nilai Pinjaman Terendah" value="{{$stat->stat_nilai_pinj_terendah}}">
                        </div>
                    </div>
                    <p>&nbsp</p>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Nilai Pinjaman Tertinggi:</strong>
                            <input type="text" name="pinjtertinggi" class="form-control" placeholder="Nilai Pinjaman Tertinggi" value="{{$stat->stat_nilai_pinj_tertinggi}}">
                        </div>
                        <div class="col-md-4">
                            <p>&nbsp</p>
                            <button type="submit" class="btn btn-success btn-block">Simpan</button>
                        </div>
                    </div>
				</form>
				@endforeach
				
			</div>
	  </div>

	</div>
	<!-- content-wrapper ends -->
	<!-- partial:partials/_footer.html -->
	<footer class="footer">
	  <div class="container-fluid clearfix">
		<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020
		  <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
		<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
		  <i class="mdi mdi-heart text-danger"></i>
		</span>
	  </div>
	</footer>
	<!-- partial -->
  </div>

@endsection

@section('extracss')
<style>
	
	/* Style the tab */
	.tab {
	  overflow: hidden;
	  border: 1px solid #ccc;
	  background-color: #f1f1f1;
	}
	
	/* Style the buttons inside the tab */
	.tab button {
	  background-color: inherit;
	  float: left;
	  border: none;
	  outline: none;
	  cursor: pointer;
	  padding: 14px 16px;
	  transition: 0.3s;
	  font-size: 17px;
	}
	
	/* Change background color of buttons on hover */
	.tab button:hover {
	  background-color: #ddd;
	}
	
	/* Create an active/current tablink class */
	.tab button.active {
	  background-color: #ccc;
	}
	
	/* Style the tab content */
	.tabcontent {
	  display: none;
	  padding: 6px 12px;
	  border: 1px solid #ccc;
	  border-top: none;
	}

	.gallery{
        display: inline-block;
        margin-top: 20px;
	}
	
	.close-icon{
    	border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }
    .form-image-upload{
        background: #e8e8e8 none repeat scroll 0 0;
        padding: 15px;
	}
	.img-responsive{
		max-width: 100%;
	}
	</style>

@endsection

@section('extrajs')
{{-- JS TAB --}}
<script>
	function openCity(evt, cityName) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(cityName).style.display = "block";
	evt.currentTarget.className += " active";
	}

	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$(".fancybox").fancybox({
				openEffect: "none",
				closeEffect: "none"
			});
		});
	</script>
@endsection
