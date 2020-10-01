<x-backend>
  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Lessons List</h6>
              <a href="{{ route('lessons.create') }}" class="btn btn-outline-success btn-sm float-right"><i class="fas fa-plus"></i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Course</th>
                      <th>Video</th>
                      <th>Duration</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Course</th>
                      <th>Video</th>
                      <th>Duration</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @php $i=1; @endphp
                    @foreach($lessons as $lesson)
                    @php
                      $id = $lesson->id;
                      $title = $lesson->title;
                      
                      $course = $lesson->course->title;
                      $video = $lesson->video;
                      $duration = $lesson->duration;

                    @endphp
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $title }}</td>
                      <td>{{ $course }}</td>
                      <td>{{ $video }}</td>
                      <td>{{ $duration }}</td>
                      <td>
                        <a href="{{route('lessons.edit',$id)}}" class="btn btn-warning">
                          <i class="fas fa-tools"></i>
                        </a>
                        <form action="{{route('lessons.destroy',$id)}}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">

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