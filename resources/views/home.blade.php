@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Content -->
    <div class="container-fluid position-relative body p-0">
        <!--Banner-->
        <div class="hapo-learn-banner">
            <div class="banner-background">
                <div class="d-flex flex-column justify-content-center align-items-start custom-firstbanner">
                    <div class="slogan">Learn Anytime, Anywhere</div>
                    <div class="main-title">at HapoLearn 
                        <img src="./assets/img/hapo_logo.png" alt="hapo_logo"> !
                    </div>
                    <div class="sub-title">Interactive lessons, "on-the-go" <br>practice, peer support</div>
                    <a href="{{ route('courses.index') }}" class="btn btn-primary firstbanner-btn" type="submit">Start Learning Now!</a>
                </div>
            </div>
            <div class="bg-linear"></div>
        </div>
        <!-- Main Course -->
        <div class="container justify-content-center course">
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-sm-4">
                        <div class="card course-border">
                            <div class="d-flex align-items-center justify-content-center card-img-top bg-color-htmlcssjs">
                                <img class="" src="{{ asset($course->image) }}" alt="HTML/CSS/js Tutorial">
                            </div>                          
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text">{{ $course->intro }}</p>
                                <a href="{{ route('courses.show', [$course->id]) }}" class="btn btn-primary">Take This Course</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Other Courses -->
        <div class="row  m-0 title-underline justify-content-center">
            <span class="custom-underline-textcourse">Other courses</span>
        </div>
        <div class="container justify-content-center course">
            <div class="row">
                @foreach ($otherCourses as $course)
                    <div class="col-sm-4">
                        <div class="card course-border">
                            <div class="d-flex align-items-center justify-content-center card-img-top bg-color-htmlcssjs">
                                <img class="" src="{{ asset($course->image) }}" alt="HTML/CSS/js Tutorial">
                            </div>                          
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text">{{ $course->intro }}</p>
                                <a href="{{ route('courses.show', [$course->id]) }}" class="btn btn-primary">Take This Course</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <a href="{{ route('courses.index') }}" class="row m-0 extend-course justify-content-center">
            <span>View All Our Courses <img src="./assets/img/right_arrow.png" alt="arrow"></span>
        </a>
        <!-- Why HapoLearn? -->
        <div class="banner-whyhapolearn">
            <div class="banner-whyhapolearn-background d-flex">
                <span class="img-laptop"></span>
                <div class="col-6 banner-whyhapolearn-answer">
                    <p class="title-why-hapolearn">Why HapoLearn?</p>
                    <div class="">
                        <div class="reply-why-hapolearn" alt="check-circle">
                            <img src="./assets/img/check-circle.svg">
                            Interactive lessons, "on-the-go" practice, peer support.</div>
                        <div class="reply-why-hapolearn" alt="check-circle">
                            <img src="./assets/img/check-circle.svg">
                            Interactive lessons, "on-the-go" practice, peer support.</div>
                        <div class="reply-why-hapolearn" alt="check-circle">
                            <img src="./assets/img/check-circle.svg">
                            Interactive lessons, "on-the-go" practice, peer support.</div>
                        <div class="reply-why-hapolearn" alt="check-circle">
                            <img src="./assets/img/check-circle.svg">
                            Interactive lessons, "on-the-go" practice, peer support.</div>
                        <div class="reply-why-hapolearn" alt="check-circle">
                            <img src="./assets/img/check-circle.svg">
                            Interactive lessons, "on-the-go" practice, peer support.</div>
                    </div>
                </div> 
                <div class="col-6 img-devices"></div>                
            </div>
        </div>
        <!-- Feedback -->
        <div class="container feedback">
            <div class="row m-0 title-underline justify-content-center">
                <span class="custom-underline-textcourse">Feedback</span>
            </div>
            <div class="feedback-intro">What other students turned professionals have to say about us after learning with us and reaching their goals</div>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class=" mt-lg-4 mt-md-2 carousel-inner feedback-slide mt-0">
                    @foreach ($reviews as $review)
                        <div class="carousel-item">
                            <div class="container mt-5">
                                <div class="d-flex row ml-auto mr-auto">
                                    <div class="mt-2 m-0 p-0 feedback-border-text ">
                                        <p class="feedback-text">{{ $review->content }}</p>
                                    </div>
                                    <div class="d-flex flex-row user-info">
                                        <img class="rounded-circle" src="{{ $review->avatar }}" alt="avatar">
                                        <div class="d-flex flex-column justify-content-start ml-2">
                                            <span class="d-block font-weight-bold user-name">{{ $review->user_name }}</span>
                                            <span class="user-role text-black-50">PHP</span>
                                            <div class="user-rating">
                                                @for ($i = 0; $i < $review->rate; $i ++)
                                                <i class="fas fa-star"></i>
                                                @endfor
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Become a memmber -->
        <div class="d-flex flex-column justify-content-center align-items-center banner-encourage">
            <div class="banner-encourage-text">Become a member of our growing community!</div>
            <a href="{{ route('courses.index') }}" class="btn btn-primary">Start Learning Now!</a>
        </div>
        <!-- Statistic -->
        <div class="container d-flex flex-column justify-content-center statistic">
            <div class="row m-0 title-underline justify-content-center">
                <span class="custom-underline-textcourse">Statistic</span>
            </div>
            <div class="d-flex flex-row justify-content-center statistic-parameter">
                <div class="col-4 d-flex flex-column align-items-center">
                    <div class="statistic-parameter-title">Courses</div>
                    <div class="statistic-parameter-number">{{ $countCourses }}</div>
                </div>
                <div class="col-4 d-flex flex-column align-items-center">
                    <div class="statistic-parameter-title">Lessons</div>
                    <div class="statistic-parameter-number">{{ $countLessons }}</div>
                </div>
                <div class="col-4 d-flex flex-column align-items-center">
                    <div class="statistic-parameter-title">Learns</div>
                    <div class="statistic-parameter-number">{{ $numberLeaners }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
