<nav class="navbar navbar-expand-lg navbar-dark bg-dark h-25">
		<div class="container-fluid">
		  <a class="navbar-brand ms-5 text_adaptiv" href="{{route('home')}}">Cinema M</a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			  <li class="nav-item">
				<a class="nav-link active text_adaptiv" aria-current="page" href="{{route('home')}}">Home</a>
			  </li>
			  <li class="nav-item text_adaptiv">
				<a class="nav-link" href="{{route('about_us')}}">About us</a>
			  </li>
			  <li class="nav-item text_adaptiv">
				<a class="nav-link" href="{{route('contactUs')}}">Contact us</a>
			  </li>
			  <li class="nav-item text_adaptiv">
				<a class="nav-link" href="{{route('blog')}}">Blog</a>
			  </li>
			  <li class="nav-item text_adaptiv">
				<a class="nav-link" href="{{route('film')}}">Films</a>
			  </li>
			</ul>
			<div class="p-2 ">
                @if (Auth::check())
                <a href="{{route('user.private')}}" class="">
					<img src="https://img.icons8.com/pastel-glyph/40/000000/person-male--v3.png"/>
					</a>

                @else
                <a href="{{route('user.private')}}" class="">
					<button type="button" class="btn btn-primary">Log in</button>
					</a>

                @endif

		  </div>
			</div>
		  </nav>
<div>
