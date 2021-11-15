@extends('layouts.app')

@section('title')
    Program
@endsection

@section('content')
    <div class="show-detail">
        @include('components.breadcrumb')
            <div class="">
            @if ($program->join == config('course.joinin'))
                <form method="POST" action="{{ route('program-users.store', ['program_id' => $program->id]) }}">
                    @csrf <!-- csrf_token -->
                    <button id="btnLearnedProgram" class="btn btn-success btn-course-join" type="submit">Learned</a>
                </form>
            @endif
        </div>
        <video controls>
            <source src="{{ asset('assets/video/TinhKhucVang.mp4') }}">
        </video>
    </div>
@endsection
