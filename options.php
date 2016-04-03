<div class="wrap">
<h2>Online Sales Chat</h2>
<p>If you have not yet signed up with <a href="http://www.onlinesaleschat.com" target="_blank">OnlineSalesChat.com</a> and received your company ID, you should do so before activating this plugin.</p>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('onlinesaleschat'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row">Company ID:</th>
<td><input type="text" name="company_id" value="<?php echo get_option('company_id'); ?>" /></td>
</tr>

</table>

<input type="hidden" name="action" value="update" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>