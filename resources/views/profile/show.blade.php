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
                        <img class="rounded-circle mt-5  user-avatar" src="{{ asset($user->avatar) }}" alt="avatar">
                        <i id="imgCamera" class="fas fa-camera"></i>
                        <form id="formUploadImg" class="form-horizontal d-none" action="{{ route('profile.update', ['profile' => $user->id]) }}" method="POST" enctype="multipart/form-data">
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
                            <div class="user-info">{{ $user->date_of_birth }}</div>
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
                        @foreach($user->courses as $course)
                        <div class="d-flex flex-column align-items-center mr-2">
                            <img class="img-course" src="{{ asset($course->image) }}" alt="course">
                            <div class="course-text">{{ $course->title }}</div>
                        </div>
                        @endforeach
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

                    <form method="POST" action="{{ route('profile.update', ['profile' => Auth::user()]) }}">
                        @csrf
                        @method('PATCH')
                        <div class="edit-user d-flex">
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label class="mt-4 user-label">Name:</label>
                                    <input class="p-2 profile-input " name="profile_name" type="text" required value="{{ $user->name != null ? $user->name : '' }}" placeholder="Your name">
                                </div>
                                @error('profile_name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="d-flex flex-column">
                                    <label class="mt-4 user-label">Date of birthday:</label>
                                    <input class="p-2 profile-input " name="birthday" type="date" required value="{{ $user->birthday != null ? $user->birthday : '' }}" placeholder="dd/mm/yyyy">
                                </div>
                                @error('birthday')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="d-flex flex-column">
                                    <label class="mt-4 user-label">Address:</label>
                                    <input class="p-2 profile-input " name="address" type="text" required value="{{ $user->address != null ? $user->address : '' }}" placeholder="Your address...">
                                </div>
                                @error('address')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column"> 
                                    <label class="mt-4 user-label">Email:</label>
                                    <input disabled class="p-2 profile-input" name="edit_email" type="text" value="{{ $user->email != null ? $user->email : '' }}" placeholder="Your email...">
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="mt-4 user-label">Phone:</label>
                                    <input class="p-2 profile-input " value="0{{ $user->phone }}" name="phone" required pattern="(\+84|0)\d{9,10}"  type="tel" maxlength="10" placeholder="Your phone...">
                                </div>
                                @error('phone')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="d-flex flex-column">
                                    <label class="mt-4 user-label">About me:</label>
                                    <input class="p-2 profile-input" value="{{ $user->intro }}" name="about_me" required type="text" placeholder="About you...">
                                </div>
                                @error('about_me')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
