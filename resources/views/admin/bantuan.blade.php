@extends('layouts.layout')

@section('tittle')
FAQ
@endsection

@section('content')
<div class="main-panel">
	<div class="content-wrapper">
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
            <button class="tablinks" onclick="openCity(event, 'tambah')" id="defaultOpen">Tambah FAQ</button>
			<button class="tablinks" onclick="openCity(event, 'umum')">Umum</button>
			<button class="tablinks" onclick="openCity(event, 'pengaduan')">Pengaduan</button>
            <button class="tablinks" onclick="openCity(event, 'lender')">Lender</button>
            <button class="tablinks" onclick="openCity(event, 'biaya')">Biaya</button>
			</div>

			<!-- Tab content -->
			<div id="tambah" class="col-lg-12 tabcontent">
				<h3>Tambah FAQ</h3>
                <form action="{{ route('admin.BantuanController.store') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
					{!! csrf_field() !!}
					<div class="row">
						<div class="col-md-5">
                            <strong>Judul Bantuan FAQ:</strong>
							<input type="text" name="judul" class="form-control" >
						</div>
						<div class="col-md-5">
                            <strong>Pilih Jenis Bantuan:</strong>
							<select type="text" name="jenisBantuan" class="form-control" >
								<option value="1">Bantuan Umum</option>
								<option value="2">Bantuan Pengaduan</option>
								<option value="3">Bantuan Lender</option>
								<option value="4">Bantuan Biaya</option>
							</select>
                        </div>
						<div class="col-md-5">
                            <strong>Deskripsi:</strong>
							<textarea type="text" name="deskripsi" class="form-control" ></textarea>
						</div>
						
                        <div class="col-md-5">
							<br/><button type="submit" class="btn btn-info btn-block">Tambah</button>
						</div>
					</div>
                </form>	
			</div>

			<div id="umum" class="col-lg-12 tabcontent">
				<h3>Umum</h3>
				@foreach($bantuanUmum as $umum)
                <form action="{{ route('admin.BantuanController.update',$umum->bantuan_id) }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
					<div class="row">
						<div class="col-md-5">
                            <strong>Deskripsi:</strong>
							<textarea type="text" name="deskripsi" rows="6" class="form-control" >{{$umum->bantuan_text}}</textarea>
						</div>
						<div class="col-md-5">
							<div class="row">
								<strong>Judul Bantuan FAQ:</strong>
								<input type="text" name="judul" class="form-control" value="{{$umum->bantuan_title}}" >
							</div>
							<div class="row">
								<p>&nbsp</p>
								<button type="submit" class="btn btn-success btn-block">Simpan</button>
							</div>
						</div>
						
					</div>
				</form>
				<hr style="hr { display: block; margin-before: 0.5em; margin-after: 0.5em; margin-start: auto; margin-end: auto; overflow: hidden; border-style: inset; border-width: 4px;}">
				@endforeach
            </div>
            <div id="pengaduan" class="col-lg-12 tabcontent">
				<h3>Pengaduan</h3>
				@foreach($bantuanPengaduann as $pengaduan)
                <form action="{{ route('admin.BantuanController.update',$pengaduan->bantuan_id) }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
					<div class="row">
						<div class="col-md-5">
                            <strong>Deskripsi:</strong>
							<textarea type="text" name="deskripsi" rows="6" class="form-control" >{{$pengaduan->bantuan_text}}</textarea>
						</div>
						<div class="col-md-5">
							<div class="row">
								<strong>Judul Bantuan FAQ:</strong>
								<input type="text" name="judul" class="form-control" value="{{$pengaduan->bantuan_title}}" >
							</div>
							<div class="row">
								<p>&nbsp</p>
								<button type="submit" class="btn btn-success btn-block">Simpan</button>
							</div>
						</div>
						
					</div>
				</form>
				<hr style="hr { display: block; margin-before: 0.5em; margin-after: 0.5em; margin-start: auto; margin-end: auto; overflow: hidden; border-style: inset; border-width: 4px;}">
				@endforeach
            </div>
            <div id="lender" class="col-lg-12 tabcontent">
				<h3>Lender</h3>
				@foreach($bantuanLender as $lender)
                <form action="{{ route('admin.BantuanController.update',$lender->bantuan_id) }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
					<div class="row">
						<div class="col-md-5">
                            <strong>Deskripsi:</strong>
							<textarea type="text" name="deskripsi" rows="6" class="form-control" >{{$lender->bantuan_text}}</textarea>
						</div>
						<div class="col-md-5">
							<div class="row">
								<strong>Judul Bantuan FAQ:</strong>
								<input type="text" name="judul" class="form-control" value="{{$lender->bantuan_title}}" >
							</div>
							<div class="row">
								<p>&nbsp</p>
								<button type="submit" class="btn btn-success btn-block">Simpan</button>
							</div>
						</div>
						
					</div>
				</form>
				<hr style="hr { display: block; margin-before: 0.5em; margin-after: 0.5em; margin-start: auto; margin-end: auto; overflow: hidden; border-style: inset; border-width: 4px;}">
				@endforeach
			</div>

			<div id="biaya" class="col-lg-12 tabcontent">
				<h3>Biaya</h3>
				@foreach($bantuanBiaya as $biaya)
                <form action="{{ route('admin.BantuanController.update',$biaya->bantuan_id) }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
					<div class="row">
						<div class="col-md-5">
                            <strong>Deskripsi:</strong>
							<textarea type="text" name="deskripsi" rows="6" class="form-control" >{{$biaya->bantuan_text}}</textarea>
						</div>
						<div class="col-md-5">
							<div class="row">
								<strong>Judul Bantuan FAQ:</strong>
								<input type="text" name="judul" class="form-control" value="{{$biaya->bantuan_title}}" >
							</div>
							<div class="row">
								<p>&nbsp</p>
								<button type="submit" class="btn btn-success btn-block">Simpan</button>
							</div>
						</div>
						
					</div>
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
