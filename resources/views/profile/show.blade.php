@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('content')
    <div class="profile">
        <div class="container">
            <div class="d-flex">
                <div class="col-3">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img class="rounded-circle mt-5  user-avatar" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQF2psCzfbB611rnUhxgMi-lc2oB78ykqDGYb4v83xQ1pAbhPiB&usqp=CAU">
                        <span class="font-weight-bold">Amelly</span>
                        <span class="text-black-50">amelly12@bbb.com</span>
                        <span> </span>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="icon-birthday"></div>
                        <div class="user-info">10/10/2998</div>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="icon-phone"></div>
                        <div class="user-info">0123456789</div>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="icon-address"></div>
                        <div class="user-info">Cầu Giấy, Hà Nội</div>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="user-aboutme">Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ippsumipsum, them venenatis</div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="d-flex align-items-center profile-title">           
                        Main courses      
                    </div>
                    <hr class="profile-underline m-0">
                    <div class="mt-4 d-flex">
                        <div class="d-flex flex-column align-items-center mr-4">
                            <img class="img-course" src="{{ asset('assets/img/ellipse_html.png') }}" alt="course">
                            <div class="course-text">HTML</div>
                        </div>
                        <div class="user-addcourse">
                            <div class="img-addcourse d-flex justify-content-center align-items-center">
                                <div class="icon-add"></div>
                            </div>
                            <div class="addcourse-text">Add course</div> 
                        </div>
                    </div>
                    <div class="d-flex align-items-center profile-title mt-5">           
                        Edit profile      
                    </div>
                    <hr class="profile-underline m-0">
                    <form method="get" action="{{ route('edit_profile', [$user->id]) }}">
                        <div class="edit-user d-flex">
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label class="mt-4">Name:</label>
                                    <input name="name" type="text" placeholder="Your name">
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="mt-4">Date of birthday:</label>
                                    <input name="birthday" type="date" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="mt-4">Address:</label>
                                    <input name="address" type="text" placeholder="Your address...">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label class="mt-4">Email:</label>
                                    <input name="email" type="text" placeholder="Your email...">
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="mt-4">Phone:</label>
                                    <input name="phone" type="text" placeholder="Your phone...">
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="mt-4">About me:</label>
                                    <input name="about_me" type="text" placeholder="About you...">
                                </div>
                            </div>
                        </div>
                        <button id="btnSave" class="btn btn-success btn-block btn-course-search" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection