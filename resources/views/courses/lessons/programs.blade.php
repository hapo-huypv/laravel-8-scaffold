<div class="show-detail-course">
    <div class="">
        <div class="tab-title">Program</div>
    </div>
    <hr>
    @foreach ($programs as $program)
    <div class="d-flex align-items-center program">
        @if ($program->type == 0)
        <div class="icon-word mr-3"></div>
        <div class="mr-3 program-type">Lesson</div>
        @elseif ($program->type == 1)
        <div class="icon-pdf mr-3"></div>
        <div class="mr-3 program-type">PDF</div>
        @elseif ($program->type == 2)
        <div class="icon-video mr-3"></div>
        <div class="mr-3 program-type">Video</div>
        @endif
        <div class="col-8 program-name">{{ $program->name }}</div>
        <a href="{{ route('program', [$program->id]) }}" id="btnPreviewLesson" class="col-2 flex-end btn btn-success btn-course-join-lesson p-0" type="submit">Preview</a>
    </div>
    <hr>
    @endforeach
</div>