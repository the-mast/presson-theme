<?php
add_action('admin_menu', 'presson_create_menu');

function presson_create_menu() {

	add_menu_page('PressOn! Theme Settings', 'PressOn!', 'administrator', __FILE__, 'presson_settings_page' , 'dashicons-carrot');

	add_action( 'admin_init', 'register_presson_settings' );
}

function register_presson_settings() {
	register_setting( 'presson-settings', 'po_google_analytics_id' );
	register_setting( 'presson-settings', 'po_facebook_url' );
	register_setting( 'presson-settings', 'po_twitter_id' );
	register_setting( 'presson-settings', 'po_mailto_address' );
    register_setting( 'presson-settings', 'po_featured_category' );
    register_setting( 'presson-settings', 'po_main_post_category' );
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
        <td><input type="text" class="regular-text" name="po_google_analytics_id" value="<?php echo esc_attr( get_option('po_google_analytics_id') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Facebook URL</th>
        <td><input type="text" class="regular-text" name="po_facebook_url" value="<?php echo esc_attr( get_option('po_facebook_url') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Twitter ID</th>
        <td><input type="text" class="regular-text" name="po_twitter_id" value="<?php echo esc_attr( get_option('po_twitter_id') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">MailTo Address ("Contact Us")</th>
        <td><input type="text" class="regular-text" name="po_mailto_address" value="<?php echo esc_attr( get_option('po_mailto_address') ); ?>" /></td>
        </tr>
        <tr valign="top">
            <th scope="row">Featured Category</th>
            <td><?php   $args = array(
                                'show_option_none'  => 'None',
                                'name'              => 'po_featured_category',
                                'class'             => 'regular-text',
                                'value_field'       => 'term_id',
                                'selected'          => get_option('po_featured_category'),
                                'required'          => true
                            );
                         wp_dropdown_categories($args) ?>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Main Post Category</th>
            <td><?php   $args = array(
                                'show_option_none'  => 'None',
                                'name'              => 'po_main_post_category',
                                'class'             => 'regular-text',
                                'value_field'       => 'term_id',
                                'selected'          => get_option('po_main_post_category'),
                                'required'          => true
                            );
                         wp_dropdown_categories($args) ?>
            </td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>