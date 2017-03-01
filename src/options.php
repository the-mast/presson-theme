<?php
add_action('admin_menu', 'presson_create_menu');

function presson_create_menu() {

	add_menu_page('PressOn! Theme Settings', 'PressOn!', 'administrator', __FILE__, 'presson_settings_page' , 'dashicons-carrot');

	add_action( 'admin_init', 'register_presson_settings' );
}

function register_presson_settings() {
	register_setting( 'presson-settings', 'google_analytics_id' );
}

function presson_settings_page() {
?>
<div class="wrap">
<h1>PressOn! Theme Settings</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'presson-settings' ); ?>
    <?php do_settings_sections( 'presson-settings' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Google Analytics ID</th>
        <td><input type="text" name="google_analytics_id" value="<?php echo esc_attr( get_option('google_analytics_id') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>