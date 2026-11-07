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

/**
 * Manually refresh WordPress theme update metadata.
 * This does not install unverified GitHub code.
 */
add_action('admin_menu', function () {
    add_theme_page('Lystrup temaopdatering', 'Lystrup: Søg efter opdatering', 'update_themes', 'lystrup-theme-updates', function () {
        if (!current_user_can('update_themes')) wp_die('Ingen adgang.');
        echo '<div class="wrap"><h1>Lystrup temaopdatering</h1><p>Kontrollerer tilgængelige opdateringer via WordPress. GitHub-udgivelser kræver separat konfigureret opdateringsintegration.</p>';
        if (isset($_GET['checked'])) echo '<div class="notice notice-success"><p>Opdateringskontrol gennemført. Se tilgængelige opdateringer under Kontrolpanel → Opdateringer.</p></div>';
        echo '<form method="post" action="' . esc_url(admin_url('admin-post.php')) . '">';
        wp_nonce_field('lystrup_theme_check_updates');
        echo '<input type="hidden" name="action" value="lystrup_theme_check_updates">';
        submit_button('Søg efter opdatering nu');
        echo '</form></div>';
    });
});
add_action('admin_post_lystrup_theme_check_updates', function () {
    if (!current_user_can('update_themes')) wp_die('Ingen adgang.', '', ['response' => 403]);
    check_admin_referer('lystrup_theme_check_updates');
    delete_site_transient('update_themes');
    wp_update_themes();
    wp_safe_redirect(add_query_arg('checked', '1', admin_url('themes.php?page=lystrup-theme-updates')));
    exit;
});

add_action('after_setup_theme', function () {
    add_theme_support('elementor');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
});
add_action('elementor/theme/register_locations', function ($manager) {
    $manager->register_all_core_location();
});
add_filter('body_class', function ($classes) {
    if (is_singular() && get_post_meta(get_queried_object_id(), '_elementor_edit_mode', true) === 'builder') {
        $classes[] = 'lystrup-elementor-page';
    }
    return $classes;
});
