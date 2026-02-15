<header class="site-banner border-b-2 border-b-black-500 border-dashed" role=" banner">
    @if(is_front_page() && !is_home())
    <h1 id="testy">
        <a href="{{ home_url('/') }}">
            {!! $siteName !!}
        </a>
    </h1>
    @else
    <a href="{{ home_url('/') }}" class="site-head__brand">
        {!! $siteName !!}
    </a>
    @endif
    <div class="top-nav">
        @if (has_nav_menu('primary_navigation'))
        <nav class="nav-primary" aria-label="primary">
            <span id="nav-label" hidden>Navigation</span>
            <button class="top-nav-open" aria-expanded="false" aria-labelledby="nav-label">
                <img src="{{ get_template_directory_uri() }}/resources/images/burger-menu.svg" alt="">
            </button>
            <div class="top-menu-container">
                <button class="top-nav-close" aria-label="Close" autofocus>
                    <img src="{{ get_template_directory_uri() }}/resources/images/close-x.svg" alt="">
                </button>
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
            </div>
        </nav>
        @endif
    </div>
</header>
