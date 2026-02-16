@php
$latest_recipe_query = new WP_Query([
'post_type' => 'recipe',
'post_per_page' => 1,
'orderby' => 'date',
'order' => 'DESC',
]);

$latest_recipe_id = 0;
if($latest_recipe_query->have_posts()) {
$latest_recipe_query->the_post();
$latest_recipe_id = get_the_ID();
}
wp_reset_postdata();

$recent_recipes = new WP_Query([
'post_type' => 'recipe',
'posts_per_page' => 4,
'post__not_in' => [$latest_recipe_id ?? 0],
]);

$recipe_archive_url = get_post_type_archive_link('recipe');
@endphp
<section>
    <h2>{{ __('More Recipes', 'sage') }}</h2>
    <div class="recipe-grid grid gap-2 grid-cols-1 md:grid-cols-2 lg:grid-cols-4 md:gap-4">
        @if($recent_recipes->have_posts())
        @while($recent_recipes->have_posts()) @php($recent_recipes->the_post())
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
        <a href="{{ $recipe_archive_url }}">
            View All Recipes
        </a>
    </div>
</section>
