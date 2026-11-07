<?php defined('ABSPATH') || exit; ?>
<footer class="site-footer">
  <div class="wrap lystrup-footer-grid">
    <div>
      <h2>Lystrup Borgerforening</h2>
      <p>Sammen skaber vi et stærkere fællesskab i Lystrup og omegn.</p>
    </div>
    <nav aria-label="Links i sidefod">
      <h2>Genveje</h2>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/aktiviteter/')); ?>">Aktiviteter</a></li>
        <li><a href="<?php echo esc_url(home_url('/projekter/')); ?>">Projekter</a></li>
        <li><a href="<?php echo esc_url(home_url('/bestyrelsen/')); ?>">Bestyrelsen</a></li>
        <li><a href="<?php echo esc_url(home_url('/opret-profil/')); ?>">Opret profil</a></li>
      </ul>
    </nav>
    <div>
      <h2>Kontakt og information</h2>
      <p>Lystrup · Norddjurs Kommune</p>
      <?php if (get_privacy_policy_url()) : ?>
        <p><a href="<?php echo esc_url(get_privacy_policy_url()); ?>">Privatlivspolitik</a></p>
      <?php endif; ?>
      <p>Kontaktoplysninger og vedtægter tilføjes, når de er offentliggjort.</p>
    </div>
  </div>
  <div class="wrap lystrup-footer-bottom"><small>&copy; <?php echo esc_html(wp_date('Y')); ?> Lystrup Borgerforening</small></div>
</footer>
<?php wp_footer(); ?>
</body></html>
