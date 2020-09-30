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
                      <th>Photo</th>
                      <th>Price</th>
                      <th>Lecture</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Photo</th>
                      <th>Price</th>
                      <th>Lecture</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @php $i=1; @endphp
                    @foreach($courses as $course)
                    @php
                      $id = $course->id;
                      $title = $course->title;
                      $photo = $course->photo;
                      $price = $course->price;
                      $lecture = $course->lecture;
                    @endphp
                    <tr>
                      <td>{{$i++}}</td>
                      <td>
                        <img src="{{ asset($photo) }}" alt="" class="img-fluid" style="width: 70px;">   
                        {{ $title }}      
                      </td>
                      <td>{{ $price }}</td>
                      <td>{{ $lecture }}</td>
                      <td>
                        <a href="" class="btn btn-warning">
                          <i class="fas fa-tools"></i>
                        </a>
                        <form action="" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-outline-danger" type="submit"> 
                                        <i class="fas fa-times"></i>
                                    </button>

                                </form>
                      </td>
                    </tr> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
</x-backend>