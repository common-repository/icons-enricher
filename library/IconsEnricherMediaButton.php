<?php

defined('ABSPATH') or die('No direct load!'); // Some kind of security

class IconsEnricherMediaButton
{
    public function register()
    {
        add_action( 'media_buttons', array( &$this, 'add_icon_button' ), 12 );
    }

    /**
     * "Add icon" button for media buttons panel
     *
     * @access     public
     * @since      1.0.0
     * @global     $pagenow
     * @global     $wp_version
     * @param      string $context The string of buttons that already exist
     * @return     string The HTML output for the media buttons
     */
    public function add_icon_button($context)
    {
        global $pagenow, $wp_version;

        $output = '';

        /** Only run in post/page creation and edit screens */
        if ( in_array( $pagenow, array( 'post.php', 'page.php', 'post-new.php', 'post-edit.php' ) ) || ( defined('DOING_AJAX') && DOING_AJAX ) ) {

            //Check current WP version
            if ( version_compare( $wp_version, '3.5', '<' ) ) { // If we are on an older version than 3.5

                //Output old style button
                // ??? $output = '<a href="#TB_inline?width=100%&inlineId=choose-' . $this->_args['shortcode_id'] . '" class="thickbox ' . $this->_args['shortcode_id'] . '-thickbox" title="' . __('Add ', 'mp_core') . $this->_args['shortcode_title'] . '">' . $img . '</a>';
            } else { //If we are on a newer than 3.5 WordPress

                $output = '<button type="button" class="thickbox button ' . I8_ENRICHER . '-media-button" id="js-'.I8_ENRICHER . '-media-button" title="' . __('Add icon', I8_ENRICHER) . '" style="padding-left:5px;">';
                $output .= '<span class="wp-media-buttons-icon"></span>';
                $output .= __('Add icon', I8_ENRICHER) . '</button>';
            }
        }

        // Add new button to list of buttons to output
        echo $output;
    }
}