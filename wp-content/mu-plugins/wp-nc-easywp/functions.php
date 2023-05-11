<?php

if (!defined('ABSPATH')) {
    exit;
}

/*
|--------------------------------------------------------------------------
| Global functions
|--------------------------------------------------------------------------
|
| Here you can insert your global function loaded by composer settings.
|
*/

// Filter the mail sender email
add_filter('wp_mail_from', function ($email) {
    $site_url = get_site_url();
    $re       = '/^https?:\/\/|www./m';
    $domain   = preg_replace($re, '', $site_url);
    $domain   = (strpos($domain, 'easywp.') === false) ? $domain : 'easywp.com';

    return 'wordpress@' . $domain;
}, PHP_INT_MAX);

// Filter the mail sender name
add_filter('wp_mail_from_name', function ($name) {
    return 'EasyWP';
});

// Filter for affiliate link of wpforms plugin
add_filter('wpforms_upgrade_link', function ($url) {
    $sasID = 2303424;
    return 'http://www.shareasale.com/r.cfm?B=837827&U=' . $sasID . '&M=64312&urllink=' . rawurlencode($url);
});
