<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HapoLearn</title>
    <link rel="shortcut icon" href="./assets/img/hapo_logo.png" type="image/png" />
    <!-- Import Boostrap css, js, font awesome here -->     
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>  
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet"/>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <link href="css/style.css" rel="stylesheet" />
</head>
<body>
    <!--Header-->
    <header id="header" class="header">
        <nav class="navbar navbar-expand-md navbar-light sticky-top justify-content-center">
            <div class="container-fluid custom-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-branch" href="#">
                    <img src="./assets/img/hapolearn.png" alt="HapoLearn">        
                </a>
                <div class="collapse navbar-collapse align-items-center  justify-content-end" id="navbarResponsive">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item"><a class="nav-link header-nav nav-link-active" href="#">HOME</a></li>
                        <li class="nav-item"><a class="nav-link header-nav" href="#">ALL COURSES</a></li>
                        <li class="nav-item"><a class="nav-link header-nav" href="#" data-toggle="modal" data-target="#loginRegisterModal">LOGIN/REGISTER</a></li>
                        <li class="nav-item"><a class="nav-link header-nav" href="#">PROFILE</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--Body-->
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
        <!-- Modal -->
        <div class="modal fade p-0" id="loginRegisterModal" tabindex="-1" role="dialog" aria-labelledby="loginRegisterModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header p-0">
                        <ul class="nav nav-pills w-100" id="pills-tab" role="tablist">
                            <li class="nav-item col-6 p-0" role="presentation">
                                <a class="nav-link active btn-logreg" id="pills-login-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item col-6 p-0" role="presentation">
                                <a class="nav-link btn-logreg" id="pills-register-tab" data-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="tab-content" id="pills-tabContent">
                            <form class="form-signin tab-pane fade show active pt-0 form-login-and-register" id="pills-home" role="tabpanel" aria-labelledby="pills-login-tab">
                                <label class="login-text">Username:</label>
                                <input type="email" id="inputEmail" class="form-control" required="" autofocus="">
                                <label class="login-text">Password:</label>
                                <input type="password" id="inputPassword" class="form-control" required="">
                                <div class="d-flex mt-2">
                                    <div class="custom-control custom-checkbox col-6">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label form-control-label" for="customControlInline">Remember me</label>
                                    </div>
                                    <a href="#" id="forgot_pswd" class="col-6 pr-0 form-text-forgotpass">Forgot password</a>
                                </div>
                                <div class=" d-flex justify-content-center">
                                    <button class="btn btn-success btn-block custom-btn-login" type="submit">LOGIN</button>
                                </div>
                                <div class="d-flex justify-content-center p-0 title-social-login">Login with</div>
                                <div class="d-flex flex-column social-login">
                                    <button class="btn google-btn social-btn" type="button"><span class="d-flex justify-content-center align-item-center"><i class="fab fa-google-plus-g mr-2"></i>  Google</span> </button>
                                    <button class="btn facebook-btn social-btn" type="button"><span class="d-flex justify-content-center align-item-center"><i class="fab fa-facebook-f mr-2"></i>  Facebook</span> </button>
                                </div>
                            </form>                  
                            <form class="form-signup tab-pane fade pt-0 form-login-and-register" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
                                <label class="login-text">Username:</label>
                                <input type="email" id="inputEmail" class="form-control" required="" autofocus="">
                                <label class="login-text">Email:</label>
                                <input type="email" id="inputEmail" class="form-control" required="" autofocus="">
                                <label class="login-text">Password:</label>
                                <input type="email" id="inputEmail" class="form-control" required="" autofocus="">
                                <label class="login-text">Repeat Password:</label>
                                <input type="email" id="inputEmail" class="form-control" required="" autofocus="">
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-success btn-block custom-btn-login" type="submit">REGISTER</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="container d-flex justify-content-center footer-container">
            <div class="col-4 mb-4 d-flex flex-column footer-logo">
                <a class="" href="#">
                    <img src="./assets/img/hapolearn_white_1.png" alt="HapoLearn">        
                </a>
                <p class="footer-slogan">
                    Interactive lessons, "on-the-go" practice, peer support.
                </p>
            </div>
            <div class="d-flex flex-row col-4 mb-auto mt-auto footer-nav">
                <div class="d-flex flex-column col-6 footer-nav-left">
                    <a href="#" class="footer-text">Home</a>
                    <a href="#" class="footer-text">Features</a>
                    <a href="#" class="footer-text">Courses</a>
                    <a href="#" class="footer-text">Blog</a>
                </div>
                <div class="d-flex flex-column col-6 footer-nav-right">
                    <a href="#" class="footer-text">Contact</a>
                    <a href="#" class="footer-text">Terms of Use</a>
                    <a href="#" class="footer-text">FAQ</a>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center justify-content-center col-4 footer-contact">
                <div class="d-inline-flex footer-iconandlink">
                    <a href="https://www.facebook.com/haposoft.story"  class="footer-icon">
                        <img class="" src="./assets/img/fb_icon.png" alt="icon-fb">    
                    </a>
                    <div id= "imgContact" class="txt-hidden">facebook.com/tuyen.dung.haposoft</div>
                </div> 
                <div class="d-inline-flex footer-iconandlink">
                    <a href class="footer-icon">
                        <img class="" src="./assets/img/phone_icon.png" alt="icon-phone">
                    </a>
                    <div id= "imgContact" class="txt-hidden">+84-85-645-9898</div>
                </div> 
                <div class="d-inline-flex footer-iconandlink">
                    <a href="" class="footer-icon">
                        <img class="" src="./assets/img/email_icon.png" alt="icon-email">
                    </a>
                    <div id= "imgContact" class="txt-hidden">info@haposoft.com</div>
                </div> 
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center m-auto footer-endground">
            © 2020 HapoLearn, Inc. All rights reserved.
        </div>
    </footer>
    <!-- messenger -->
    <div class="messenger">
        <div id="messenger" class="chatbox chatbox-disappear">
            <div class="close-button"><i class="fas fa-times"></i></div>
            <div class="title-chatbox">HapoLearn</div>
            <div class="message-from-hapolearn">
                <div class="logo-hapolearn-messenger"></div>
                <div class="hapo-text-message">HapoLearn xin chào bạn. <br>
                    Bạn có cần chúng tôi hỗ trợ gì không? </div>
            </div>
            <a href="#" class="d-flex justify-content-center mr-auto ml-auto button-messenger">
                <i class="fab fa-facebook-messenger custom-icon-facebook-messenger mr-2"></i> Đăng nhập vào Messenger
            </a>
            <div class="text-messenger-end">Chat với HapoLearn trong Messenger</div>
        </div>
        <img class="logo-messenger" alt="logo-messenger" src="./assets/img/messenger.png"></img>
    </div>
<section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/index.js"></script>
</section>
</body>
</html>
