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
            <button class="tablinks" onclick="openCity(event, 'daftar')" id="defaultOpen">Edit Daftar</button>
			</div>

			<!-- Tab content -->
			<div id="daftar" class="col-lg-12 tabcontent">
                <h3>Daftar</h3>
                @foreach ($karirs as $karir)
                    <form action="{{ route('admin.KarirController.update',$karir->karir_id) }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-5">
                                    <strong>Divisi:</strong>
                                <input type="text" name="divisi" class="form-control" value="{{$karir->karir_divisi}}">
                                </div>
                                <div class="col-md-5">
                                    <strong>Posisi:</strong>
                                    <input type="text" name="job" class="form-control" value="{{$karir->karir_job}}">
                                </div>
                            </div>
                            <p>&nbsp</p>
                            <div class="row">
                                <div class="col-md-10">
                                    <textarea name="messageUp">{{$karir->karir_text}}</textarea>
                                </div>
                            </div>
                            <p>&nbsp</p>
                            <div class="row">
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-info btn-block">Simpan</button>
                                </div>
                                <div class="col-md-5">
                                    
                                </div>
                            </div>

                        </div>
                    </form>
                @endforeach
                
            </div>
            <div id="pengaduan" class="col-lg-12 tabcontent">
				<h3>Pengaduan</h3>
				
            </div>
            <div id="lender" class="col-lg-12 tabcontent">
				<h3>Lender</h3>
				
			</div>

			<div id="biaya" class="col-lg-12 tabcontent">
				<h3>Biaya</h3>
				
				
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
{{-- JS Textarea --}}
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'messageUp' );
</script>

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
