<x-frontend>
	<div class="container mt-5 mb-5">
		<div class="row">
			@foreach($detaillesson as $detaillesson)
			<div class="col-xl-3 col-lg-3 col-md-6">
				<div>
					<video  width="250" height="auto" controls class="mx-auto">
                   <source src="{{URL::asset($detaillesson->video)}}" type='video/mp4'>     	
                   </video>
				</div>
				<div>
					{{$detaillesson->title}}
				</div>
			</div>
			@endforeach
		</div>	
	</div>
		
</x-frontend>