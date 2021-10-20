<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="nav-crumb-link">
            <a class="nav-crumb-link-text" href="{{ route('home') }}">Home</a>
            <i class="fas fa-angle-right mr-1"></i>
        </li>
        <li class="nav-crumb-link">
            <a class="nav-crumb-link-text" href="{{ route('courses') }}">All courses</a>
            <i class="fas fa-angle-right mr-1"></i>
        </li>
        @if (isset($course->id))
        <li class="nav-crumb-link" aria-current="page">
            <a class="nav-crumb-link-text" href="{{ route('detail_course', [$course->id]) }}">{{ $course->title }}</a>
        </li>
        @endif
        @if (isset($lesson->id))
        <li class="nav-crumb-link" aria-current="page">
            <i class="fas fa-angle-right ml-1"></i>
            <a class="nav-crumb-link-text" href="{{ route('detail_lesson', [$lesson->id]) }}">{{ $lesson->title }}</a>
        </li>
        @endif
        @if (isset($program->id))
        <li class="nav-crumb-link" aria-current="page">
            <i class="fas fa-angle-right ml-1"></i>
            <a class="nav-crumb-link-text" href="{{ route('program', [$program->id]) }}">{{ $program->name }}</a>
        </li>
        @endif
    </ol>
</nav>