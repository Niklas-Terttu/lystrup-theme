<?php
defined('ABSPATH') || exit;
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    register_nav_menus(['primary' => 'Hovedmenu']);
});
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('lystrup-style', get_stylesheet_uri(), [], wp_get_theme()->get('Version'));
});
add_action('after_switch_theme', function () {
    $pages = [
        'aktiviteter' => 'Aktiviteter',
        'projekter' => 'Projekter',
        'bestyrelsen' => 'Bestyrelsen',
        'opret-profil' => 'Opret profil',
        'borger-login' => 'Borgerlogin',
        'bestyrelse-login' => 'Bestyrelseslogin',
        'borgerportal' => 'Borgerportal',
        'bestyrelsesportal' => 'Bestyrelsesportal',
    ];
    foreach ($pages as $slug => $title) {
        if (get_page_by_path($slug)) continue;
        $content = '';
        if ($slug === 'opret-profil') $content = '[lystrup_registration]';
        if (str_ends_with($slug, '-login')) $content = '[lystrup_login]';
        if ($slug === 'borgerportal') $content = '[lystrup_portal area="citizen"]';
        if ($slug === 'bestyrelsesportal') $content = '[lystrup_portal area="board"]';
        wp_insert_post(['post_title' => $title, 'post_name' => $slug, 'post_content' => $content, 'post_status' => 'publish', 'post_type' => 'page']);
    }
});
