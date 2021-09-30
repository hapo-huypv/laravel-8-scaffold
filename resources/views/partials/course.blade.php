<div class="course-list">  
    <div class="row">
    @foreach($courses as $course)
        <div class="col-sm-6">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="d-flex">
                        <img class="course-list-img" src="{{$course->logo_path}}" alt="ellipse_html">
                        <div class="">
                            <p class="course-list-title">{{$course->title}}</p>
                            <p class="course-list-intro">{{$course->intro}}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-primary course-list-btn">More</a>
                    </div>
                    <div class="d-flex flex-row justify-content-center course-list-statistic">
                        <div class="col-4 p-0 d-flex flex-column align-items-start">
                            <div class="course-list-statistic-title">Learners</div>
                            <div class="course-list-statistic-number">{{$course->number_user}}</div>
                        </div>
                        <div class="col-4 p-0 d-flex flex-column align-items-center">
                            <div class="course-list-statistic-title">Lessons</div>
                            <div class="course-list-statistic-number">{{$course->number_lesson}}</div>
                        </div>
                        <div class="col-4 p-0 d-flex flex-column align-items-end">
                            <div class="mr-3 course-list-statistic-title">Times</div>
                            <div class="course-list-statistic-number">{{$course->learn_time}} (h)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <div class="paginationWrap">
        {!! $courses->onEachSide(2)->links('components.pagination') !!}
    </div>
</div>
