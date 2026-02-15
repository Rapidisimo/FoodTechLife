@extends('layouts.app')

@section('content')
@include('partials.page-header')

@if (! have_posts())
<x-alert type="warning">
    {!! __('Sorry, no results were found.', 'sage') !!}
</x-alert>

{!! get_search_form(false) !!}
@endif

<section>
    <div class="recipe-grid grid gap-2 grid-cols-1 md:grid-cols-2 lg:grid-cols-4 md:gap-4">
        @while(have_posts()) @php(the_post())
        <article>
            <a href="{{the_permalink( )}}">
                @if(has_post_thumbnail())
                {!! the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover']) !!}
                @endif
                <h3 class="!mt-4">
                    {!! get_the_title() !!}
                </h3>
            </a>
        </article>
        @endwhile
    </div>
</section>

@endsection

@section('sidebar')
@include('sections.sidebar')
@endsection
