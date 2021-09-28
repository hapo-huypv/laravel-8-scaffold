@extends('layouts.app')

@section('content')
<div class="all-course">
    <div class="container">
        <form method="get" action="{{route('courses')}}">
        @csrf <!-- {{ csrf_token() }} -->
            <div class="d-flex mb-3 nav-filter">
                <div id="btnFilter" class="course-filter">
                    <p class="course-filter-text">Filter</p>
                </div>
                <div>    
                    <div class="d-flex flex-row">
                        <div class="position-relative">
                            <input class="course-search" name="keyword" type="text" placeholder="Search...">
                            <label><i class="fas fa-search"></i></label>
                        </div>
                        <button id="btnSearch" class="btn btn-success btn-block btn-course-search" type="submit">Tìm Kiếm</button>
                    </div>
                </div>
            </div>
            <div class="course-lookup d-none">
                <div class="course-lookup-text">Lọc theo</div>
                <div class="row">
                    <input hidden type="radio" name="status" value="newest" id="newest" checked>
                    <label class="btn btn-primary mr-2 mb-3 course-lookup-btn-newest" for="newest">Mới Nhất</label>
                    <input hidden type="radio" name="status" value="oldest" id="oldest" {{ request('status') == 'oldest' ? 'checked' : ''}}>
                    <label class="btn btn-primary mr-2 mb-3 course-lookup-btn-newest" for="oldest">Cũ Nhất</label>
                    <div class="mr-2 course-lookup-dropdown">
                        <select id="filterByTeachers" class="teachers course-lookup-dropdown-toggle" name="filterByTeachers">
                            <option class="select-option" value="">Teacher</option>
                            @foreach($teachers as $teacher)
                                <option class="select-option" value="{{$teacher->id}}" {{ request('filterByTeachers') == $teacher->id ? 'selected' : ''}}>{{$teacher->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mr-2 course-lookup-dropdown">
                        <select id="filterBtLearners" class="course-lookup-dropdown-toggle" name="filterByLearners">
                            <option class="select-option" value="">Số người học</option>
                            <option class="select-option" value="asc" {{ request('filterByLearners') == 'asc' ? 'selected' : ''}}>Ascending</option>
                            <option class="select-option" value="desc" {{ request('filterByLearners') == 'desc' ? 'selected' : ''}}>Descending</option>
                        </select>
                    </div><div class="mr-2 course-lookup-dropdown">
                        <select id="filterByTime" class="course-lookup-dropdown-toggle" name="filterByTime">
                            <option class="select-option" value="">Thời gian học</option>
                            <option class="select-option" value="asc" {{ request('filterByTime') == 'asc' ? 'selected' : ''}}>Ascending</option>
                            <option class="select-option" value="desc" {{ request('filterByTime') == 'desc' ? 'selected' : ''}}>Descending</option>
                        </select>
                    </div><div class="mr-2 course-lookup-dropdown">
                        <select id="filterByLessons" class="course-lookup-dropdown-toggle" name="filterByLessons">
                            <option class="select-option" value="">Số bài học</option>
                            <option class="select-option" value="asc" {{ request('filterByLessons') == 'asc' ? 'selected' : ''}}>Ascending</option>
                            <option class="select-option" value="desc" {{ request('filterByLessons') == 'desc' ? 'selected' : ''}}>Descending</option>
                        </select>
                    </div><div class="mr-2 course-lookup-dropdown">
                        <select id=filterByTags class="course-lookup-dropdown-toggle" name="filterByTags">
                            <option class="select-option" value="">Tags</option>
                            @foreach ($tags as $tag)
                                <option class="select-option" value="{{$tag->id}}" {{ request('filterByTags') == $tag->id ? 'selected' : ''}}>{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div><div class="mr-2 course-lookup-dropdown">
                        <select id="filterByReviews" class="course-lookup-dropdown-toggle" name="filterByReviews">
                            <option class="select-option" value="">Review</option>
                            <option class="select-option" value="asc" {{ request('filterByReviews') == 'asc' ? 'selected' : ''}}>Ascending</option>
                            <option class="select-option" value="desc" {{ request('filterByReviews') == 'desc' ? 'selected' : ''}}>Descending</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <div class="course-list">  
            <div class="row">
            @foreach($courses as $course)
                <div class="col-sm-6">
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="d-flex">
                                <img class="course-list-img" src="{{$course->logo_path}}" alt="ellipse_html">
                                <div class="">
                                    <p class="course-list-title">{{$course->title}}</p>
                                    <p class="course-list-intro">{{$course->intro}}</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="#" class="btn btn-primary course-list-btn">More</a>
                            </div>
                            <div class="d-flex flex-row justify-content-center course-list-statistic">
                                <div class="col-4 p-0 d-flex flex-column align-items-start">
                                    <div class="course-list-statistic-title">Learners</div>
                                    <div class="course-list-statistic-number">{{$course->number_user}}</div>
                                </div>
                                <div class="col-4 p-0 d-flex flex-column align-items-center">
                                    <div class="course-list-statistic-title">Lessons</div>
                                    <div class="course-list-statistic-number">{{$course->number_lesson}}</div>
                                </div>
                                <div class="col-4 p-0 d-flex flex-column align-items-end">
                                    <div class="mr-3 course-list-statistic-title">Times</div>
                                    <div class="course-list-statistic-number">{{$course->learn_time}} (h)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="paginationWrap">
                {!! $courses->onEachSide(2)->links('components.pagination') !!}
            </div>
        </div>
    </div>
</div>
@endsection
