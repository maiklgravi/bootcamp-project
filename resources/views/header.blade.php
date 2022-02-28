<nav class="navbar navbar-expand-lg navbar-dark bg-dark h-25">
		<div class="container-fluid">
		  <a class="navbar-brand ms-5 text_size" href="{{route('home')}}">Cinema M</a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse text_size" id="navbarText">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0 margin_left">
			  <li class="nav-item">
				<a class="nav-link active " aria-current="page" href="{{route('home')}}">Home</a>
			  </li>
			  <li class="nav-item ">
				<a class="nav-link" href="{{route('about_us')}}">About us</a>
			  </li>
			  <li class="nav-item ">
				<a class="nav-link" href="{{route('contactUs')}}">Contact us</a>
			  </li>
			  <li class="nav-item ">
				<a class="nav-link" href="{{route('blog')}}">Blog</a>
			  </li>
			  <li class="nav-item ">
				<a class="nav-link" href="{{route('film')}}">Films</a>
			  </li>
			</ul>
			<div>
                @if (Auth::check())
                <a href="{{route('user.private')}}" class="margin_bottom margin_left">
					<button type="button" class="button_size btn btn-success">Cabinet</button>
					</a>

                @else
                <a href="{{route('user.private')}}" class="margin_bottom margin_left">
					<button type="button" class="button_size btn btn-success">Log in</button>
					</a>

                @endif

		  </div>
			</div>
		  </nav>
<div>
