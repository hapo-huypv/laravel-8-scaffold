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
                    <a href="#" class="btn btn-primary firstbanner-btn" type="submit">Start Learning Now!</a>
                </div>
            </div>
            <div class="bg-linear"></div>
        </div>
        <!-- Main Course -->
        <div class="container justify-content-center course">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card course-border">
                        <div class="d-flex align-items-center justify-content-center card-img-top bg-color-htmlcssjs">
                            <img class="" src="./assets/img/rectangle_7.png" alt="HTML/CSS/js Tutorial">
                        </div>                          
                        <div class="card-body">
                            <h5 class="card-title">HTML/CSS/js Tutorial</h5>
                            <p class="card-text">I knew hardly anything about HTML, JS, and CSS before entering New Media. I had coded quite a bit, but never touched anything in regards to web development.</p>
                            <a href="#" class="btn btn-primary">Take This Course</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card course-border">
                        <div class="d-flex justify-content-center align-items-center card-img-top bg-color-laravel">
                            <img class="" src="./assets/img/laravel_1_logo_black_and_white_1.png" alt="LARAVEL Tutorial">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">LARAVEL Tutorial</h5>
                            <p class="card-text">I knew hardly anything about HTML, JS, and CSS before entering New Media. I had coded quite a bit, but never touched anything in regards to web development.</p>
                            <a href="#" class="btn btn-primary">Take This Course</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card course-border">
                        <div class="d-flex justify-content-center align-items-center card-img-top bg-color-php">
                            <img class="" src="./assets/img/rectangle_15.png" alt="PHP Tutorial">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">PHP Tutorial</h5>
                            <p class="card-text">I knew hardly anything about HTML, JS, and CSS before entering New Media. I had coded quite a bit, but never touched anything in regards to web development.</p>
                            <a href="#" class="btn btn-primary">Take This Course</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Other Courses -->
        <div class="row  m-0 title-underline justify-content-center">
            <span class="custom-underline-textcourse">Other courses</span>
        </div>
        <div class="container justify-content-center course">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card course-border">
                        <div class="d-flex justify-content-center align-items-center card-img-top bg-color-css">
                            <img class="" src="./assets/img/css_course.png" alt="CSS Tutorial">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">CSS Tutorial</h5>
                            <p class="card-text card-text-overflow">I knew hardly anything about HTML, JS, and CSS before entering New Media<br>. I had coded quite a bit, but never touched anything in regards to web development.</p>
                            <a href="#" class="btn btn-primary">Take This Course</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card course-border">
                        <div class="d-flex justify-content-center align-items-center card-img-top bg-color-rail">
                            <img class="" src="./assets/img/rails_course.png" alt="Rail Tutorial">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Ruby on rails Tutorial</h5>
                            <p class="card-text card-text-overflow">I knew hardly anything about HTML, JS, and CSS before entering New Media<br>. I had coded quite a bit, but never touched anything in regards to web development.</p>
                            <a href="#" class="btn btn-primary">Take This Course</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card course-border">
                        <div class="d-flex justify-content-center align-items-center card-img-top bg-color-java">
                            <img class="" src="./assets/img/java_1.png" alt="Java Tutorial">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Java Tutorial</h5>
                            <p class="card-text card-text-overflow">I knew hardly anything about HTML, JS, and CSS before entering New Media<br>. I had coded quite a bit, but never touched anything in regards to web development.</p>
                            <a href="#" class="btn btn-primary">Take This Course</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="row m-0 extend-course justify-content-center">
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
                    <div class="carousel-item active">
                        <div class="container mt-5">
                            <div class="d-flex row ml-auto mr-auto">
                                <div class="mt-2 m-0 p-0 feedback-border-text ">
                                    <p class="feedback-text">“A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.”</p>
                                </div>
                                <div class="d-flex flex-row user-info">
                                    <img class="rounded-circle" src="./assets/img/avatar.png">
                                    <div class="d-flex flex-column justify-content-start ml-2">
                                        <span class="d-block font-weight-bold user-name">Hoang Anh Nguyen</span>
                                        <span class="user-role text-black-50">PHP</span>
                                        <div class="user-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container mt-5">
                            <div class="d-flex row ml-auto mr-auto">
                                <div class="mt-2 m-0 p-0 feedback-border-text ">
                                    <p class="feedback-text">“A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.”</p>
                                </div>
                                <div class="d-flex flex-row user-info">
                                    <img class="rounded-circle" src="./assets/img/avatar.png">
                                    <div class="d-flex flex-column justify-content-start ml-2">
                                        <span class="d-block font-weight-bold user-name">Bill Gate</span>
                                        <span class="user-role text-black-50">PHP</span>
                                        <div class="user-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container mt-5">
                            <div class="d-flex row ml-auto mr-auto">
                                <div class="mt-2 m-0 p-0 feedback-border-text ">
                                    <p class="feedback-text">“A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.”</p>
                                </div>
                                <div class="d-flex flex-row user-info">
                                    <img class="rounded-circle" src="./assets/img/avatar.png">
                                    <div class="d-flex flex-column justify-content-start ml-2">
                                        <span class="d-block font-weight-bold user-name">Huy Pham Van</span>
                                        <span class="user-role text-black-50">PHP</span>
                                        <div class="user-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Become a memmber -->
        <div class="d-flex flex-column justify-content-center align-items-center banner-encourage">
            <div class="banner-encourage-text">Become a member of our growing community!</div>
            <a href="#" class="btn btn-primary">Start Learning Now!</a>
        </div>
        <!-- Statistic -->
        <div class="container d-flex flex-column justify-content-center statistic">
            <div class="row m-0 title-underline justify-content-center">
                <span class="custom-underline-textcourse">Statistic</span>
            </div>
            <div class="d-flex flex-row justify-content-center statistic-parameter">
                <div class="col-4 d-flex flex-column align-items-center">
                    <div class="statistic-parameter-title">Courses</div>
                    <div class="statistic-parameter-number">1586</div>
                </div>
                <div class="col-4 d-flex flex-column align-items-center">
                    <div class="statistic-parameter-title">Lessons</div>
                    <div class="statistic-parameter-number">2,689</div>
                </div>
                <div class="col-4 d-flex flex-column align-items-center">
                    <div class="statistic-parameter-title">Learns</div>
                    <div class="statistic-parameter-number">16,882</div>
                </div>
            </div>
        </div>
    </div>
@endsection
