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
            <span class="reviews-time">{{ $review->date }} at {{ $review->time }}</span>
        </div>
        <div class="reviews-content">{{ $review->content }}</div>
    </div>
    <hr>
@endforeach
<div id="paginationReview" class="paginationWrap">
    {!! $reviews->appends($_GET)->fragment('pills-reviews-tab')->onEachSide(2)->links('components.pagination') !!}
</div>