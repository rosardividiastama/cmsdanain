<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
	  <li class="nav-item nav-profile">
		{{-- <div class="nav-link">
		  <div class="user-wrapper">
			<div class="profile-image">
			  <img src="images/faces/face1.jpg" alt="profile image">
			</div>
			<div class="text-wrapper">
			  <p class="profile-name">Richard V.Welsh</p>
			  <div>
				<small class="designation text-muted">Manager</small>
				<span class="status-indicator online"></span>
			  </div>
			</div>
		  </div>
		  <button class="btn btn-success btn-block">New Project
			<i class="mdi mdi-plus"></i>
		  </button>
		</div> --}}
	  </li>
	  <li class="nav-item">
		<a class="nav-link" href="{{ url('/home') }}">
		  <i class="menu-icon mdi mdi-television"></i>
		  <span class="menu-title">Home</span>
		</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" href="{{ url('/carakerja') }}">
		  <i class="menu-icon mdi mdi-content-copy"></i>
		  <span class="menu-title">Cara Kerja</span>
		  <i class="menu-title"></i>
		</a>
		{{-- <div class="collapse" id="ui-basic">
		  <ul class="nav flex-column sub-menu">
			<li class="nav-item">
			  <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
			</li>
		  </ul>
		</div> --}}
	  </li>
	  <li class="nav-item">
		<a class="nav-link" href="{{ url('/tentangkami') }}">
		  <i class="menu-icon mdi mdi-human-male-female"></i>
		  <span class="menu-title">Tentang Kami</span>
		</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" href="{{ url('/bantuan') }}">
		  <i class="menu-icon mdi mdi-help"></i>
		  <span class="menu-title">Bantuan / FAQ</span>
		</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" href="{{ url('/karir') }}">
		  <i class="menu-icon mdi mdi-presentation"></i>
		  <span class="menu-title">Karir</span>
		</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" href="pages/icons/font-awesome.html">
		  <i class="menu-icon mdi mdi-lock-open-outline"></i>
		  <span class="menu-title">Syarat dan Ketentuan</span>
		</a>
	  </li>
	</ul>
  </nav>