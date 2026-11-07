<?php
defined('ABSPATH') || exit;
$front_id = (int) get_queried_object_id();
if ($front_id && get_post_meta($front_id, '_elementor_edit_mode', true) === 'builder') {
    get_template_part('page');
    return;
}
get_header(); ?>
<main><section class="hero"><div class="wrap"><h1>Sammen skaber vi et stærkere Lystrup</h1><p>Velkommen til Lystrup Borgerforening. Her samler vi byen om aktiviteter, fællesskab og nye muligheder.</p><a class="button" href="<?php echo esc_url(home_url('/opret-profil/')); ?>">Bliv en del af fællesskabet</a></div></section><section class="section"><div class="wrap"><h2>Vær med i Lystrup</h2><div class="cards"><article class="card"><h3>Aktiviteter</h3><p>Se hvad der sker i byen.</p><a href="<?php echo esc_url(home_url('/aktiviteter/')); ?>">Se aktiviteter</a></article><article class="card"><h3>Projekter</h3><p>Følg udviklingen af vores fælles projekter.</p><a href="<?php echo esc_url(home_url('/projekter/')); ?>">Se projekter</a></article><article class="card"><h3>Borgerportal</h3><p>Information for godkendte borgere.</p><a href="<?php echo esc_url(home_url('/borger-login/')); ?>">Log ind</a></article></div></div></section></main>
<?php get_footer(); ?>
