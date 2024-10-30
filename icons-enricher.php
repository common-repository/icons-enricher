<?php
/*
Plugin Name: Icons Enricher
Plugin URI: http://wordpress.org/plugins/icons-enricher
Description: Enrich your website with styled, consistent, pixel-perfect, first-class, shiny-ass icons. Insert icons in the post in less than 8 seconds.
Author: copist
Version: 1.0.8
Author URI: https://enricher.icons8.com/
*/

defined('ABSPATH') or die('No direct load!'); // Some kind of security

// Constantly constant
define('I8_ENRICHER', 'icons-enricher');
define('I8_ENRICHER_NAME', 'Icons Enricher');
define('I8_ENRICHER_VERSION', '1.0.8');
define('I8_ENRICHER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define('I8_ENRICHER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define('I8_ENRICHER_PLUGIN_FILE', __FILE__ );
define('I8_ENRICHER_WORDPRESS_URL', 'http://wordpress.org/plugins/icons-enricher' );
define('I8_ENRICHER_SUPPORT_URL', 'https://enricher.icons8.com/support' );
define('I8_ENRICHER_CONTACT_URL', 'https://enricher.icons8.com/contact' );
define('I8_ENRICHER_GA_TRACKING', '?utm_campaign=enricher_wordpress&utm_source=wordpress&utm_refcode=I9AE' );

function icons_enricher_init() {
    require_once dirname(__FILE__).'/library/IconsEnricher.php';
    new IconsEnricher;
}
add_action('init', 'icons_enricher_init');