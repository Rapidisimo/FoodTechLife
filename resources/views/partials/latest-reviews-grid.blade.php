@php
$recent_reviews = new WP_Query([
'post_type' => 'review',
'posts_per_page' => 4,
]);

$review_archive_url = get_post_type_archive_link('review');
@endphp
<section>
    <h2>{{ __('Reviews', 'sage') }}</h2>
    <div class="recipe-grid grid gap-2 grid-cols-1 md:grid-cols-2 lg:grid-cols-4 md:gap-4">
        @if($recent_reviews->have_posts())
        @while($recent_reviews->have_posts()) @php($recent_reviews->the_post())
        <article>
            <a href="{{the_permalink( )}}">
                @if(has_post_thumbnail())
                {!! the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover']) !!}
                @endif
                <h3 class="!mt-4">
                    {!! $title !!}
                </h3>
            </a>
        </article>
        @endwhile
        @endif
    </div>
    <div class="flex justify-end">
        <a href="{{ $review_archive_url }}">
            View All Reviews
        </a>
    </div>
</section>
