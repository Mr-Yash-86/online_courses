<x-frontend>

	<div class="container">
		<div class="d-flex bd-highlight mb-3">
		<div class="p-2 bd-highlight">What's INSIDE?</div>
		<div class="ml-auto p-2 bd-highlight"><button class="btn btn-primary">ENROLL</button></div>
	</div>
	<div class="container">
		
	@php $i=1; @endphp
	@foreach($detailcourse as $detailcourse)	
	 {{-- <div class="container-fluid">
		<h5 style=""><a href="">{{$i++}}.{{$detailcourse->title}}</a></h5>
		<h5 style="float: right;"><a href="">{{$detailcourse->duration}}</a></h5>
	</div> --}}
	<div class="d-flex bd-highlight mb-3">
		<div class="p-2 bd-highlight">{{ $i++ }}</div>
		<div class="p-2 bd-highlight">
			<a href="{{ route('detaillesson',$detailcourse->id)}}" style="color: black;">{{$detailcourse->title}}</a></div>
		<div class="ml-auto p-2 bd-highlight">{{$detailcourse->duration}}</div>
	</div>
	@endforeach
	</div>
</x-frontend>