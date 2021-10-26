@extends('layouts.app')

@section('title')
    Program
@endsection

@section('content')
    <div class="show-detail">
        @include('courses.partials.breadcrumb')
        @if ($program->join == config('course.joinin'))
        <a href="{{ route('courses.lessons.programs.edit', ['course' => $course, 'lesson' => $lesson, 'program' => $program]) }}" id="btnLearnedProgram" class="col-2 flex-end btn btn-success btn-course-join-lesson p-0" type="submit">Learned</a>
        @else
        <a href="{{ route('courses.lessons.programs.edit', ['course' => $course, 'lesson' => $lesson, 'program' => $program]) }}" id="btnLeaveProgram" class="col-2 flex-end btn btn-success btn-course-join-lesson p-0" type="submit">Leave</a>
        @endif
        <video controls>
            <source src="{{ asset('assets/video/TinhKhucVang.mp4') }}">
        </video>
    </div>
@endsection
