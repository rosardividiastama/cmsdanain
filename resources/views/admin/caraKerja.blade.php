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
			<button class="tablinks" onclick="openCity(event, 'Flow')" id="defaultOpen">Flow</button>
			<button class="tablinks" onclick="openCity(event, 'Syarat1')">Syarat PT</button>
			<button class="tablinks" onclick="openCity(event, 'Syarat2')">Syarat Org</button>
			</div>

			<!-- Tab content -->
			<div id="Flow" class="col-lg-12 tabcontent">
				<h3>Keterangan Flow</h3>
				<form action="{{ route('admin.CaraKerjaController.input_flow') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
					{!! csrf_field() !!}
					@foreach($keterangans as $keterangan)
					<div class="row">
						<div class="col-md-5">
                            <strong>Keterangan:</strong>
                            <input type="hidden" name="ketId" value="{{$keterangan->keterangan_id}}">
							<textarea type="text" name="keterangan" class="form-control" placeholder="Total Pendanaan" value="">{{$keterangan->keterangan_text}}</textarea>
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

			<div id="Syarat1" class="col-lg-12 tabcontent">
				<h3>Syarat Perusahaan</h3>
                <p style="color: green">*Tambah Syarat Perusahaan</p>
                <form action="{{ route('admin.CaraKerjaController.input_syarat_perusahaan') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
					{!! csrf_field() !!}
					<div class="row">
						<div class="col-md-5">
                            <strong>Keterangan:</strong>
							<textarea type="text" name="tambahSyarat" class="form-control" ></textarea>
                        </div>
                        <div class="col-md-5">
							<br/><button type="submit" class="btn btn-info btn-block">Tambah</button>
						</div>
					</div>
                </form>
                <p>&nbsp</p>
                @foreach($syarats as $syarat)
                <form action="{{ route('admin.CaraKerjaController.update_syarat_perusahaan') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
					{!! csrf_field() !!}
					<div class="row">
						<div class="col-md-5">
                            <strong>Point Syarat perusahaan:</strong>
                            <input type="hidden" name="syaratId" value="{{$syarat->syarat_id}}">
							<textarea type="text" name="syarattext" class="form-control" rows="4" value="">{{$syarat->syarat_text}}</textarea>
                        </div>
                        <div class="col-md-5">
							<br/><button type="submit" class="btn btn-success btn-block">Simpan</button>
						</div>
					</div>
                </form>
                @endforeach
					
			</div>

			<div id="Syarat2" class="col-lg-12 tabcontent">
                <h3>Syarat Perseorangan</h3>
                <p style="color: green">*Tambah Syarat Perorangan</p>
                <form action="{{ route('admin.CaraKerjaController.input_syarat_perorangan') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
					{!! csrf_field() !!}
					<div class="row">
						<div class="col-md-5">
                            <strong>Keterangan:</strong>
							<textarea type="text" name="tambahSyarat" class="form-control" ></textarea>
                        </div>
                        <div class="col-md-5">
							<br/><button type="submit" class="btn btn-info btn-block">Tambah</button>
						</div>
					</div>
                </form>
                <p>&nbsp</p>
                @foreach($syaratOrg as $syarat)
                <form action="{{ route('admin.CaraKerjaController.update_syarat_perusahaan') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
					{!! csrf_field() !!}
					<div class="row">
						<div class="col-md-5">
                            <strong>Point Syarat Perorangan:</strong>
                            <input type="hidden" name="syaratId" value="{{$syarat->syarat_id}}">
							<textarea type="text" name="syarattext" class="form-control" rows="4" value="">{{$syarat->syarat_text}}</textarea>
                        </div>
                        <div class="col-md-5">
							<br/><button type="submit" class="btn btn-success btn-block">Simpan</button>
						</div>
					</div>
                </form>
                @endforeach
				
			</div>

			<div id="Testimoni" class="col-lg-12 tabcontent">
				<h3>Tambah Testimoni</h3>
				<p style="color: green">*ukuran image foto 500x500 pixels, max 200kb, PNG file, background transparant</p>
				
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
