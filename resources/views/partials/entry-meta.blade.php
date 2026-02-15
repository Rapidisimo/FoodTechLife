<div class="flex gap-6 flex-wrap">
    <time class="dt-published" datetime="{{ get_post_time('c', true) }}">
        {{ get_the_date() }}
    </time>
    <p>
        <span>{{ __('By', 'sage') }}</span>
        {{ get_the_author() }}
    </p>
</div>
