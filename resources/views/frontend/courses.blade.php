<x-frontend>
    <!--? Hero Start -->
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 text-center">
                            <h2>Availble Courses Are Here</h2>
                        </div>
                    </div>
                </div>
            </div>
        
    <!-- Hero End -->
    <!-- all-course Start -->
    <section class="all-course mt-5">
        <div class="container">
            <div class="row">
                <div class="all-course-wrapper">
                    <!-- Tab content -->
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">
                                <!--  one -->
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">       
                                    <div class="row">
                                        @foreach($courses as $course)
                                        @php
                                        $id = $course->id;
                                        $title = $course->title;
                                        $photo = $course->photo;
                                        @endphp
                                        <div class="col-xl-4 col-lg-4 col-md-6">
                                            <!-- Single course -->
                                            <div class="single-course mb-70">
                                                <div class="course-img">
                                                    <img src="{{ $photo }}" alt="">
                                                </div>
                                                <div class="course-caption">
                                                    <div class="course-cap-top">
                                                        <h4><a href="{{route('detailcourse',$id)}}">{{ $title }}</a></h4>
                                                    </div>
                                                    <div class="course-cap-mid d-flex justify-content-between">
                                                        <div class="course-ratting">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <ul><li>52 Review</li></ul>
                                                    </div>
                                                    <div class="course-cap-bottom d-flex justify-content-between">
                                                        <ul>
                                                            <li><i class="ti-user"></i> 562</li>
                                                            <li><i class="ti-heart"></i> 562</li>
                                                        </ul>
                                                        <span>Free</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- all-course End -->
</x-frontend>
