<x-backend>
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Courses List</h6>
              <a href="{{ route('courses.create') }}" class="btn btn-outline-success btn-sm float-right"><i class="fas fa-plus"></i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Lecture</th>
                      <th>Level</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Lecture</th>
                      <th>Level</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @php $i=1; @endphp
                    @foreach($courses as $course)
                    @php
                      $id = $course->id;
                      $title = $course->title;
                      
                      $category = $course->category->name;
                      $photo = $course->photo;
                      $price = $course->price;
                      $lecture = $course->lecture;
                      $level = $course->level->name;

                    @endphp
                    <tr>
                      <td>{{$i++}}</td>
                      <td>
                        <img src="{{ asset($photo) }}" alt="" class="img-fluid" style="width: 70px;">   
                        {{ $title }}      
                      </td>
                      <td>{{ $category }}</td>
                      <td>{{ $price }}</td>
                      <td>{{ $lecture }}</td>
                      <td>{{ $level }}</td>
                      <td>
                        <a href="{{route('courses.edit',$id)}}" class="btn btn-warning">
                          <i class="fas fa-tools"></i>
                        </a>
                        <form action="{{route('courses.destroy',$id)}}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-outline-danger" type="submit"> 
                                        <i class="fas fa-times"></i>
                                    </button>

                                </form>
                      </td>
                    </tr> 
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
</x-backend>