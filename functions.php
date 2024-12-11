<?php

function theme_enqueue_styles_scripts() {
    // Enqueue Styles
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.0.0');
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '1.0.0');
    wp_enqueue_style('javascript-plugins', get_template_directory_uri() . '/assets/css/javascript-plugins-bundle.css');
    wp_enqueue_style('menuzord', get_template_directory_uri() . '/assets/js/menuzord/css/menuzord.css');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style-main.css');
    wp_enqueue_style('menuzord-skins', get_template_directory_uri() . '/assets/css/menuzord-skins/menuzord-rounded-boxed.css');
    wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css');
    wp_enqueue_style('theme-skin', get_template_directory_uri() . '/assets/css/colors/theme-skin-color-set1.css');
    wp_enqueue_style('revolution-slider', get_template_directory_uri() . '/assets/js/revolution-slider/css/rs6.css');
    wp_enqueue_style('revolution-extra', get_template_directory_uri() . '/assets/js/revolution-slider/extra-rev-slider1.css');
    
    // Enqueue Scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '1.0.0', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '4.0.0', true);
    wp_enqueue_script('javascript-bundle', get_template_directory_uri() . '/assets/js/javascript-plugins-bundle.js', array(), null, true);
    wp_enqueue_script('menuzord', get_template_directory_uri() . '/assets/js/menuzord/js/menuzord.js', array(), null, true);
    wp_enqueue_script('revolution-tools', get_template_directory_uri() . '/assets/js/revolution-slider/js/revolution.tools.min.js', array(), null, true);
    wp_enqueue_script('revolution-slider', get_template_directory_uri() . '/assets/js/revolution-slider/js/rs6.min.js', array(), null, true);
    wp_enqueue_script('revolution-extra', get_template_directory_uri() . '/assets/js/revolution-slider/extra-rev-slider1.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles_scripts');


function theme_add_meta_tags() {
    ?>
    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" rel="shortcut icon" type="image/png" />
    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon.png" rel="apple-touch-icon" />
    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72" />
    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114" />
    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144" />
    <?php
}
add_action('wp_head', 'theme_add_meta_tags');


// Enqueue footer scripts and styles
function theme_enqueue_footer_assets() {
    // Enqueue scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper-js', get_template_directory_uri() . '/assets/js/popper.min.js', array(), false, true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), false, true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), false, true);
    wp_enqueue_script('email-decode-js', get_template_directory_uri() . '/assets/js/email-decode.min.js', array(), false, true);

    // Enqueue styles if needed
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_footer_assets');

// Register footer widget areas
function theme_footer_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'theme-textdomain'),
        'id'            => 'footer-widget-area',
        'description'   => __('Add widgets here to appear in your footer.', 'theme-textdomain'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'theme_footer_widgets_init');

// Include footer in theme
function theme_footer() {
    get_template_part('footer');
}


// Register Custom Post Type for Banners
function create_slider_post_type(){
    $labels = array(
        'name'                  => _x('Sliders', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Slider', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Sliders', 'text_domain'),
        'name_admin_bar'        => __('Slider', 'text_domain'),
        'all_items'             => __('All Sliders', 'text_domain'),
        'add_new_item'          => __('Add New Slider', 'text_domain'),
        'add_new'               => __('Add New', 'text_domain'),
        'new_item'              => __('New Slider', 'text_domain'),
        'edit_item'             => __('Edit Slider', 'text_domain'),
        'update_item'           => __('Update Slider', 'text_domain'),
        'view_item'             => __('View Slider', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Slider', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'), // Support title, content, and featured image
        'public'                => true,
        'has_archive'           => true,
        'menu_icon'             => 'dashicons-cover-image', // Custom icon in the menu
    );
    register_post_type( 'Slider', $args );
}
add_action( 'init', 'create_slider_post_type' );



// Add Theme Support for Post Thumbnails
function theme_setup() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_setup');

// Register Custom Post Type for Testimonials
function create_testimonial_post_type() {
    register_post_type('testimonial',
        array(
            'labels' => array(
                'name' => __('Testimonials', 'text_domain'),
                'singular_name' => __('Testimonial', 'text_domain'),
                'add_new_item' => __('Add New Testimonial', 'text_domain'),
                'edit_item' => __('Edit Testimonial'),
                'new_item' => __('New Testimonial', 'text_domain'),
                'view_item' => __('View Testimonial', 'text_domain'),
                'not_found' => __('No Testimonials found'),
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'testimonial'),
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-format-quote',
        )
    );
}
add_action('init', 'create_testimonial_post_type');

// Add Meta Boxes for Testimonials
function testimonial_add_meta_boxes() {
    add_meta_box(
        'testimonial_meta_box', // ID
        'Testimonial Details', // Title
        'testimonial_meta_box_callback', // Callback function
        'testimonial', // Post type
        'normal', // Context
        'high' // Priority
    );
}
add_action('add_meta_boxes', 'testimonial_add_meta_boxes');

// Callback function for testimonial meta box
function testimonial_meta_box_callback($post) {
    // Nonce field for security
    wp_nonce_field('save_testimonial_meta', 'testimonial_meta_nonce');

    $client_name = get_post_meta($post->ID, '_client_name', true);
    $client_position = get_post_meta($post->ID, '_client_position', true);

    ?>
    <p>
        <label for="client_name">Client Name:</label>
        <input type="text" name="client_name" id="client_name" value="<?php echo esc_attr($client_name); ?>" class="widefat">
    </p>
    <p>
        <label for="client_position">Client Position:</label>
        <input type="text" name="client_position" id="client_position" value="<?php echo esc_attr($client_position); ?>" class="widefat">
    </p>
    <?php
}

// Save Meta Box Data
function save_testimonial_meta($post_id) {
    // Verify nonce for security
    if (!isset($_POST['testimonial_meta_nonce']) || !wp_verify_nonce($_POST['testimonial_meta_nonce'], 'save_testimonial_meta')) {
        return;
    }

    // Save client name
    if (isset($_POST['client_name'])) {
        update_post_meta($post_id, '_client_name', sanitize_text_field($_POST['client_name']));
    }

    // Save client position
    if (isset($_POST['client_position'])) {
        update_post_meta($post_id, '_client_position', sanitize_text_field($_POST['client_position']));
    }
}
add_action('save_post', 'save_testimonial_meta');



// Register Custom Post Type for Practice Area
function create_practice_post_type() {
    $labels = array(
        'name'                  => _x('practices', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Practice', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Practices', 'text_domain'),
        'name_admin_bar'        => __('Practice', 'text_domain'),
        'archives'              => __('Practice Archives', 'text_domain'),
        'attributes'            => __('Practice Attributes', 'text_domain'),
        'all_items'             => __('All Practices', 'text_domain'),
        'add_new_item'          => __('Add New Practice', 'text_domain'),
        'add_new'               => __('Add New', 'text_domain'),
        'new_item'              => __('New Practice', 'text_domain'),
        'edit_item'             => __('Edit Practice', 'text_domain'),
        'update_item'           => __('Update Practice', 'text_domain'),
        'view_item'             => __('View Practice', 'text_domain'),
        'search_items'          => __('Search Practices', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Practice', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-awards',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type('practice', $args);
}
add_action('init', 'create_practice_post_type', 0);


function add_practice_icon_meta_box() {
    add_meta_box(
        'practice_icon', // Unique ID
        'Practice Icon', // Box title
        'practice_icon_meta_box_html', // Content callback, must be of type callable
        'practice' // Post type
    );
}
add_action('add_meta_boxes', 'add_practice_icon_meta_box');

function practice_icon_meta_box_html($post) {
    $icon_url = get_post_meta($post->ID, '_practice_icon', true);
    ?>
    <label for="practice_icon">Icon URL:</label>
    <input type="text" name="practice_icon" id="practice_icon" value="<?php echo esc_attr($icon_url); ?>" class="widefat">
    <?php
}

function save_practice_icon_meta_box($post_id) {
    if (array_key_exists('practice_icon', $_POST)) {
        update_post_meta(
            $post_id,
            '_practice_icon',
            $_POST['practice_icon']
        );
    }
}
add_action('save_post', 'save_practice_icon_meta_box');



function create_prices_post_type(){
    $labels = array(
        'name'                  => _x('Prices', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Price', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Prices', 'text_domain'),
        'name_admin_bar'        => __('Price', 'text_domain'),
        'all_items'             => __('All Prices', 'text_domain'),
        'add_new_item'          => __('Add New Price', 'text_domain'),
        'add_new'               => __('Add New', 'text_domain'),
        'new_item'              => __('New Price', 'text_domain'),
        'edit_item'             => __('Edit Price', 'text_domain'),
        'update_item'           => __('Update Price', 'text_domain'),
        'view_item'             => __('View Price', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Price', 'text_domain'),
        'labels'                => $labels,
        'menu_position'         => 6,
        'supports'              => array('title', 'editor'), // Support title, content, and featured image
        'public'                => true,
        'has_archive'           => true,
        'menu_icon'             => 'dashicons-money-alt', // Custom icon in the menu
    );
    register_post_type( 'Price', $args );
}
add_action('init', 'create_prices_post_type', 0);


// Add Meta Boxes for Price Details
function add_prices_meta_boxes() {
    add_meta_box(
        'price_details', // Unique ID for the meta box
        'Price Details', // Box title
        'price_meta_box_callback', // Callback function to display fields
        'Price', // Post type where the box will appear
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_prices_meta_boxes');


// Callback function to display fields in the meta box
function price_meta_box_callback($post) {
    // Retrieve the current values for each field
    $price_name = get_post_meta($post->ID, '_price_name', true);
    $price_value = get_post_meta($post->ID, '_price_value', true);
    $price_value_yearly = get_post_meta($post->ID, '_price_value_yearly', true);
    $price_tag = get_post_meta($post->ID, '_price_tag', true);
    ?>
    <p>
        <label for="price_name">Pricing Name:</label>
        <input type="text" name="price_name" id="price_name" value="<?php echo esc_attr($price_name); ?>" class="widefat">
    </p>
    <p>
        <label for="price_value">Offer Price:</label>
        <input type="text" name="price_value" id="price_value" value="<?php echo esc_attr($price_value); ?>" class="widefat">
    </p>
    <p>
        <label for="price_value_yearly">Offer Price (Yearly):</label>
        <input type="text" name="price_value_yearly" id="price_value_yearly" value="<?php echo esc_attr($price_value_yearly); ?>" class="widefat">
    </p>
    <p>
        <label for="price_tag">Pricing Tag:</label>
        <input type="text" name="price_tag" id="price_tag" value="<?php echo esc_attr($price_tag); ?>" class="widefat">
    </p>
    <?php
}

// Save the meta box values
function save_prices_meta_box($post_id) {
    if (array_key_exists('price_name', $_POST)) {
        update_post_meta($post_id, '_price_name', sanitize_text_field($_POST['price_name']));
    }
    if (array_key_exists('price_value', $_POST)) {
        update_post_meta($post_id, '_price_value', sanitize_text_field($_POST['price_value']));
    }
    if (array_key_exists('price_value_yearly', $_POST)) {
        update_post_meta($post_id, '_price_value_yearly', sanitize_text_field($_POST['price_value_yearly']));
    }
    if (array_key_exists('price_tag', $_POST)) {
        update_post_meta($post_id, '_price_tag', sanitize_text_field($_POST['price_tag']));
    }
}
add_action('save_post', 'save_prices_meta_box');



// Register Custom Post Type for Cases
function create_cases_post_type() {
    $labels = array(
        'name'                  => _x('Cases', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Case', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Cases', 'text_domain'),
        'name_admin_bar'        => __('Case', 'text_domain'),
        'all_items'             => __('All Cases', 'text_domain'),
        'add_new_item'          => __('Add New Case', 'text_domain'),
        'add_new'               => __('Add New', 'text_domain'),
        'new_item'              => __('New Case', 'text_domain'),
        'edit_item'             => __('Edit Case', 'text_domain'),
        'update_item'           => __('Update Case', 'text_domain'),
        'view_item'             => __('View Case', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Case', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'), // Support title, content, and featured image
        'public'                => true,
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'case'), // Custom slug for the case-studies posts
        'menu_icon'             => 'dashicons-welcome-learn-more', // Custom icon in the menu
    );
    register_post_type('case', $args);
}
add_action('init', 'create_cases_post_type', 0);

// Add Meta Boxes for Case Details
function add_case_meta_boxes() {
    add_meta_box(
        'case_details', // Unique ID for the meta box
        'Case Details', // Box title
        'case_meta_box_callback', // Callback function to display fields
        'case', // Post type where the box will appear
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_case_meta_boxes');


// Callback function to display fields in the meta box
function case_meta_box_callback($post) {
    // Retrieve the current values for each field
    $case_short_descrp = get_post_meta($post->ID, '_case_short_descrp', true);
    $case_date = get_post_meta($post->ID, '_case_date', true);
    ?>
    <p>
        <label for="case_short_descrp">Short Description:</label>
        <textarea name="case_short_descrp" id="case_short_descrp" value="<?php echo esc_attr($case_short_descrp); ?>" class="widefat" rows="5"></textarea>
    </p>
    <p>
        <label for="price_tag">Case Date:</label>
        <input type="text" name="case_date" id="case_date" value="<?php echo esc_attr($case_date); ?>" class="widefat">
    </p>
    <?php
}

// Save the meta box values
function save_case_meta_box($post_id) {
    if (array_key_exists('case_short_descrp', $_POST)) {
        update_post_meta($post_id, '_case_short_descrp', sanitize_text_field($_POST['case_short_descrp']));
    }
    if (array_key_exists('case_date', $_POST)) {
        update_post_meta($post_id, '_case_date', sanitize_text_field($_POST['case_date']));
    }
}
add_action('save_post', 'save_case_meta_box');


function create_teams_post_type(){
    $labels = array(
        'name'                  => _x('Teams', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Team', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Teams', 'text_domain'),
        'name_admin_bar'        => __('Team', 'text_domain'),
        'all_items'             => __('All Teams', 'text_domain'),
        'add_new_item'          => __('Add New Team', 'text_domain'),
        'add_new'               => __('Add New', 'text_domain'),
        'new_item'              => __('New Team', 'text_domain'),
        'edit_item'             => __('Edit Team', 'text_domain'),
        'update_item'           => __('Update Team', 'text_domain'),
        'view_item'             => __('View Team', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Team', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'), // Support title, content, and featured image
        'public'                => true,
        'has_archive'           => true,
        'menu_icon'             => 'dashicons-businessperson', // Custom icon in the menu
    );
    register_post_type('Team', $args);
}
add_action('init', 'create_teams_post_type', 0);



// Add Meta Boxes for Teams Details
function add_team_meta_boxes() {
    add_meta_box(
        'team_details', // Unique ID for the meta box
        'Team Details', // Box title
        'team_meta_box_callback', // Callback function to display fields
        'Team', // Post type where the box will appear
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_team_meta_boxes');


function team_meta_box_callback($post) {
    // Retrieve the current values for each field
    $member_desig = get_post_meta($post->ID, '_member_desig', true);
    ?>
    <p>
        <label for="member_desig">Designation:</label>
        <input type="text" name="member_desig" id="member_desig" value="<?php echo esc_attr($member_desig); ?>" class="widefat">
    </p>
    <?php
}

// Save the meta box values
function save_team_meta_box($post_id) {
    if (array_key_exists('member_desig', $_POST)) {
        update_post_meta($post_id, '_member_desig', sanitize_text_field($_POST['member_desig']));
    }
}
add_action('save_post', 'save_team_meta_box');



// Register Custom Post Type for Articles
function create_articles_post_type(){
    $labels = array(
        'name'                  => _x('Articles', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Article', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Articles', 'text_domain'),
        'name_admin_bar'        => __('Article', 'text_domain'),
        'all_items'             => __('All Articles', 'text_domain'),
        'add_new_item'          => __('Add New Article', 'text_domain'),
        'add_new'               => __('Add New', 'text_domain'),
        'new_item'              => __('New Article', 'text_domain'),
        'edit_item'             => __('Edit Article', 'text_domain'),
        'update_item'           => __('Update Article', 'text_domain'),
        'view_item'             => __('View Article', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Article', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'), // Support title, content, and featured image
        'public'                => true,
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'article'), // Custom slug for the blog posts
        'menu_icon'             => 'dashicons-welcome-write-blog', // Custom icon in the menu
    );
    register_post_type('Article', $args);
}
add_action('init', 'create_articles_post_type', 0);


// Add Meta Boxes for Teacher Details
function add_article_meta_boxes() {
    add_meta_box(
        'article_details', // Unique ID for the meta box
        'Article Details', // Box title
        'article_meta_box_callback', // Callback function to display fields
        'article', // Post type where the box will appear
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_article_meta_boxes');


function article_meta_box_callback($post) {
    // Retrieve the current values for each field
    $article_category = get_post_meta($post->ID, '_article_category', true);
    $article_author = get_post_meta($post->ID, '_article_author', true);
    $article_date = get_post_meta($post->ID, '_article_date', true);
    $short_descrp = get_post_meta($post->ID, '_short_descrp', true);
    ?>
    <p>
        <label for="article_category">Article's Category:</label>
        <input type="text" name="article_category" id="article_category" value="<?php echo esc_attr($article_category); ?>" class="widefat">
    </p>
    <p>
        <label for="article_author">Author Name:</label>
        <input type="text" name="article_author" id="article_author" value="<?php echo esc_attr($article_author); ?>" class="widefat">
    </p>
    <p>
        <label for="article_date">Article's Date:</label>
        <input type="text" name="article_date" id="article_date" value="<?php echo esc_attr($article_date); ?>" class="widefat" placeholder="example: Oct 01, 2024">
    </p>
    <p>
        <label for="short_descrp">Short Description:</label>
        <textarea name="short_descrp" id="short_descrp" class="widefat" rows="5" cols="30" value="<?php echo esc_attr($short_descrp);?>"></textarea>
    </p>
    <?php
}

// Save the meta box values
function save_article_meta_box($post_id) {
    if (array_key_exists('article_category', $_POST)) {
        update_post_meta($post_id, '_article_category', sanitize_text_field($_POST['article_category']));
    }
    if (array_key_exists('article_author', $_POST)) {
        update_post_meta($post_id, '_article_author', sanitize_text_field($_POST['article_author']));
    }
    if (array_key_exists('article_date', $_POST)) {
        update_post_meta($post_id, '_article_date', sanitize_text_field($_POST['article_date']));
    }
    if (array_key_exists('short_descrp', $_POST)) {
        update_post_meta($post_id, '_short_descrp', sanitize_text_field($_POST['short_descrp']));
    }
}
add_action('save_post', 'save_article_meta_box');



// Create the contact table
function create_contact_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_submissions'; // Table name with WordPress prefix

    // SQL to create the table
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        subject varchar(200) NOT NULL,
        message text NOT NULL,
        submitted_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    // Include the necessary file to execute dbDelta (which creates tables)
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

// Hook the function to the 'after_switch_theme' action to create the table when the theme is activated
add_action('after_switch_theme', 'create_contact_table');



function handle_contact_form_submission() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['contact_form_nonce'])) {
        
        // Verify nonce for security
        if (!wp_verify_nonce($_POST['contact_form_nonce'], 'submit_contact_form')) {
            die('Nonce verification failed');
        }

        // Check if form data exists
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {

            global $wpdb;
            $table_name = $wpdb->prefix . 'contact_submissions';

            // Sanitize form inputs
            $name = sanitize_text_field($_POST['name']);
            $email = sanitize_email($_POST['email']);
            $subject = sanitize_text_field($_POST['subject']);
            $message = sanitize_textarea_field($_POST['message']);

            // Insert data into the database
            $wpdb->insert(
                $table_name,
                array(
                    'name' => $name,
                    'email' => $email,
                    'subject' => $subject,
                    'message' => $message,
                    'submitted_at' => current_time('mysql')
                )
            );

            if ($wpdb->insert_id) {
                // Redirect or show success message
                echo '<div class="alert alert-success">Thank you for your message. We will be in touch soon!</div>';
            } else {
                echo '<div class="alert alert-danger">There was an issue submitting your message. Please try again later.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Please fill in all required fields.</div>';
        }
    }
}
add_action('wp', 'handle_contact_form_submission');


// Register the Contact Submissions Menu Page
function register_contact_submissions_menu_page() {
    add_menu_page(
        'Contact Submissions',          // Page title
        'Contact Submissions',          // Menu title
        'manage_options',               // Capability (Only admins can view)
        'contact-submissions',          // Menu slug
        'display_contact_submissions',  // Callback function to show the content
        'dashicons-email-alt',          // Icon
        6                               // Position
    );
}
add_action('admin_menu', 'register_contact_submissions_menu_page');


// Function to Display Contact Form Submissions
function display_contact_submissions() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_submissions';  // Your contact form table

    // Fetching data from the table
    $results = $wpdb->get_results("SELECT * FROM $table_name");

    // Admin page content
    echo '<div class="wrap">';
    echo '<h1>Contact Form Submissions</h1>';

    if ($results) {
        echo '<table class="widefat fixed" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Submitted At</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>';

        // Loop through each result and display in table rows
        foreach ($results as $row) {
            echo '<tr>';
            echo '<td>' . esc_html($row->id) . '</td>';
            echo '<td>' . esc_html($row->name) . '</td>';
            echo '<td>' . esc_html($row->email) . '</td>';
            echo '<td>' . esc_html($row->subject) . '</td>';
            echo '<td>' . esc_html($row->message) . '</td>';
            echo '<td>' . esc_html($row->submitted_at) . '</td>';
            echo '<td><a href="' . esc_url(admin_url('admin-post.php')) . '?action=delete_contact_submission&id=' . esc_html($row->id) . '">Delete</a></td>';            
            echo '</tr>';
        }

        echo '</tbody></table>';
    } else {
        echo '<p>No submissions found.</p>';
    }

    echo '</div>';
}



?>