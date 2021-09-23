@extends('layouts.app')

@section('content')
<div class="container all-course">
    <div id="btnFilter" class="d-flex mb-3">
        <div class="course-filter">
        <!-- <i class="fas fa-sliders-h">Filter</i> -->
            <p class="course-filter-text">Filter</p>
        </div>
        <div class="position-relative">
            <input class="course-search" type="text" placeholder="Search...">
            <i class="fas fa-search"></i>
        </div>
        <a href="#" class="btn btn-primary btn-course-search">Tìm kiếm</a>
    </div>
    <div class="course-lookup d-none">
        <div class="course-lookup-text">Lọc theo</div>
        <div class="row">
            <a href="#" class="btn btn-primary mr-2 mb-3 course-lookup-btn-newest">Mới nhất</a>
            <a href="#" class="btn btn-primary mr-2 mb-3 course-lookup-btn-oldest">Cũ nhất</a>
            <div class="mr-2 course-lookup-dropdown">
                <div class="dropdown show">
                    <a class="btn btn-secondary course-lookup-dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Teacher
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Tăng dần</a>
                        <a class="dropdown-item" href="#">Giảm dần</a>
                    </div>
                </div>
            </div>
            <div class="mr-2 course-lookup-dropdown">
                <div class="dropdown show">
                    <a class="btn btn-secondary course-lookup-dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Số người học
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Tăng dần</a>
                        <a class="dropdown-item" href="#">Giảm dần</a>
                    </div>
                </div>
            </div>
            <div class="mr-2 course-lookup-dropdown">
                <div class="dropdown show">
                    <a class="btn btn-secondary course-lookup-dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Thời gian học
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Tăng dần</a>
                        <a class="dropdown-item" href="#">Giảm dần</a>
                    </div>
                </div>
            </div><div class="mr-2 course-lookup-dropdown">
                <div class="dropdown show">
                    <a class="btn btn-secondary course-lookup-dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Số bài học
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Tăng dần</a>
                        <a class="dropdown-item" href="#">Giảm dần</a>
                    </div>
                </div>
            </div><div class="mr-2 course-lookup-dropdown">
                <div class="dropdown show">
                    <a class="btn btn-secondary course-lookup-dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tags
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Tăng dần</a>
                        <a class="dropdown-item" href="#">Giảm dần</a>
                    </div>
                </div>
            </div><div class="mr-2 course-lookup-dropdown">
                <div class="dropdown show">
                    <a class="btn btn-secondary course-lookup-dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Review
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Tăng dần</a>
                        <a class="dropdown-item" href="#">Giảm dần</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="course-list">  
        <div class="row">
        @foreach($courses as $key => $course)
            <div class="col-sm-6">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="d-flex">
                            <img class="course-list-img" src="{{$course->logo_path}}" alt="ellipse_html">
                            <div class="">
                                <p class="course-list-title">{{$key}}</p>
                                <p class="course-list-intro">{{$course->intro}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-primary course-list-btn">More</a>
                        </div>
                        <div class="d-flex flex-row justify-content-center course-list-statistic">
                            <div class="col-4 p-0 d-flex flex-column align-items-start">
                                <div class="course-list-statistic-title">Learners</div>
                                <div class="course-list-statistic-number">1586</div>
                            </div>
                            <div class="col-4 p-0 d-flex flex-column align-items-center">
                                <div class="course-list-statistic-title">Lessons</div>
                                <div class="course-list-statistic-number">2,689</div>
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
    </div>
</div>
@endsection