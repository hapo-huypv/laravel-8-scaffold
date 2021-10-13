@extends('layouts.app')

@section('title')
    Profile
@endsection

@include('partials.message')

@section('content')
    <div class="profile">
        <div class="container">
            <div class="d-flex">
                <div class="col-3">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img class="rounded-circle mt-5  user-avatar" src="{{ asset($user->avatar) }}" alt="avatar">
                        <i id="imgCamera" class="fas fa-camera"></i>
                        <form id="formUploadImg" class="form-horizontal d-none" action="{{ route('uploadimg_profile', [$user->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input class=" d-flex justify-content-center" type="file" name="image">
                            <input type="submit" value="Submit">
                        </form>
                        <span class="font-weight-bold">{{ $user->name }}</span>
                        <span class="text-black-50">{{ $user->email }}</span>
                        <span> </span>
                    </div>
                    <hr>
                    <div class="p-2">
                        <div class="d-flex align-items-center">
                            <div class="icon-birthday mr-2"></div>
                            <div class="user-info">{{ $user->birthday }}</div>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center">
                            <div class="icon-phone mr-2"></div>
                            <div class="user-info">0{{ $user->phone }}</div>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center">
                            <div class="icon-address mr-2"></div>
                            <div class="user-info">{{ $user->address }}</div>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center">
                            <div class="user-aboutme">{{ $user->intro }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="d-flex align-items-center profile-title">           
                        Main courses      
                    </div>
                    <hr class="profile-underline m-0">
                    <div class="mt-4 d-flex justify-content-center">
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
                                    <label class="mt-4 user-label">Name:</label>
                                    <input class="p-2 profile-input " name="name" type="text" value="{{ $user->name != null ? $user->name : '' }}" placeholder="Your name">
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="mt-4 user-label">Date of birthday:</label>
                                    <input class="p-2 profile-input " name="birthday" type="date" value="{{ $user->birthday != null ? $user->birthday : '' }}" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="mt-4 user-label">Address:</label>
                                    <input class="p-2 profile-input " name="address" type="text" value="{{ $user->address != null ? $user->address : '' }}" placeholder="Your address...">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">zend_logo_guid
                                    <label class="mt-4 user-label">Email:</label>
                                    <input class="p-2 profile-input " name="email" type="text" value="{{ $user->email != null ? $user->email : '' }}" placeholder="Your email...">
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="mt-4 user-label">Phone:</label>
                                    <input class="p-2 profile-input " name="phone" type="text" value="{{ $user->phone != null ? $user->phone : '' }}" placeholder="Your phone...">
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="mt-4 user-label">About me:</label>
                                    <input class="p-2 profile-input " name="about_me" type="text" value="{{ $user->intro != null ? $user->intro : '' }}" placeholder="About you...">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end m-3">
                            <button id="btnSave" class="btn btn-success btn-block btn-course-search" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection