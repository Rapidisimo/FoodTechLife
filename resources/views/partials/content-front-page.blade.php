@php
$recent_recipes = new WP_Query([
'post_type' => 'recipe',
'posts_per_page' => 1, // Adjust the number of recipes to display
]);
@endphp

<section class="latest-recipe">
    <h2 class="section-title">{{ __('Latest Recipe', 'sage') }}</h2>
    @if ($recent_recipes->have_posts())
    @while ($recent_recipes->have_posts()) @php($recent_recipes->the_post())
    <article class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
        <a href="{{ the_permalink() }}">
            @if (has_post_thumbnail())
            {!! the_post_thumbnail('medium', ['class' => 'w-full h-auto object-cover']) !!}
            @endif
        </a>
        <div>
            <a href="{{ the_permalink() }}" class="fp-recipe-headline">
                <h3 class="recipe-title">{!! $title !!}</h3>
            </a>
            @include('partials.entry-meta')
            <p>{{ html_entity_decode(wp_trim_words(get_the_excerpt(), 40)) }}</p>
            <div class="links grid flow">
                <a href="{{ the_permalink() }}"=>
                    Continue to Recipe
                </a>
                @if(get_field('youtube_link'))
                <a href="{{get_field('youtube_link')}}" target="_blank">
                    View on YouTube
                </a>
                @endif
            </div>
        </div>
    </article>
    @endwhile
    @php(wp_reset_postdata())
    @else
    <p>{{ __('No other recipes found.', 'sage') }}</p>
    @endif
</section>

@include('partials.latest-recipes-grid')

@include('partials.latest-reviews-grid')
