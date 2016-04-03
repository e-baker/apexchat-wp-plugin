<?php
/*
Plugin Name: ApexChat Plugin
Plugin URI: https://trafficlight.me/wordpress-plugins/apexchat-wordpress-plugin/
Description: This plugin allows you to easily integrate ApexChat with your WordPress installation.
Version: 1.0
Author: Eric Baker | Traffic Light Media
Author URI: http://ericbaker.me
License: MIT
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function activate_apexchat() {
  add_option('company_id', 'xxxxxxxxx');
}

function delete_apexchat() {
  delete_option('company_id');
}

function admin_init_apexchat() {
  register_setting('apexchat', 'company_id');
}

function admin_menu_apexchat() {
  add_options_page('ApexChat', 'ApexChat', 'manage_options', 'apexchat', 'options_page_apexchat');
}

function options_page_apexchat() {
  include(WP_PLUGIN_DIR.'/apexchat-wp-plugin/options.php');
}

function apexchat() {
  $company_id = get_option('company_id');
?>
<script src="//www.liveleads.us/scripts/invitation.ashx?company=<?php echo $company_id ?>"async></script>
<?php
}

register_activation_hook(__FILE__, 'activate_apexchat');
register_deactivation_hook(__FILE__, 'deactivate_apexchat');

if (is_admin()) {
  add_action('admin_init', 'admin_init_apexchat');
  add_action('admin_menu', 'admin_menu_apexchat');
}

if (!is_admin()) {
  add_action('wp_head', 'apexchat');
}

?>