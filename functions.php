<?php
    function load_assets() {
        wp_enqueue_style("bootstrapcss", get_theme_file_uri('/assets/css/bootstrap.min.css'), array(), "1.0", "all");
        wp_enqueue_style("awesome", "//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css", array(), "1.0", "all");
        wp_enqueue_style("csscustom", get_theme_file_uri('/assets/style.css'), array(), "1.0.2", "all");
        wp_enqueue_style("cssversion", get_theme_file_uri('/assets/css/versions.css'), array(), "1.0.2", "all");
        wp_enqueue_style("cssresponsive", get_theme_file_uri('/assets/css/responsive.css'), array(), "1.0.2", "all");
        wp_enqueue_style("csscustom", get_theme_file_uri('/assets/css/custom.css'), array(), "1.0.2", "all"); // Use a unique handle for this style
        wp_enqueue_style("favicon", get_theme_file_uri('/assets/images/favicon.ico'), array(), "1.0.2", "all");
        wp_enqueue_style("shortcuticon", get_theme_file_uri('/assets/images/apple-touch-icon.png'), array(), "1.0.2", "all");
        
        wp_enqueue_script("bootstrap", get_theme_file_uri() . '/assets/js/bootstrap.min.js', array('jquery'), "5.0.0", true);
        wp_enqueue_script("timeline", get_theme_file_uri() . '/assets/js/timeline.min.js', array('jquery'), "5.0.0", true);
        wp_enqueue_script("index", get_theme_file_uri() . '/build/index.js', array('jquery'), '1.0.2', true);
         echo get_site_url();
        wp_localize_script("index", 'smartEduData', array('root_url' => get_site_url()));
    }
    add_action("wp_enqueue_scripts", "load_assets");


    function smart_edu_create_query($query) {

        // Ap dung cho archive event
        if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query() ) {
            $today = date('Ymd');
            $query->set('post_type', 'event');
            $query->set('posts_per_page', 2);
            $query->set('meta_key', 'events_date');
            $query->set('orderby', 'meta_value_num');
            $query->set('order', 'ASC');
            $query->set('meta_query', array(
                array(
                    'key'=> 'events_date',
                    'compare'=> ">=",
                    "value"=> $today,
                    "type" => "numeric"
                )
                ));
        }
    }
    add_action('pre_get_posts', 'smart_edu_create_query');

    function add_menu() {
        add_theme_support( 'menus' );
        // register_nav_menu('themeLocationOne', 'Theme Footer One');
        register_nav_menus( array(
            'themeLocationOne' => 'Footer Menu One',
            'themeLocationTwo' => 'Header Menu',
        ));
    }
    // Them menu vao wordpress -> footer
    add_action('init', 'add_menu');

        // Xu ly hinh anh cho post type = professor
    function wpse_setup_theme() {
        // add_theme_support( 'post-thumbnails' );
        add_image_size( 'professorLandscape', 400, 260, true );
        add_image_size( 'professorPortrail', 480, 650, true );
        add_image_size( 'pageBanner', 1500, 550, true );
    }
    add_action( 'after_setup_theme', 'wpse_setup_theme' );

    function getBanner($parameter = NULL) {
        if(!isset($parameter['title'])) {
             $parameter["title"] = get_the_title();
        }
        if(!isset($parameter['subtitle'])) {
            $parameter["subtitle"] = get_field('sub_title');
        }
        if(!isset($parameter["photo"])){
            if(get_field("background_image")) {
                $parameter["photo"] = get_field("background_image")['sizes']['pageBanner'];
            } else {
                $parameter["photo"] = get_theme_file_uri('/assets/images/banner.jpg');
            }
        }
        ?>
        	<div class="all-title-box"
        	    style="background-image: url(<?php echo $parameter["photo"] ;?> )">
        	    <div class="container text-center">
        	        <h1><?php echo $parameter['title'] ?><span class="m_1"><?php echo $parameter['subtitle'] ?></span></h1>
        	    </div>
        	</div>
        <?php
    }

    // Redirect homepage when gues login
    add_action('admin_init', 'redirectHomePage');
    function redirectHomePage() {
        $guests = wp_get_current_user();
        if($guests->roles[0] == 'subscriber') {
            wp_redirect(site_url('/'));
            exit;
        }
    }
    // An Thanh topbar
    add_action('after_setup_theme', 'noAdminBar');
    function noAdminBar() {
        $guests = wp_get_current_user();
        if(count($guests->roles) == 1 AND $guests->roles[0] == 'subscriber') {
            show_admin_bar(false);
        }
    }
    //Chuyển về trang chủ khi người dùng click vào biểu tượng wordpress
    add_filter('login_headerurl', 'redirectHomePgae');
    function redirectHomePgae() {
        return esc_url(site_url('/'));
    }

    //Load css cho trang login
    add_action('login_enqueue_scripts', 'login_loading_assets');
    function login_loading_assets() {
        wp_enqueue_style("bootstrapcss", get_theme_file_uri('/assets/css/bootstrap.min.css'), array(), "1.0", "all");
        wp_enqueue_style("awesome", "//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css", array(), "1.0", "all");
        wp_enqueue_style("csscustom", get_theme_file_uri('/assets/style.css'), array(), "1.0.2", "all");
        wp_enqueue_style("cssversion", get_theme_file_uri('/assets/css/versions.css'), array(), "1.0.2", "all");
        wp_enqueue_style("cssresponsive", get_theme_file_uri('/assets/css/responsive.css'), array(), "1.0.2", "all");
        wp_enqueue_style("csscustom", get_theme_file_uri('/assets/css/custom.css'), array(), "1.0.2", "all"); // Use a unique handle for this style
        wp_enqueue_style("favicon", get_theme_file_uri('/assets/images/favicon.ico'), array(), "1.0.2", "all");
        wp_enqueue_style("shortcuticon", get_theme_file_uri('/assets/images/apple-touch-icon.png'), array(), "1.0.2", "all");
    }
    //Thay đổi tiêu đề cho trang login\
    function my_login_logo_url_title() {
        return get_bloginfo('name');
    }
    add_filter('login_headertext', 'my_login_logo_url_title')
?>