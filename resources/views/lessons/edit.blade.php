<x-backend>
    @php
    $id = $lessons->id;
    $title = $lessons->title;
    $oldvideo = $lessons->video;
    $duration = $lessons->duration;
    $course_id = $lessons->course_id;
    @endphp

    <main class="app-content">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> 
                Edit Existing Lessons

                <a href="{{ route('lessons.index') }}" class="btn btn-outline-success btn-sm float-right"> <i class="fas fa-backward"></i> </a>

            </h6>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <form action="{{ route('lessons.update',$id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <input type="hidden" name="oldvideo" value="{{$lessons->video}}">
                            <div class="col-sm-10">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" id="nav-oldvideo-tab" data-toggle="tab" href="#nav-oldvideo" role="tab" aria-controls="nav-oldvideo" aria-selected="true"> Old Video </a>
                                        <a class="nav-link" id="nav-newvideo-tab" data-toggle="tab" href="#nav-newvideo" role="tab" aria-controls="nav-newvideo" aria-selected="false"> New Video </a>
                                    </div>
                                </nav>
                                <div class="tab-content mt-3" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-oldvideo" role="tabpanel" aria-labelledby="nav-oldvideo-tab">
                                        <img src="{{ asset($oldvideo) }}" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="nav-newvideo" role="tabpanel" aria-labelledby="nav-newvideo-tab">
                                        <input type="file" id="nav-newvideo" name="video">
                                    </div>

                                    <div class="text-danger form-control-feedback">
                                        {{ $errors->first('video') }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title_id" class="col-sm-2 col-form-label"> Title </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title_id" name="title" value="{{ $title }}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="course_id" class="col-sm-2 col-form-label"> Course </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="courseid">
                                        <option> Choose Course </option>
                                        @foreach($courses as $course)
                                        <option value="{{ $course->id }}" @if($course_id == $course->id) {{'selected'}} @endif> {{ $course->title }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price_id" class="col-sm-2 col-form-label"> Duration </label>
                                <div class="col-sm-10">
                                    <input type="text" name="duration" id="durationForm" maxlength=8 pattern="^((\d+:)?\d+:)?\d*$"
                                    title="The amount of seconds, optionally preceded by 
                                    &quot;minutes:&quot; or by &quot;hours:minutes:&quot; 
                                    (empty or zero leads to an infinite duration)."
                                    placeholder="hh:mm:ss (empty for infinite duration)" size=30 value="{{ $duration }}">
                                </div>
                            </div>

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