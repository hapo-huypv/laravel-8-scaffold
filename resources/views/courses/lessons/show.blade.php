@extends('layouts.app')

@section('title')
    Detail Lesson
@endsection

@section('content')
    <div class="show-detail">
        <div class="container">
           @include('courses.partials.breadcrumb')
            <div class="d-flex">
                <div class="col-8 pl-0">
                    <div class="d-flex justify-content-center align-items-center  show-detail-img-background">
                        <img class="show-detail-img" src="{{ asset($lesson->image) }}" alt="image">
                    </div>
                    <div class="show-detail-content">
                        <ul class="nav nav-pills mb-3 show-detail-nav" id="pillsTabCourse" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="border-0 position-relative nav-link active" id="pills-descriptions-tab" data-bs-toggle="pill" data-bs-target="#pills-descriptions" type="button" role="tab" aria-controls="pills-lessons" aria-selected="true">Descriptions</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="border-0 position-relative nav-link" id="pills-teacher-tab" data-bs-toggle="pill" data-bs-target="#pills-teacher" type="button" role="tab" aria-controls="pills-teacher" aria-selected="false">Teacher</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="border-0 position-relative nav-link" id="pills-program-tab" data-bs-toggle="pill" data-bs-target="#pills-program" type="button" role="tab" aria-controls="pills-lessons" aria-selected="true">Program</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="border-0 position-relative nav-link" id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="false">Reviews</button>
                            </li>
                        </ul>
                        <div class="pr-3 pl-3"><hr class="m-0"></div>
                        <div class="tab-content" id="pillsTabCourseContent">
                            <div class="tab-pane fade show active show-detail-course" id="pills-descriptions" role="tabpanel" aria-labelledby="pills-descriptions-tab">
                                @include('courses.lessons.descriptions')
                            </div>
                            <div class="tab-pane fade" id="pills-teacher" role="tabpanel" aria-labelledby="pills-teacher-tab">
                                @include('courses.partials.teacher')
                            </div>
                            <div class="tab-pane fade" id="pills-program" role="tabpanel" aria-labelledby="pills-program-tab">
                            @if($lesson->join == config('lesson.joinedin'))    
                                @include('courses.lessons.programs')
                            @endif
                            </div>
                            <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                                @include('courses.partials.reviews')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="m-0 course-info">
                        <div class="d-flex align-items-center course-info-line">
                            <div class="col-6 d-flex align-items-center">
                                <div class="icon-course"></div>
                                <div class="course-info-text">Course</div>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <div class="">:</div>
                                <div class="course-info-number">{{ $course->title }}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center course-info-line">
                            <div class="col-6 d-flex align-items-center">
                                <div class="icon-learners"></div>
                                <div class="course-info-text">Learners</div>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <div class="">:</div>
                                <div class="course-info-number">{{ $lesson->number_user }}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center course-info-line">
                            <div class="col-6 d-flex align-items-center">
                                <div class="icon-times"></div>
                                <div class="course-info-text">Times</div>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <div class="">:</div>
                                <div class="course-info-number">{{ $lesson->learn_time }} hours</div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center course-info-line">
                            <div class="col-6 d-flex align-items-center">
                                <div class="icon-tags"></div>
                                <div class="course-info-text">Tags</div>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <div class="">:</div>
                                <div class="d-flex course-info-number">
                                <!-- {{ $toEnd = count($tags) }} -->
                                @foreach ($tags as $key => $tag)
                                    <a href="#" class="color-tags">{{ $tag->name }}</a>
                                    @if ($key+1 < $toEnd )
                                        <div class="mr-2 color-tags">,</div>
                                    @endif
                                @endforeach
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center course-info-line">
                            <div class="col-6 d-flex align-items-center">
                                <div class="icon-prices"></div>
                                <div class="course-info-text">Prices</div>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <div class="">:</div>
                                <div class="course-info-number">
                                    @if($lesson->price != 0)
                                        {{ $lesson->price }}
                                    @else
                                        Free
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        @if($lesson->join == config('lesson.joinedin'))
                            <div class="d-flex justify-content-center"><a href="{{ route('leave_lesson', [$lesson->id]) }}" id="btnLeaveLesson" class="m-0 btn btn-success btn-course-join" type="submit">Leave the lesson</a></div>
                        @else
                            <div class="d-flex justify-content-center"><a href="{{ route('join_lesson', [$lesson->id]) }}" id="btnJoinLesson" class="m-0 btn btn-success btn-course-join" type="submit">Learn the lesson</a></div>
                        @endif                      
                    </div>
                    <div class="course-othercourse">
                        <div class="d-flex align-items-center justify-content-center course-othercourse-title">Other Courses</div>
                        <div class="course-othercourse-list">
                            @foreach ($courses as $key => $randomCourse)
                                <div class="d-flex">
                                    <span class="mr-3">{{ $key+1 }}.</span> 
                                    <span class="">{{ $randomCourse->title }}</span>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button id="btnViewAllCourse" class="ml-0 btn btn-success btn-course-join" type="submit">View all our courses</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
