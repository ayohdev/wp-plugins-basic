<?php
//* Code goes here
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Work';
    $submenu['edit.php'][5][0] = 'Work';
    $submenu['edit.php'][10][0] = 'Add Work';
    $submenu['edit.php'][16][0] = 'Work Tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Work';
    $labels->singular_name = 'Work';
    $labels->add_new = 'Add Work';
    $labels->add_new_item = 'Add Work';
    $labels->edit_item = 'Edit Work';
    $labels->new_item = 'Work';
    $labels->view_item = 'View Work';
    $labels->search_items = 'Search Work';
    $labels->not_found = 'No Work found';
    $labels->not_found_in_trash = 'No Work found in Trash';
    $labels->all_items = 'All Work';
    $labels->menu_name = 'Work';
    $labels->name_admin_bar = 'Work';
} 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );

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


add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
  .skip-dashboard-link-widget-button {
    background: transparent !important;
    color: #007cba !important;
    border: none !important;
    text-decoration: underline !important;
}
  </style>';
}
