<x-frontend>
	<div class="container mt-5 mb-5">
		<div class="row">
			@foreach($detaillesson as $detaillesson)
			<div class="col-xl-6 col-lg-6 col-md-12 mt-5">
				<div>
					<p>{{$detaillesson->title}}</p>
				</div>
				<div>
					<video  width="500" height="auto" controls class="mx-auto">
                   <source src="{{URL::asset($detaillesson->video)}}" type='video/mp4'>     	
                   </video>
				</div>
				
			</div>
			@endforeach
		</div>	
	</div>
		
</x-frontend>