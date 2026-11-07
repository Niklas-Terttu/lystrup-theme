<?php
/**
 * Template Name: Lystrup – Elementor Full Width
 * Template Post Type: page
 */
defined('ABSPATH') || exit;
get_header();
while (have_posts()) : the_post(); ?>
<main id="primary" class="lystrup-elementor-full"><?php the_content(); ?></main>
<?php endwhile; get_footer();
