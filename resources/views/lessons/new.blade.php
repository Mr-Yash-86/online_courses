<x-backend>
    <main class="app-content">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> 
               Create New Lesson

               <a href="{{ route('lessons.index') }}" class="btn btn-outline-success btn-sm float-right"> <i class="fas fa-backward"></i> </a>
           </h6>

       </div>
       <div class="row mt-5">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="{{ route('lessons.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group row">
                            <label for="title_id" class="col-sm-2 col-form-label"> Title </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title_id" name="title">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="course_id" class="col-sm-2 col-form-label"> Course </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="courseid">
                                    <option> Choose Courses </option>
                                    @foreach($courses as $course)
                                    <option value="{{ $course->id }}"> {{ $course->title }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="price_id" class="col-sm-2 col-form-label"> Video </label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="video_id" name="video">
                            </div>
                        </div>


                        <!-- <div class="form-group row">
                            <label for="lecture_id" class="col-sm-2 col-form-label"> Duration </label>
                            <div class="col-sm-10">
                                <input type="text" name="duration" id="durationForm" maxlength=8 pattern="^((\d+:)?\d+:)?\d*$"
                                title="The amount of seconds, optionally preceded by 
                                &quot;minutes:&quot; or by &quot;hours:minutes:&quot; 
                                (empty or zero leads to an infinite duration)."
                                placeholder="hh:mm:ss (empty for infinite duration)" size=30>
                            </div>
                        </div> -->

                        

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icofont-save"></i>
                                    Save
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</x-backend>