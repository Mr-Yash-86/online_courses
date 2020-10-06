<x-frontend>
	<div class="container-fluid mb-5">
		<h4>What's INSIDE ... ?</h4>
	</div>
	
	@php $i=1; @endphp
	@foreach($detailcourse as $detailcourse)
                                        @php
                                        $id = $detailcourse->id;
                                        $title = $detailcourse->title;
                                        $duration = $detailcourse->duration;
                                        @endphp
	
		<div class="container-fluid">
		<h5 style=""><a href="">{{$i++}}.{{$title}}</a></h5>
		<h5 style="float: right;"><a href="">{{$duration}}</a></h5>
	</div>
	@endforeach
</x-frontend>