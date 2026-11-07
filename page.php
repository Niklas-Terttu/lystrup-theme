<?php
defined('ABSPATH') || exit;
get_header();
while (have_posts()) : the_post();
    $layout = get_page_template_slug(get_the_ID());
    $full = in_array($layout, ['elementor_header_footer', 'templates/elementor-full-width.php'], true);
    ?>
    <main id="primary" class="<?php echo esc_attr($full ? 'lystrup-elementor-full' : 'wrap content'); ?>">
        <?php if (!$full) : ?><h1><?php the_title(); ?></h1><?php endif; ?>
        <?php the_content(); ?>
    </main>
    <?php
endwhile;
get_footer();
