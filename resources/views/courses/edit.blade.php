<x-backend>
    @php
    $id = $courses->id;
    $title = $courses->title;
    $oldphoto = $courses->photo;
    $lecture = $courses->lecture;
    $price = $courses->price;
    $category_id = $courses->category_id;
    $level_id = $courses->level_id;
    @endphp

    <main class="app-content">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> 
                Edit Existing Courses

                <a href="{{ route('courses.index') }}" class="btn btn-outline-success btn-sm float-right"> <i class="fas fa-backward"></i> </a>

            </h6>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <form action="{{ route('courses.update',$id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <input type="hidden" name="oldphoto" value="{{$courses->photo}}">
                            <div class="col-sm-10">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" id="nav-oldphoto-tab" data-toggle="tab" href="#nav-oldphoto" role="tab" aria-controls="nav-oldphoto" aria-selected="true"> Old Photo </a>
                                        <a class="nav-link" id="nav-newphoto-tab" data-toggle="tab" href="#nav-newphoto" role="tab" aria-controls="nav-newphoto" aria-selected="false"> New Photo </a>
                                    </div>
                                </nav>
                                <div class="tab-content mt-3" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-oldphoto" role="tabpanel" aria-labelledby="nav-oldphoto-tab">
                                        <img src="{{ asset($oldphoto) }}" class="img-fluid">
                                    </div>
                                    <div class="tab-pane fade" id="nav-newphoto" role="tabpanel" aria-labelledby="nav-newphoto-tab">
                                        <input type="file" id="nav-newphoto" name="photo">
                                    </div>

                                    <div class="text-danger form-control-feedback">
                                        {{ $errors->first('photo') }}
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
                                <label for="photo_id" class="col-sm-2 col-form-label"> Category </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="categoryid">
                                        <option> Choose Category </option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if($category_id == $category->id) {{'selected'}} @endif> {{ $category->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price_id" class="col-sm-2 col-form-label"> Price </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="price_id" name="price" value="{{ $price }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lecture_id" class="col-sm-2 col-form-label"> Lecture </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="lecture_id" name="lecture" value="{{ $lecture }}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="photo_id" class="col-sm-2 col-form-label"> Level </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="levelid">
                                        <option> Choose Level </option>
                                        @foreach($levels as $level)
                                        <option value="{{ $level->id }}" @if($level_id == $level->id) {{'selected'}} @endif> {{ $level->name }} </option>
                                        @endforeach
                                    </select>
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