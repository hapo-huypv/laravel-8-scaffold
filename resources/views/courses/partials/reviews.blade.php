<div class="p-4">
    <div class="reviews">05 Reiews</div>
    <hr>
    <div class="d-flex rating">
        <div class="col-4 mr-4 d-flex flex-column justify-content-center align-items-center rating-star">
            <div class="rating-star-number">5</div>
            <div class="rating-star-icon">
                <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <div class="rating-star-total">2 Ratings</div>
        </div>
        <div class="col-8 rating-statistic">
            <div class="d-flex align-items-center">
                <div class="rating-statistic-type">5 stars</div>
                <hr class="rating-statistic-graph active">
                <div class="rating-statistic-total">2</div>
            </div>
            <div class="d-flex align-items-center">
                <div class="rating-statistic-type">4 stars</div>
                <hr class="rating-statistic-graph">
                <div class="rating-statistic-total">0</div>
            </div>
            <div class="d-flex align-items-center">
                <div class="rating-statistic-type">3 stars</div>
                <hr class="rating-statistic-graph">
                <div class="rating-statistic-total">0</div>
            </div>
            <div class="d-flex align-items-center">
                <div class="rating-statistic-type">2 stars</div>
                <hr class="rating-statistic-graph">
                <div class="rating-statistic-total">0</div>
            </div>
            <div class="d-flex align-items-center">
                <div class="rating-statistic-type">1 stars</div>
                <hr class="rating-statistic-graph">
                <div class="rating-statistic-total">0</div>
            </div>
        </div>
    </div>
    <hr>
    <div class="review-show">
        <select class="add-select2">
            <option class="select-option" value="">Show all reviews</option>
        </select>
    </div>
    @foreach ($reviews as $review)
        <div class="review-list mt-4">
            <div class="d-flex align-items-center">
                <img src="{{ asset($review->avatar) }}" alt="avatar" class="reviews-img">
                <span class="reviews-username">{{ $review->user_name }}</span>
                <span class="rating-star-icon mr-4">
                    @for ($i = 0; $i < $review->rate; $i++)
                    <i class="fa fa-star star-size" aria-hidden="true"></i>
                    @endfor
                </span>
                <span class="reviews-time">{{ $review->created_at }}</span>
            </div>
            <div class="reviews-content">{{ $review->content }}</div>
        </div>
        <hr>
    @endforeach
    <form method="get" action="{{ route('review', ['courseId' => $course->id]) }}">
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
