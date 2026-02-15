@if (! post_password_required())
<section id="comments" class="comments">
    @if ($responses())
    <h2>
        {!! $title !!}
    </h2>

    <ol class="comment-list">
        {!! $responses !!}
    </ol>

    @if ($paginated())
    <nav aria-label="Comment">
        <ul class="pager">
            @if ($previous())
            <li class="previous">
                {!! $previous !!}
            </li>
            @endif

            @if ($next())
            <li class="next">
                {!! $next !!}
            </li>
            @endif
        </ul>
    </nav>
    @endif
    @endif

    @if ($closed())
    <x-alert type="warning">
        {!! __('Comments are closed.', 'sage') !!}
    </x-alert>
    @endif

    @php
    comment_form([
    'title_reply' => __('Leave a Reply', 'sage'),
    'comment_notes_before' => '',
    'fields' => [
    'author' => '<p class="comment-form-author">' .
        '<label for="author">' . __('Name') . '</label>' .
        '<input id="author" name="author" type="text" required /></p>',
    'email' => '<p class="comment-form-email">' .
        '<label for="email">' . __('Email') . '</label>' .
        '<input id="email" name="email" type="email" required /></p>',
    ],
    'comment_field' => '<p class="comment-form-comment">' .
        '<label for="comment">' . _x('Comment', 'noun') . '</label>' .
        '<textarea id="comment" name="comment" rows="4" required></textarea></p>',
    'class_submit' => 'btn btn-primary',
    ]);
    @endphp

</section>
@endif
