<?php
defined('ABSPATH') || exit;
$lystrup_login_url = home_url('/borger-login/');
$lystrup_portal_url = home_url('/borgerportal/');
$lystrup_board_url = home_url('/bestyrelsesportal/');
$lystrup_user = wp_get_current_user();
$lystrup_roles = (array) $lystrup_user->roles;
$lystrup_is_board = is_user_logged_in() && (current_user_can('manage_options') || in_array('lystrup_board', $lystrup_roles, true));
$lystrup_is_citizen = $lystrup_is_board || (is_user_logged_in() && in_array('lystrup_citizen', $lystrup_roles, true));
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="lystrup-skip-link" href="#primary">Spring til indhold</a>
<header class="site-header">
  <div class="wrap lystrup-header-inner">
    <a class="brand" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(get_bloginfo('name') ?: 'Lystrup Borgerforening'); ?></a>
    <details class="lystrup-mobile-nav">
      <summary aria-label="Åbn eller luk menu"><span class="lystrup-menu-icon" aria-hidden="true">☰</span><span>Menu</span></summary>
      <nav class="lystrup-nav" aria-label="Hovedmenu">
        <?php if (has_nav_menu('primary')) :
          wp_nav_menu(['theme_location' => 'primary', 'container' => false, 'menu_class' => 'lystrup-menu', 'depth' => 2]);
        else : ?>
          <ul class="lystrup-menu">
            <li><a href="<?php echo esc_url(home_url('/')); ?>">Forside</a></li>
            <li><a href="<?php echo esc_url(home_url('/aktiviteter/')); ?>">Aktiviteter</a></li>
            <li><a href="<?php echo esc_url(home_url('/projekter/')); ?>">Projekter</a></li>
            <li><a href="<?php echo esc_url(home_url('/bestyrelsen/')); ?>">Bestyrelsen</a></li>
          </ul>
        <?php endif; ?>
        <div class="lystrup-account-links">
          <?php if ($lystrup_is_citizen) : ?><a href="<?php echo esc_url($lystrup_portal_url); ?>">Borgerportal</a><?php endif; ?>
          <?php if ($lystrup_is_board) : ?><a href="<?php echo esc_url($lystrup_board_url); ?>">Bestyrelsesportal</a><?php endif; ?>
          <?php if (is_user_logged_in()) : ?>
            <a class="lystrup-login-button" href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>">Log ud</a>
          <?php else : ?>
            <a class="lystrup-login-button" href="<?php echo esc_url($lystrup_login_url); ?>">Log ind</a>
          <?php endif; ?>
        </div>
      </nav>
    </details>
  </div>
</header>
