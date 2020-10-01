<x-backend>
    <main class="app-content">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> 
             Create New Course

             <a href="{{ route('courses.index') }}" class="btn btn-outline-success btn-sm float-right"> <i class="fas fa-backward"></i> </a>
         </h6>

     </div>
     <div class="row mt-5">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group row">
                            <label for="title_id" class="col-sm-2 col-form-label"> Title </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title_id" name="title">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                            <div class="col-sm-10">
                                <input type="file" name="photo" id="photo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price_id" class="col-sm-2 col-form-label"> Price </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="price_id" name="price">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-sm-2 col-form-label"> Category </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="categoryid">
                                    <option> Choose Category </option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="lecture_id" class="col-sm-2 col-form-label"> Lecture </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="lecture_id" name="lecture">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="level_id" class="col-sm-2 col-form-label"> Level </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="levelid">
                                    <option> Choose Level </option>
                                    @foreach($levels as $level)
                                    <option value="{{ $level->id }}"> {{ $level->name }} </option>
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