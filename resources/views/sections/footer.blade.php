<footer class="content-info pt-4 pb-4 border-t-2 border-b-black-500 border-dashed">
    @php(dynamic_sidebar('sidebar-footer'))
    @if(has_nav_menu('footer_navigation'))
    <nav class="nav-footer" aria-label="secondary">
        {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
    </nav>
    @endif
</footer>
