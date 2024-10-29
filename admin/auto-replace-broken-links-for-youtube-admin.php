<?php
/**
 * Generated by the WordPress Option Page generator
 * at http://jeremyhixon.com/wp-tools/option-page/
 */

 if(! class_exists('AutoReplaceBrokenLinksForYoutube')){
	class AutoReplaceBrokenLinksForYoutube {
		private $auto_replace_broken_links_for_youtube_options;

		public function __construct() {
			global $wpdb;
			add_action( 'admin_menu', array( $this, 'auto_replace_broken_links_for_youtube_add_plugin_page' ) );
			add_action( 'admin_init', array( $this, 'auto_replace_broken_links_for_youtube_page_init' ) );
		}

		public function auto_replace_broken_links_for_youtube_add_plugin_page() {
			add_options_page(
				'Auto Replace Broken Links For Youtube', // page_title
				'Auto Replace Broken Links For Youtube', // menu_title
				'manage_options', // capability
				'auto-replace-broken-links-for-youtube', // menu_slug
				array( $this, 'auto_replace_broken_links_for_youtube_create_admin_page' ) // function
			);
		}

		public function auto_replace_broken_links_for_youtube_create_admin_page() {
			$this->auto_replace_broken_links_for_youtube_options = get_option( 'auto_replace_broken_links_for_youtube_option_name' ); ?>

			<div class="wrap">
				<h2 style="color: black;">Auto Replace Broken Links For youtube</h2>
				<p><?php _e('Thanks to the action performed by the plugin on your content, you will be able to improve SEO and user experience by checking all the broken Youtube links on your website','auto-replace-broken-links-for-youtube'); ?>.</p>
				<?php settings_errors(); ?>
				<form method="post" action="options.php">
					<table>
						<tr>
							<td>
								<?php
									settings_fields( 'auto_replace_broken_links_for_youtube_option_group' );
									do_settings_sections( 'auto-replace-broken-links-for-youtube-admin' );
									submit_button();
									echo wp_kses_post('<p style="padding: 6px; max-width: 500px; height: auto; border: 1px solid lightblue; border-radius: 6px; box-shadow: 5px 10px #888888;">' . __('After entering your Youtube API Key, Auto Replace Broken Links For Youtube, It will replace all the broken Youtube links on your posts without the need for your intervention or manual link verification. Search engines will no longer see broken video links in your content. The plugin will take care of the check and possible replacement of the links with other valid links searched, independently on youtube, based on the key phrase of your article. The verification and replacement of broken links will take place in asynchronous mode without penalizing the page speed.','auto-replace-broken-links-for-youtube') . '</p>');
								?>
							</td>
							<td>
								<?php if(!wp_is_mobile()) { ?>
									<img style="width:80%; height:auto;" src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . 'assets/screenshot-1-desktop-device.png'); ?>" alt="screenshot desktop and mobile device" />
								<?php } else { ?>
									<img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . 'assets/screenshot-1-mobile-device.png'); ?>" alt="screenshot only mobile device" />
								<?php } ?>
							</td>
						</tr>
					</table>
				</form>
			</div>
		<?php }

		public function auto_replace_broken_links_for_youtube_page_init() {
			register_setting(
				'auto_replace_broken_links_for_youtube_option_group', // option_group
				'auto_replace_broken_links_for_youtube_option_name', // option_name
				array( $this, 'auto_replace_broken_links_for_youtube_sanitize' ) // sanitize_callback
			);

			add_settings_section(
				'auto_replace_broken_links_for_youtube_setting_section', // id
				esc_html__('Settings','auto-replace-broken-links-for-youtube'), // title
				array( $this, 'auto_replace_broken_links_for_youtube_section_info' ), // callback
				'auto-replace-broken-links-for-youtube-admin' // page
			);

			add_settings_field(
				'youtube_api_key_0', // id
				'Youtube API Key', // title
				array( $this, 'youtube_api_key_0_callback' ), // callback
				'auto-replace-broken-links-for-youtube-admin', // page
				'auto_replace_broken_links_for_youtube_setting_section' // section
			);

			add_settings_field(
				'action_2', // id
				esc_html__('Action', 'auto-replace-broken-links-for-youtube').':', // title
				array( $this, 'action_2_callback' ), // callback
				'auto-replace-broken-links-for-youtube-admin', // page
				'auto_replace_broken_links_for_youtube_setting_section' // section
			);

		}

		public function auto_replace_broken_links_for_youtube_sanitize($input) {
			$sanitary_values = array();
			if ( isset( $input['youtube_api_key_0'] ) ) {
				$sanitary_values['youtube_api_key_0'] = sanitize_text_field( $input['youtube_api_key_0'] );
			}

			if ( isset( $input['action_2'] ) ) {
				$sanitary_values['action_2'] = $input['action_2'];
			}

			return $sanitary_values;
		}

		public function auto_replace_broken_links_for_youtube_section_info() {
			
		}

		public function youtube_api_key_0_callback() {
			printf(
				'<input class="regular-text" type="text" name="auto_replace_broken_links_for_youtube_option_name[youtube_api_key_0]" id="youtube_api_key_0" value="%s">',
				isset( $this->auto_replace_broken_links_for_youtube_options['youtube_api_key_0'] ) ? esc_attr( $this->auto_replace_broken_links_for_youtube_options['youtube_api_key_0']) : ''
			);
			?><br><a target="_blank" href="https://www.youtube.com/watch?v=44OBOSBd73M"><?php _e('How to Get YouTube Data API Key','auto-replace-broken-links-for-youtube'); ?></a><?php
		}

		public function action_2_callback() {
			?> <select name="auto_replace_broken_links_for_youtube_option_name[action_2]" id="action_2">
				<?php $selected = (isset( $this->auto_replace_broken_links_for_youtube_options['action_2'] ) && $this->auto_replace_broken_links_for_youtube_options['action_2'] === 'Replace Video') ? 'selected' : '' ; ?>
				<option value="Replace Video" <?php echo esc_attr($selected); ?>>Replace Video</option>
				<?php $selected = (isset( $this->auto_replace_broken_links_for_youtube_options['action_2'] ) && $this->auto_replace_broken_links_for_youtube_options['action_2'] === 'Hide Video') ? 'selected' : '' ; ?>
				<option value="Hide Video" <?php echo esc_attr($selected); ?>>Hide Video</option>
			</select><br> <?php _e("'Replace Video' is Recommended",'auto-replace-broken-links-for-youtube');
		}

	}
}

if ( is_admin() ) {
	if(class_exists('AutoReplaceBrokenLinksForYoutube')){
		$auto_replace_broken_links_for_youtube = new AutoReplaceBrokenLinksForYoutube();
	}
}

/* 
 * Retrieve this value with:
 * $auto_replace_broken_links_for_youtube_options = get_option( 'auto_replace_broken_links_for_youtube_option_name' ); // Array of All Options
 * $youtube_api_key_0 = $auto_replace_broken_links_for_youtube_options['youtube_api_key_0']; 						   // Youtube API Key
 * $action_2 = $auto_replace_broken_links_for_youtube_options['action_2']; 											   // Action
 */