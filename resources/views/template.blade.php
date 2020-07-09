@extends('layouts.layout')

@section('tittle')
Beranda
@endsection

@section('content')
<div class="main">
	<div class="section sidemain">
		<div class="container">
			<button class="tablink" onclick="openPage('Slide1', this, '')" id="defaultOpen">Slide Banner</button>
			<button class="tablink" onclick="openPage('Statistik', this, '')">Statistik</button>
			<button class="tablink" onclick="openPage('Video', this, '')">Video</button>
			<button class="tablink" onclick="openPage('Testimoni', this, '')">Testimoni</button>
			<button class="tablink" onclick="openPage('Liputan', this, '')">Liputan</button>

			<div id="Slide1" class="tabcontent">
				<h3>Slide Banner</h3>
				<div class="row">
						<div>
							<input type="checkbox" id="myCheckbox1" />
							<label for="myCheckbox1"><img src="../img/slider/slide1.png" /></label>
						</div>
						<div>
							<input type="checkbox" id="myCheckbox2" />
							<label for="myCheckbox2"><img src="../img/slider/slide2.png" /></label>
						</div>
						<div>
							<input type="checkbox" id="myCheckbox3" />
							<label for="myCheckbox3"><img src="../img/slider/slide3.png" /></label>
						</div>
				</div>
				<div class="duo-columns">
					<input type="submit" class="btn btn-info btn-block">
				</div>
				<div class="duo-columns">
					<input type="file" id="img" name="img" accept="img/*" class="btn btn-info btn-block">
				</div>
			</div>

		</div>
	</div>
  </div>
@endsection