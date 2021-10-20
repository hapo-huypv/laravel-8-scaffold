@extends('layouts.app')

@section('title')
    All Courses
@endsection

@section('content')
<div class="all-course">
    <div class="container">
        <form method="get" action="{{ route('courses') }}">
            <div class="d-flex mb-3 nav-filter">
                <div id="btnFilter" class="course-filter">
                    <p class="course-filter-text">Filter</p>
                </div>
                <div>    
                    <div class="d-flex flex-row">
                        <div class="position-relative">
                            <input class="course-search ml-1" name="keyword" type="text" placeholder="Search...">
                            <label><i class="fas fa-search"></i></label>
                        </div>
                        <button id="btnSearch" class="btn btn-success btn-block btn-course-search" type="submit">Search</button>
                    </div>
                </div>
            </div>
            <div class="course-lookup d-none">
                <div class="course-lookup-text">Filter By</div>
                <div class="row">
                    <input hidden type="radio" name="status" value={{ config('course.newest') }} id="newest" checked>
                    <label class="btn btn-primary mr-2 mb-3 newest {{ (request('status') == config('course.newest') || request('status') == null) ? 'course-lookup-btn-status-active' : 'course-lookup-btn-status' }}" for="newest">Newest</label>
                    <input hidden type="radio" name="status" value={{ config('course.oldest') }} id="oldest" {{ request('status') == config('course.oldest') ? 'checked' : '' }}>
                    <label class="btn btn-primary mr-2 mb-3 oldest {{ request('status') == config('course.oldest') ? 'course-lookup-btn-status-active' : 'course-lookup-btn-status' }}" for="oldest">Oldest</label>
                    <div class="mr-2 course-lookup-dropdown">
                        <select id="filterByTeachers" class="add-select2 teachers course-lookup-dropdown-toggle" name="teachers">
                            <option class="select-option" value="">Teacher</option>
                            @foreach($teachers as $teacher)
                                <option class="select-option" value="{{ $teacher->id }}" {{ request('teachers') == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mr-2 course-lookup-dropdown">
                        <select id="filterByLearners" class="course-lookup-dropdown-toggle" name="number_learners">
                            <option class="select-option" value="">Number of Learners</option>
                            <option class="select-option" value="asc" {{ request('number_learners') == config('course.ascending') ? 'selected' : '' }}>Ascending</option>
                            <option class="select-option" value="desc" {{ request('number_learners') == config('course.descending') ? 'selected' : '' }}>Descending</option>
                        </select>
                    </div><div class="mr-2 course-lookup-dropdown">
                        <select id="filterByTime" class="course-lookup-dropdown-toggle" name="study_time">
                            <option class="select-option" value="">Study Time</option>
                            <option class="select-option" value="asc" {{ request('study_time') == config('course.ascending') ? 'selected' : '' }}>Ascending</option>
                            <option class="select-option" value="desc" {{ request('study_time') == config('course.descending') ? 'selected' : '' }}>Descending</option>
                        </select>
                    </div><div class="mr-2 course-lookup-dropdown">
                        <select id="filterByLessons" class="course-lookup-dropdown-toggle" name="number_lessons">
                            <option class="select-option" value="">Number of Lessons</option>
                            <option class="select-option" value="asc" {{ request('number_lessons') == config('course.ascending') ? 'selected' : '' }}>Ascending</option>
                            <option class="select-option" value="desc" {{ request('number_lessons') == config('course.descending') ? 'selected' : '' }}>Descending</option>
                        </select>
                    </div><div class="mr-2 course-lookup-dropdown">
                        <select id=filterByTags class="add-select2 course-lookup-dropdown-toggle" name="tags">
                            <option class="select-option" value="">Tags</option>
                            @foreach ($tags as $tag)
                                <option class="select-option" value="{{ $tag->id }}" {{ request('tags') == $tag->id ? 'selected' : '' }}>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div><div class="mr-2 course-lookup-dropdown">
                        <select id="filterByReviews" class="course-lookup-dropdown-toggle" name="reviews">
                            <option class="select-option" value="">Reviews</option>
                            <option class="select-option" value="asc" {{ request('reviews') == config('course.ascending') ? 'selected' : '' }}>Ascending</option>
                            <option class="select-option" value="desc" {{ request('reviews') == config('course.descending') ? 'selected' : '' }}>Descending</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <div class="course-list">  
            <div class="row">
                @foreach($courses as $course)
                    @include('courses.partials.card_course')
                @endforeach
            </div>
        </div>
        <div class="paginationWrap">
            {!! $courses->appends($_GET)->onEachSide(2)->links('components.pagination') !!}
        </div>
    </div>
</div>
@endsection
