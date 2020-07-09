@extends('layouts.layout')

@section('tittle')
Beranda
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
			<button class="tablinks" onclick="openCity(event, 'Slide1')" id="defaultOpen">Banner</button>
			<button class="tablinks" onclick="openCity(event, 'Statistik')">Statistik</button>
			<button class="tablinks" onclick="openCity(event, 'Video')">Video</button>
			<button class="tablinks" onclick="openCity(event, 'Testimoni')">Testimoni</button>
			</div>

			<!-- Tab content -->
			<div id="Slide1" class="col-lg-12 tabcontent">
				<h3>Slide Banner</h3>
				<p style="color: green">*ukuran image banner 1920x790 pixels, max 700kb, PNG file</p>
				<form action="{{ route('admin.HomeController.upload_banner') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
					{!! csrf_field() !!}
		
					<div class="row">
						<div class="col-md-5">
							<strong>Title:</strong>
							<input type="text" name="title" class="form-control" placeholder="Title">
						</div>
						<div class="col-md-5">
							<strong>Image:</strong>
							<input type="file" name="image" class="form-control">
						</div>
						<div class="col-md-2">
							<br/>
							<button type="submit" class="btn btn-success">Upload</button>
						</div>
					</div>
				</form>

				<div class="row">
					<div class='gallery'>
							@if($banners->count())
								@foreach($banners as $banner)
								<div class='three-columns col-sm-4'>
									{{-- <a href="">cccccc</a> --}}
									<div class=''>
										<a class="thumbnail fancybox" rel="ligthbox" href="/images/banner/{{ $banner->banner_file }}">
											<img class="img-responsive" alt="" src="/images/banner/{{ $banner->banner_file }}" />
											<div class='text-center'>
												<small class='text-muted'>{{ $banner->banner_title }}</small>
											</div> <!-- text-center / end -->
										</a>
										<form action="{{ route('admin.HomeController.destroy_banner',$banner->banner_id) }}" method="POST">
											<input type="hidden" name="_method" value="delete">
											{!! csrf_field() !!}
											<button type="submit" class="close-icon btn btn-danger"><i class="fas fa-times"></i></button>
										</form>
										<form action="{{ route('admin.HomeController.aktif_banner',$banner->banner_id) }}" method="POST">
											@if ($banner->banner_status == 'off')
												<input type="hidden" name="_method" value="">
												{!! csrf_field() !!}
												<button type="submit" class="btn btn-info">Aktifkan</button>
											@elseif ($banner->banner_status == 'on')
												<input type="hidden" name="_method" value="">
												{!! csrf_field() !!}
												<button type="submit" class="btn btn-dark">Nonaktifkan</button>
											@endif 
										</form>
									</div> <!-- col-sm / end -->
								</div>
								@endforeach
							@endif
						</div> <!-- list-group / end -->
					</div> <!-- row / end -->
			</div>

			<div id="Statistik" class="col-lg-12 tabcontent">
				<h3>Statistik Background</h3>
				<p style="color: green">*ukuran image background 1920x790 pixels, max 700kb, PNG file</p>
					<form action="{{ route('admin.HomeController.upload_stk_bg') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
						{!! csrf_field() !!}
						<div class="row">
							<div class="col-md-5">
								<strong>Title:</strong>
								<input type="text" name="title" class="form-control" placeholder="Title">
							</div>
							<div class="col-md-5">
								<strong>Image:</strong>
								<input type="file" name="image" class="form-control">
							</div>
							<div class="col-md-2">
								<br/>
								<button type="submit" class="btn btn-success">Upload</button>
							</div>
						</div>
					</form>

					<div class="row">
						<div class='gallery'>
								@if($backgrounds->count())
									@foreach($backgrounds as $background)
									<div class='three-columns col-sm-4'>
										{{-- <div class=''> --}}
											<a class="thumbnail fancybox" rel="ligthbox" href="/images/background{{ $background->background_file }}">
												<img class="img-responsive" alt="" src="/images/background/{{ $background->background_file }}" />
												<div class='text-center'>
													<small class='text-muted'>{{ $background->background_title }}</small>
												</div> <!-- text-center / end -->
											</a>
											<form action="{{ route('admin.HomeController.destroy_stk_bg',$background->background_id) }}" method="POST">
												<input type="hidden" name="_method" value="delete">
												{!! csrf_field() !!}
												<button type="submit" class="close-icon btn btn-danger"><i class="fas fa-times"></i></button>
											</form>

											<form action="{{ route('admin.HomeController.aktif_stk_bg',$background->background_id) }}" method="POST">
												@if ($background->background_status == 'off')
													<input type="hidden" name="_method">
													{!! csrf_field() !!}
													<button type="submit" class="btn btn-info">Aktifkan</button>
												@elseif ($background->background_status == 'on')
													<input type="hidden" name="_method">
													{!! csrf_field() !!}
													<button type="submit" class="btn btn-dark">Nonaktifkan</button>
												@endif
											</form>
										{{-- </div> <!-- col-sm / end --> --}}
									</div>
									@endforeach
								@endif
							</div> <!-- list-group / end -->
					</div> <!-- row / end -->
				
				<p>&nbsp</p>
				<h3>Nominal Statistik</h3>
				<form action="{{ route('admin.HomeController.input_stat') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
					{!! csrf_field() !!}
					@foreach($statistiks as $statistik)
					<div class="row">
						<div class="col-md-5">
							<strong>Total Pendanaan:</strong>
							<input type="text" name="pendanaan" class="form-control" placeholder="Total Pendanaan" value="{{$statistik->statistik_pendanaan}}">
						</div>
						<div class="col-md-5">
							<strong>Pinjaman:</strong>
							<input type="text" name="pinjaman" class="form-control" placeholder="Pinjaman" value="{{$statistik->statistik_pinjaman}}">
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<strong>NPL:</strong>
							<input type="text" name="npl" class="form-control" placeholder="NPL" value="{{$statistik->statistik_npl}}">
						</div>
						<div class="col-md-5">
							<strong>TKB:</strong>
							<input type="text" name="tkb" class="form-control" placeholder="TKB" value="{{$statistik->statistik_tkb}}">
						</div>
						<div class="col-md-2">
							
						</div>
					</div>
					{{-- <p>&nbsp</p> --}}
					<div class="row">
						<div class="col-md-5">
							<br/><button type="submit" class="btn btn-success btn-block">Simpan</button>
						</div>
					</div>
					@endforeach
				</form>
			</div>

			<div id="Video" class="col-lg-12 tabcontent">
				<h3>Video</h3>
				<form action="{{ route('admin.HomeController.input_video_text') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
					{!! csrf_field() !!}
					@foreach($videos as $video)
					<div class="row">
						<div class="col-md-5">
							<strong>Title Text:</strong>
						<input type="text" name="title" class="form-control" placeholder="Title Text" value="{{$video->video_title}}">
						</div>
						<div class="col-md-5">
							<strong>Hash Tag:</strong>
							<input type="text" name="hashtag" class="form-control" placeholder="Hash Tag" value="{{$video->video_hashtag}}">
						</div>
					</div>
					<p>&nbsp</p>
					<div class="row">
						<div class="col-md-5">
							<strong>Text Samping Video:</strong>
							<textarea name="textDana" class="form-control" placeholder="Text Video" rows="4" cols="50" >{{$video->video_text}}</textarea>
						</div>
						<div class="col-md-5">
							<strong>Link Video Youtube:</strong>
							<textarea name="linkvideo" class="form-control" placeholder="Link Video" rows="4" cols="50" >{{$video->video_link}}</textarea>
						</div>
					</div>
					{{-- <p>&nbsp</p> --}}
					<div class="row">
						<div class="col-md-5">
							<br/><button type="submit" class="btn btn-success btn-block">Simpan</button>
						</div>
					</div>
					@endforeach
				</form>
			</div>

			<div id="Testimoni" class="col-lg-12 tabcontent">
				<h3>Tambah Testimoni</h3>
				<p style="color: green">*ukuran image foto 500x500 pixels, max 200kb, PNG file, background transparant</p>
				<form action="{{ route('admin.HomeController.input_testi') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
					{!! csrf_field() !!}
					{{-- @foreach($videos as $video) --}}
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<strong>Testimoni:</strong>
									<textarea name="testimoni" class="form-control" placeholder="Testimoni" value="" rows="6" cols="50"></textarea>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<strong>Nama:</strong>
											<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="">
										</div>
										<div class="col-md-6">
											<strong>Pekerjaan:</strong>
											<input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="">
										</div>
									</div>
									<strong>Pilih Foto:</strong>
									<input type="file" name="image" class="form-control">
								</div>
								
							</div>
							<div class="row">
								<div class="col-md-12">
									<p>&nbsp</p>
									<button type="submit" class="btn btn-success btn-block">Tambah</button>
								</div>
							</div>
						</div>
					</div>
					
					{{-- @endforeach --}}
				</form>
				<p>&nbsp</p>
				<h3>Daftar Testimoni</h3>
				@foreach($testimonies as $testimoni)
					<form action="{{ route('admin.HomeController.update_testi') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
						{!! csrf_field() !!}
						{{-- @foreach($videos as $video) --}}
						<div class="row">
							<div class="col-md-3">
									<a class="thumbnail fancybox" rel="ligthbox" href="/images/testimoni/{{ $testimoni->testimoni_foto }}">
										<img class="img-responsive" alt="" src="/images/testimoni/{{ $testimoni->testimoni_foto }}" />
										<div class='text-center'>
											<small class='text-muted'>{{ $testimoni->testimoni_nama }}</small>
										</div> <!-- text-center / end -->
									</a>
									{{-- <form action="{{ route('admin.HomeController.destroy_banner',$testimoni->testimoni_id) }}" method="POST">
										<input type="hidden" name="_method" value="delete">
										{!! csrf_field() !!}
										<button type="submit" class="close-icon btn btn-danger"><i class="fas fa-times"></i></button>
									</form> --}}
									<div class="row">
										<div class="col-md-12">
											<input type="file" name="image" class="form-control">
										</div>
										
									</div>
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-6">
										<strong>Nama:</strong>
										<input type="hidden" name="idtes" value="{{ $testimoni->testimoni_id }}">
										<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ $testimoni->testimoni_nama }}">
									</div>
									<div class="col-md-6">
										<strong>Pekerjaan:</strong>
										<input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="{{ $testimoni->testimoni_pekerjaan }}">
									</div>
								</div>
								<p>&nbsp</p>
								<div class="col-md-12">
									<div class="row">
										<strong>Testimoni:</strong>
									<textarea name="testimoni" class="form-control" placeholder="Testimoni" value="" rows="5" cols="50">{{ $testimoni->testimoni_testi }}</textarea>
									</div>
									
								</div>
							</div>
							<div class="col-md-6">
								<p>&nbsp</p>
								<button type="submit" class="btn btn-success btn-block">Simpan</button>
							</div>
							<div class="col-md-6">
								<p>&nbsp</p>
								<button type="submit" class="btn btn-info btn-block">Aktifkan</button>
							</div>
						</div>
						
						{{-- <p>&nbsp</p> --}}
						{{-- @endforeach --}}
					</form>
					<hr style="hr { display: block; margin-before: 0.5em; margin-after: 0.5em; margin-start: auto; margin-end: auto; overflow: hidden; border-style: inset; border-width: 4px;}">
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
