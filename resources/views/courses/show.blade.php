@extends('layouts.app')

@section('title')
    Detail Course
@endsection

@section('content')
    <div class="detail-course">
        <div class="container">
           @include('courses.partials.breadcrumb')
            <div class="d-flex">
                <div class="col-8 pl-0">
                    <div class="d-flex justify-content-center align-items-center  detail-course-img-background">
                        <img class="detail-course-img" src="{{ asset($course->image) }}" alt="image">
                    </div>
                    <div class="detail-course-content">
                        <ul class="nav nav-pills mb-3 detail-course-nav" id="pillsTabCourse" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="border-0 position-relative nav-link active" id="pills-lessons-tab" data-bs-toggle="pill" data-bs-target="#pills-lessons" type="button" role="tab" aria-controls="pills-lessons" aria-selected="true">Lessons</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="border-0 position-relative nav-link" id="pills-teacher-tab" data-bs-toggle="pill" data-bs-target="#pills-teacher" type="button" role="tab" aria-controls="pills-teacher" aria-selected="false">Teacher</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="border-0 position-relative nav-link" id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="false">Reviews</button>
                            </li>
                        </ul>
                        <div class="pr-3 pl-3"><hr class="m-0"></div>
                        <div class="tab-content" id="pillsTabCourseContent">
                            <div class="tab-pane fade show active show-detail-course" id="pills-lessons" role="tabpanel" aria-labelledby="pills-lessons-tab">
                                <div class="d-flex">
                                    <div>    
                                        <form method="get" action="{{  route('detail_course', [$course->id]) }}">
                                            <div class="d-flex flex-row">
                                                <div class="position-relative">
                                                    <input class="course-search" name="keyword" type="text" placeholder="Search...">
                                                    <label><i class="fas fa-search"></i></label>
                                                </div>
                                                <input type="hidden" name="course_id" value="{{ $course->id }}" />
                                                <button id="btnSearch" class="btn btn-success btn-block btn-course-search" type="submit">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="">
                                        @if ($status == config('course.joinin'))
                                            <input type="hidden" name="joined" value={{ config('course.joinedin') }}/>
                                            <a href="{{ route('join_course', [$course->id]) }}" id="btnJoinCourse" class="btn btn-success btn-course-join" type="submit">Join in the course</a>
                                        @elseif ($status == config('course.joinedin'))
                                            <div id="btnJoinedCourse" class="btn-course-join w-50">Joined</div>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    @foreach($lessons as $key => $lesson)
                                    <hr>
                                    <div class="d-flex">
                                        @if (empty(request('page')))
                                            <span class="mr-3">{{ $key + 1 }}.</span> 
                                        @else
                                            <span class="mr-3">{{ $key + 1 + (request('page')-1)*config('lesson.number_paginations') }}.</span> 
                                        @endif
                                            <span class="col-10">{{ $lesson->title }}</span>
                                        @if ($status == config('course.joinedin'))
                                            <button id="btnJoinLesson" class="col-2 flex-end btn btn-success btn-course-join-lesson" type="submit">Learn</button>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                <hr>
                                <div class="paginationWrap">
                                    {!! $lessons->appends($_GET)->onEachSide(2)->links('components.pagination') !!}
                                </div>
                                <hr>
                                @if ($status == config('course.joinedin'))
                                    <div class="d-flex align-items-center justify-content-end">
                                        <a href="{{ route('leave_course', [$course->id]) }}" id="btnLeaveCourse" class="ml-0 btn btn-success btn-course-join w-25" type="submit">Leave</a>
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="pills-teacher" role="tabpanel" aria-labelledby="pills-teacher-tab">
                                @include('courses.partials.teacher')
                            </div>
                            <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                                @include('courses.partials.reviews')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="course-description">
                        <span class="course-description-title">Descriptions course</span>
                        <hr class="course-description-hr">
                        <span class="course-description-text">{{ $course->description }}</span>
                    </div>
                    <div class="course-info">
                        <div class="d-flex align-items-center course-info-line">
                            <div class="col-6 d-flex align-items-center">
                                <div class="icon-learners"></div>
                                <div class="course-info-text">Learners</div>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <div class="">:</div>
                                <div class="course-info-number">{{ $course->number_user }}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center course-info-line">
                            <div class="col-6 d-flex align-items-center">
                                <div class="icon-lessons"></div>
                                <div class="course-info-text">Lessons</div>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <div class="">:</div>
                                <div class="course-info-number">{{ $course->number_lesson }} lessons</div>
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
                                <div class="course-info-number">{{ $course->total_time }} hours</div>
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
                                <div class="course-info-number">{{ $course->price }}</div>
                            </div>
                        </div>
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
