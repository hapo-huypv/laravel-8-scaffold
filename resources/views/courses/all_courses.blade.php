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
                    <input hidden type="radio" name="status" value={{config('course.sortByNewest')}} id="newest" checked>
                    <label class="btn btn-primary mr-2 mb-3 course-lookup-btn-newest" for="newest">Mới Nhất</label>
                    <input hidden type="radio" name="status" value={{config('course.sortByOldest')}} id="oldest" {{ request('status') == config('course.sortByOldest') ? 'checked' : ''}}>
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
                            <option class="select-option" value="asc" {{ request('filterByLearners') == config('course.ascending') ? 'selected' : ''}}>Ascending</option>
                            <option class="select-option" value="desc" {{ request('filterByLearners') == config('course.descending') ? 'selected' : ''}}>Descending</option>
                        </select>
                    </div><div class="mr-2 course-lookup-dropdown">
                        <select id="filterByTime" class="course-lookup-dropdown-toggle" name="filterByTime">
                            <option class="select-option" value="">Thời gian học</option>
                            <option class="select-option" value="asc" {{ request('filterByTime') == config('course.ascending') ? 'selected' : ''}}>Ascending</option>
                            <option class="select-option" value="desc" {{ request('filterByTime') == config('course.descending') ? 'selected' : ''}}>Descending</option>
                        </select>
                    </div><div class="mr-2 course-lookup-dropdown">
                        <select id="filterByLessons" class="course-lookup-dropdown-toggle" name="filterByLessons">
                            <option class="select-option" value="">Số bài học</option>
                            <option class="select-option" value="asc" {{ request('filterByLessons') == config('course.ascending') ? 'selected' : ''}}>Ascending</option>
                            <option class="select-option" value="desc" {{ request('filterByLessons') == config('course.descending') ? 'selected' : ''}}>Descending</option>
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
                            <option class="select-option" value="asc" {{ request('filterByReviews') == config('course.ascending') ? 'selected' : ''}}>Ascending</option>
                            <option class="select-option" value="desc" {{ request('filterByReviews') == config('course.descending') ? 'selected' : ''}}>Descending</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        @include('courses.show_courses')
    </div>
</div>
@endsection
