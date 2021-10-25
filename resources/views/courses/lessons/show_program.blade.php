@extends('layouts.app')

@section('title')
    Program
@endsection

@section('content')
    <div class="show-detail">
        @include('courses.partials.breadcrumb')
        @if ($program->join == 0)
        <a href="{{ route('programs.join', ['course' => $course->id, 'lesson' => $lesson->id, 'program' => $program->id]) }}" id="btnLearnedProgram" class="col-2 flex-end btn btn-success btn-course-join-lesson p-0" type="submit">Learned</a>
        @else
        <a href="{{ route('programs.leave', ['course' => $course->id, 'lesson' => $lesson->id, 'program' => $program->id]) }}" id="btnLeaveProgram" class="col-2 flex-end btn btn-success btn-course-join-lesson p-0" type="submit">Leave</a>
        @endif
        <video controls>
            <source src="{{ asset('assets/video/TinhKhucVang.mp4') }}">
        </video>
    </div>
@endsection
