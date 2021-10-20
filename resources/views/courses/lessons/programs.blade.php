<div class="show-detail-course">
    <div class="d-flex align-items-center">
        <div class="tab-title col-7">Program</div>
        <div class="col-4 processing-border d-flex lesson-processing justify-content-center align-items-center">
            <span class="processing" style="width:{{round($lesson->number_process, 2)}}%"></span>
            <span class="processing-number">{{ round($lesson->number_process, 2) }}%</span>
        </div>
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
