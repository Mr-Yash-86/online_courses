<x-frontend>
	<!--? Hero Start -->
	<div class="slider-area ">
		<div class="slider-height2 d-flex align-items-center">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="hero-cap hero-cap2 text-center">
							<h2>Registration</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="section-top-border text-center">
		<div class="row">
			<div class="col-lg-4 col-md-4"></div>
			<div class="col-lg-4 col-md-4">
				<div class="typography mb-5">
					<h1>Fill Your Information</h1>
				</div>

				{{-- Error --}}
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

				<form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
					@csrf

					<div class="mt-10">
						<input type="text" name="name" placeholder="Name" required
						class="single-input">
					</div>
					
					<div class="mt-10">
						<input type="email" name="email" placeholder="E-Mail" required
						class="single-input">
					</div>
					<div class="mt-10">
						<input type="password" name="password" placeholder="Password" required
						class="single-input">
					</div>
					<div class="button-group-area mt-40">
						<button class="genric-btn danger radius">Register</button>
					</div>

				</form>
			</div>
		</div>
	</div>

</x-frontend>