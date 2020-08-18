<?php
//* Code goes here
add_action('admin_init', 'remove_textarea');

    function remove_textarea() {
            remove_post_type_support( 'page', 'editor' );
    }


// Remove dashboard widgets
function remove_dashboard_meta() {
        if ( ! current_user_can( 'manage_options' ) ) {
                remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
                remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
                remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
                remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
                remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
                remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
                remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
                remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
                remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
        }
}
add_action( 'admin_init', 'remove_dashboard_meta' );

function disable_elementor_dashboard_overview_widget() {
	remove_meta_box( 'e-dashboard-overview', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'disable_elementor_dashboard_overview_widget', 40);

