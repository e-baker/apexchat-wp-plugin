<?php
/*
Plugin Name: OnlineSalesChat Plugin
Plugin URI: https://trafficlight.me/wordpress-plugins/apexchat-wordpress-plugin/
Description: This plugin allows you to easily integrate OnlineSalesChat with your WordPress installation.
Version: 1.0
Author: Eric Baker of Traffic Light Media
Author URI: http://ericbaker.me
License: GPLv3
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function activate_onlinesaleschat() {
  add_option('company_id', 'xxxxxxxxx');
}

function delete_onlinesaleschat() {
  delete_option('company_id');
}

function admin_init_onlinesaleschat() {
  register_setting('onlinesaleschat', 'company_id');
}

function admin_menu_apexchat() {
  add_options_page('OnlineSalesChat', 'OnlineSalesChat', 'manage_options', 'onlinesaleschat', 'options_page_onlinesaleschat');
}

function options_page_apexchat() {
  include(WP_PLUGIN_DIR.'/onlinesaleschat-wp-plugin/options.php');
}

function onlinesaleschat() {
  $company_id = get_option('company_id');
?>
<script src="//www.liveleads.us/scripts/invitation.ashx?company=<?php echo $company_id ?>"async></script>
<?php
}

register_activation_hook(__FILE__, 'activate_onlinesaleschat');
register_deactivation_hook(__FILE__, 'deactivate_onlinesaleschat');

if (is_admin()) {
  add_action('admin_init', 'admin_init_onlinesaleschat');
  add_action('admin_menu', 'admin_menu_onlinesaleschat');
}

if (!is_admin()) {
  add_action('wp_head', 'onlinesaleschat');
}

?>