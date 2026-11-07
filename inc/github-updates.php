<?php
defined('ABSPATH') || exit;
require_once __DIR__ . '/github-release-updater.php';
add_filter('update_themes_github.com', function ($update, $theme_data, $stylesheet) {
    if ('lystrup-theme' !== $stylesheet || ($theme_data['UpdateURI'] ?? '') !== 'https://github.com/Niklas-Terttu/lystrup-theme') return $update;
    $release = Lystrup_Release_Updates::release('lystrup-theme');
    if (!$release) return false;
    return [
        'theme' => $stylesheet, 'version' => $release['version'],
        'url' => $release['url'], 'package' => $release['package'],
        'requires_php' => '8.0', 'autoupdate' => false,
    ];
}, 10, 3);
