<div class="p-4">
    <div class="reviews">05 Reiews</div>
    <hr>
    <div class="d-flex rating">
        <div class="col-4 mr-4 d-flex flex-column justify-content-center align-items-center rating-star">
            <div class="rating-star-number">{{ round($course->avg_rate) }}</div>
            <div class="rating-star-icon">
                @for ($i = 0; $i < $course->avg_rate; $i++)
                <i class="fa fa-star" aria-hidden="true"></i>
                @endfor
            </div>
            <div class="rating-star-total">{{ round($course->avg_rate) }} Ratings</div>
        </div>
        <div class="col-8 rating-statistic">
            @foreach ($course->number_count_rate as $key => $rating)
                <div class="d-flex align-items-center">
                    <div class="col-2 rating-statistic-type">{{ config('course.max_rate') - $key }} stars</div>
                    <div class="col-9 p-0 mr-1 progress progress-setup">
                        <div class="progress-bar" role="progressbar" style="width: {{ ($course->count_rate > config('course.none')) ? $rating / $course->count_rate * config('course.hundred_percent') : config('course.none')}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="col-1 rating-statistic-total">{{ $rating }}</div>
                </div>
            @endforeach
        </div>
    </div>
    <hr>
    <div class="review-show">
        <select id="selectReview" class="add-select2">
            <option class="select-option" value="">Show all reviews</option>
            <option class="select-option" value="5">Star 5</option>
            <option class="select-option" value="4">Star 4</option>
            <option class="select-option" value="3">Star 3</option>
            <option class="select-option" value="2">Star 2</option>
            <option class="select-option" value="1">Star 1</option>
        </select>
    </div>
    <div id="showReview">
        @include('components.reviews.show_review')
    </div>
    <form method="get" action="{{ route('courses.reviews.create', ['course' => $course]) }}" id="ajaxform">
        <div class="reviews font-size-22">Leave a Review</div>
        <div class="reviews-content mt-3">Message</div>
        <textarea class="course-review" name="course_review" type="text"></textarea>
        <div class="d-flex align-items-center mt-3">
            <div class="reviews font-size-22 mr-3">Vote</div>
            <div id="vote" class="rating-star-icon">
                <input hidden class="star star-5" id="star-5" type="radio" name="star" value="5" /> 
                <label  class="star star-5" for="star-5"></label> 
                <input hidden class="star star-4" id="star-4" type="radio" name="star" value="4"/> 
                <label class="star star-4" for="star-4"></label> 
                <input hidden class="star star-3" id="star-3" type="radio" name="star" value="3"/> 
                <label class="star star-3" for="star-3"></label> 
                <input hidden class="star star-2" id="star-2" type="radio" name="star" value="2"/> 
                <label class="star star-2" for="star-2"></label> 
                <input hidden class="star star-1" id="star-1" type="radio" name="star" value="1"/> 
                <label class="star star-1" for="star-1"></label>
            </div>
            <div class="reviews-content">(stars)</div>
        </div>
        <div class="d-flex justify-content-end mt-3"><button id="btnAddReview" class="col-1 btn btn-success btn-course-join-lesson p-btn-send" type="submit">Send</button></div>
    </form>
</div>
