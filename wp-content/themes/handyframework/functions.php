<?php
/**
 * Site Theme functions and definitions
 *
 * @package Site Theme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'best4u_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function best4u_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Site Theme, use a find and replace
	 * to change 'best4u' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'best4u', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'best4u' ),
		'footer' => __( 'Footer Menu', 'best4u' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

//	/*
//	 * Enable support for Post Formats.
//	 * See http://codex.wordpress.org/Post_Formats
//	 */
//	add_theme_support( 'post-formats', array(
//		'aside', 'image', 'video', 'quote', 'link',
//	) );

}
endif; // best4u_setup
add_action( 'after_setup_theme', 'best4u_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function best4u_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'best4u' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'best4u' ),
		'id'            => 'sidebar-footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widgetFooter %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widgetFooterTitle">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'best4u_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function best4u_scripts() {

	//styles here

	wp_enqueue_style( 'fonts-awesome', get_template_directory_uri().'/css/font-awesome/4.7.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'fonts', get_template_directory_uri().'/css/fonts.css' );

	if( !is_page_template('tpl-home.php') ) {
        wp_enqueue_style( 'jqueryui', get_template_directory_uri().'/js/js_libraries/jqueryui/jquery-ui.min.css' );
        wp_enqueue_style( 'jqueryui-structure', get_template_directory_uri().'/js/js_libraries/jqueryui/jquery-ui.structure.min.css' );
        wp_enqueue_style( 'jqueryui-theme', get_template_directory_uri().'/js/js_libraries/jqueryui/jquery-ui.theme.min.css' );
        wp_enqueue_script( 'jqueryuijs', get_template_directory_uri().'/js/js_libraries/jqueryui/jquery-ui.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'datepickernljs', get_template_directory_uri().'/js/js_libraries/jqueryui/datepicker-nl.js', array('jquery'), '', true );
    }
    if(is_singular('partners')) {
        wp_enqueue_style( 'animate-css', get_template_directory_uri().'/js/js_libraries/owl.carousel/animate.css' );
        wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/js/js_libraries/owl.carousel/owl.carousel.css' );
    }
	//wp_enqueue_style( 'mmenu', get_template_directory_uri().'/js/js_libraries/mmenu/jquery.mmenu.all.css' );

	//fancybox libraries
	//wp_enqueue_style( 'fancybox', get_template_directory_uri().'/js/js_libraries/fancybox/jquery.fancybox.css' );
	//wp_enqueue_style( 'fancybox-buttons', get_template_directory_uri().'/js/js_libraries/fancybox/helpers/jquery.fancybox-buttons.css' );
	//wp_enqueue_style( 'fancybox-thumbs', get_template_directory_uri().'/js/js_libraries/fancybox/helpers/jquery.fancybox-thumbs.css' );

	//main site style
	//wp_enqueue_style( 'best4u-style', get_stylesheet_uri() );

	//main.css style
	wp_enqueue_style( 'main_style', get_template_directory_uri().'/main.css', array( 'best4u-style' ) );


	// wp_deregister_script( 'jquery' );
 //    wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', false, '', false );
 //    wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'best4u-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'best4u-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	//wp_enqueue_script( 'local-jquery', get_template_directory_uri().'/js/jquery-1.11.2.min.js' );
    if(is_singular('partners')) {
        wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/js_libraries/owl.carousel/owl.carousel.min.js', array('jquery'), '', true);
    }
	wp_enqueue_script( 'mmenu', get_template_directory_uri().'/js/js_libraries/mmenu/jquery.mmenu.min.all.js', array('jquery'), '', true );
	wp_enqueue_script( 'dropkick', get_template_directory_uri().'/js/js_libraries/dropkick.min.js', array('jquery'), '', true );
	
	//fancybox libraries
	//wp_enqueue_script( 'fancybox', get_template_directory_uri().'/js/js_libraries/fancybox/jquery.fancybox.pack.js', array(), '', true );
	//wp_enqueue_script( 'fancybox-buttons', get_template_directory_uri().'/js/js_libraries/fancybox/helpers/jquery.fancybox-buttons.js', array(), '', true );
	//wp_enqueue_script( 'fancybox-thumbs', get_template_directory_uri().'/js/js_libraries/fancybox/helpers/jquery.fancybox-thumbs.js', array(), '', true );
	//wp_enqueue_script( 'fancybox-media', get_template_directory_uri().'/js/js_libraries/fancybox/helpers/jquery.fancybox-media.js', array(), '', true );

	if(is_page_template('tpl-contact.php') || is_singular('coaches') || is_singular('partners')) {
		wp_enqueue_script( 'gmap-source', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false');
		wp_enqueue_script( 'gmap-acf', get_template_directory_uri().'/js/acf-google-map.js', array('jquery'), '', true );
	}
	

	wp_enqueue_script( 'validatejs', get_template_directory_uri().'/js/jquery.validate.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'mainjs', get_template_directory_uri().'/js/main.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'best4u_scripts' );

add_filter( 'gform_init_scripts_footer', '__return_true' );


//load best4u login styles
function best4u_login_screen_style() {
  	wp_enqueue_style( 'best4u_development', get_template_directory_uri().'/css/best4u_login_style.css', false );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/css/functions.js', array('jquery'), '', true );
}
add_action( 'login_enqueue_scripts', 'best4u_login_screen_style', 10 );


add_action('login_footer', 'some_content');
function some_content(){
	require_once "inc/login-content.php";
}

add_action('login_message', 'header_form_messge');
function header_form_messge(){
	echo '<h1 class="headerTitle">Direct inloggen</h1>';
}


function admin_color_schemes() {
    //Get the theme directory
    $theme_dir = get_template_directory_uri();
 
    //Best4u
    wp_admin_css_color( 'orange', __( 'Best4u' ),
         'http://best4u.md/admin-login/orange/colors.css',
        array( '#4b4a58', '#373646', '#ff7f00', '#f2fcff' )
    );
}
add_action('admin_init', 'admin_color_schemes');

function set_default_admin_color($user_id) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'orange'
    );
    wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color');

function adminbar_styles() {
	if ( is_admin_bar_showing() ) {

		// Admin-bar Style 
		$theme_dir = get_template_directory_uri();
		wp_enqueue_style( 'admin-bar-overrides', 'https://best4u.md/admin-login/orange/colors.css', array( 'admin-bar' ), null, 'all' );
	}
}
add_action( 'wp_head', 'adminbar_styles' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

//Add Theme Settings
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> '',
		'menu_title'	=> 'Thema Instellingen',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

//	acf_add_options_sub_page(array(
//		'page_title' 	=> 'Theme Header Settings',
//		'menu_title'	=> 'Header',
//		'parent_slug'	=> 'theme-general-settings',
//	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Thema Header Instellingen',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Thema Voettekst Instellingen',
		'menu_title'	=> 'Voettekst',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Thema Standaard Waarden',
		'menu_title'	=> 'Standaard Waarden',
		'parent_slug'	=> 'theme-general-settings',
	));


//    acf_add_options_sub_page(array(
//        'page_title' 	=> 'Coaches settings',
//        'menu_title'	=> 'Coaches',
//        'parent_slug'	=> 'theme-general-settings',
//    ));
//
//    acf_add_options_sub_page(array(
//        'page_title' 	=> 'Adviseurs settings',
//        'menu_title'	=> 'Adviseurs',
//        'parent_slug'	=> 'theme-general-settings',
//    ));
//
//    acf_add_options_sub_page(array(
//        'page_title' 	=> 'Ervaringen settings',
//        'menu_title'	=> 'Ervaringen',
//        'parent_slug'	=> 'theme-general-settings',
//    ));
//
//    acf_add_options_sub_page(array(
//        'page_title' 	=> 'News settings',
//        'menu_title'	=> 'News',
//        'parent_slug'	=> 'theme-general-settings',
//    ));

	if(get_current_user_id() == 3){
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Dev Mode',
			'menu_title'	=> 'Dev Mode',
			'parent_slug'	=> 'theme-general-settings',
		));
	}


}

//get custom numbers of words from content
function my_content( $limit, $text = false, $word = false ) {

    $trim = false;

    if( $word !== 'disable' ) {

        if ( !$word ) {

            $word = __( 'Read more', 'best4u' );
        } else {
            $word = '';
        }
    }

    if ( $text ) {

        $content = $text;
    } else {

        $content = get_the_content();
    }


    $content = strip_tags( $content );
    $content = explode( " ", $content );

    if ( count( $content ) > $limit ) {

        $trim = true;
    }

    $content = array_slice( $content, 0, $limit, true );

    if ( $trim ) {

        $index = count( $content ) - 1;
        $last  = $content[ $index ];

        if ( $word && $word !== 'disable' ) {

//            $last = $last . '<a href="' . get_permalink() . '"> ' . $word . '</a>';
        }

        $content[ $index ] = $last;
    }

    $content = implode( " ", $content );

    return $content;
}


// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );


//custom query pagination
if ( ! function_exists( 'custom_paging_nav' ) ) :
/**
* Display navigation to next/previous set of posts when applicable.
*
* @since Twenty Fourteen 1.0
*
* @global WP_Query   $wp_query/$custom_query  WordPress Query object.
* @global WP_Rewrite $wp_rewrite WordPress Rewrite object.
*/
function custom_paging_nav( $custom_query ) {
	global $wp_rewrite;

	// Don't print empty markup if there's only one page.
	if ( $custom_query->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $custom_query->max_num_pages,
		'current'  => $custom_query->query['paged'],
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
		'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
	) );

	if ( $links ) :
        ?>
<nav class="navigation paging-navigation" role="navigation">
	<div class="screen-reader-text"><?php _e( 'Posts navigation', 'twentyfourteen' ); ?></div>
	<div class="pagination loop-pagination">
		<?php echo $links; ?>
	</div><!-- .pagination -->
</nav><!-- .navigation -->
<?php
	endif;
}
endif;


//default pagination
if ( ! function_exists( 'default_paging_nav' ) ) :
/**
* Display navigation to next/previous set of posts when applicable.
*
* @since Twenty Fourteen 1.0
*
* @global WP_Query   $wp_query/$custom_query  WordPress Query object.
* @global WP_Rewrite $wp_rewrite WordPress Rewrite object.
*/
function default_paging_nav() {
	global $wp_query, $wp_rewrite;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $wp_query->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'twentyfourteen' ),
		'next_text' => __( 'Next &rarr;', 'twentyfourteen' ),
	) );

	if ( $links ) :

?>
<nav class="navigation paging-navigation" role="navigation">
	<div class="screen-reader-text"><?php _e( 'Posts navigation', 'twentyfourteen' ); ?></div>
	<div class="pagination loop-pagination">
		<?php echo $links; ?>
	</div><!-- .pagination -->
</nav><!-- .navigation -->
<?php
	endif;
}
endif;

//custom sidebar check function
function b4u_check_sidebar( $point = "start" ) {
	if( is_active_sidebar('sidebar-1') ) {
		if( $point == "start" ) {
			echo "<div class='leftContent span-8'>";
		} elseif ( $point == "end" ) {
			echo "</div><!--leftContent-->";
			get_sidebar();
		} else {
			echo "please write the right code !!!!!!";
		}
	} else {
		if( $point == "start" ) {
			echo "<div class='innerWrapper'>";
		} elseif ( $point == "end" ) {
			echo "</div><!--innerWrapper-->";
			get_sidebar();
		} else {
			echo "please write the right code !!!!!!";
		}
	}
}

add_action('admin_head', 'admin_styles');
function admin_styles() {	?>
	<style>
		.acf-editor-wrap iframe {
			height: 100px !important;
			max-height: 200px;
		}
	</style>
	<?php
}


get_template_part('inc/shortcodes/b4u-shortcodes');


/// Add Quicktags
function b4uQuickTags() {

	if ( wp_script_is( 'quicktags' ) ) {
	?>
	<script type="text/javascript">
	QTags.addButton( 'b4uh1', 'H1', '<div class="h1">', '</div>', '', 'H1 Custom', 21 );
	QTags.addButton( 'b4uh2', 'H2', '<div class="h2">', '</div>', '', 'H2 Custom', 21 );
	QTags.addButton( 'b4uh3', 'H3', '<div class="h3">', '</div>', '', 'H3 Custom', 21 );
	QTags.addButton( 'b4uh4', 'H4', '<div class="h4">', '</div>', '', 'H4 Custom', 21 );
	QTags.addButton( 'b4uh5', 'H5', '<div class="h5">', '</div>', '', 'H5 Custom', 21 );
	</script>
	<?php
	}

}
add_action( 'admin_print_footer_scripts', 'b4uQuickTags' );

function b4u_add_editor_styles() {
    add_editor_style( 'css/b4u-editor-style.css' );
}
add_action( 'admin_init', 'b4u_add_editor_styles' );


function b4uUseSidebar() {
	//the_field('use_sidebar_select');
	global $wp_query;
    $post_id = $wp_query->get_queried_object_id();
    $sidebarCheck = get_field('activeer_sidebar', $post_id);

    //echo $sidebarCheck;


if($sidebarCheck) {
		if($sidebarCheck == 'option2') {
			$use_sidebar =  "sidebarNo";
		} else if($sidebarCheck == 'option1') {
			$use_sidebar = 'sidebarYes';
		}
		return $use_sidebar;
	}
}


add_filter( 'style_loader_tag', 'add_property_attribute', 10, 2 );
function add_property_attribute($link, $handle) {
     $link = str_replace( '/>', 'property />', $link );
   return $link;
}

function b4uCredits() {
	if(get_field('credits','option')) {
					if(get_field('credits','option') == 'nl') {
						$creditsText = '<a href="https://www.best4u.nl/">'.__('Development by Best4u Group B.V.', 'best4u').'</a>';
					} else if(get_field('credits','option') == 'be') {
						$creditsText = '<a href="https://www.best4ugroup.be/">'.__('Development by Best4u Group B.V.B.A.', 'best4u').'</a>';
					}
					echo $creditsText;
				}
	}


get_template_part('inc/templates/widgets/acf-repeater-widget');

function google_fonts() {
	$query_args = array(
		//'family' => 'Open+Sans:400,700|Oswald:700'
		//'subset' => 'latin',
	);
	wp_register_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
            }
            
add_action('wp_enqueue_scripts', 'google_fonts');

function b4u_jquery_to_footer() {
	if( is_admin())
		return;

	wp_script_add_data('jquery', 'group', 1);
	wp_script_add_data('jquery-core', 'group', 1);
	wp_script_add_data('jquery-migrate', 'group', 1);
}
add_action('wp','b4u_jquery_to_footer');



function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyA3DISseffAd_Qlb4gWAhT_o3SiIp9JGVE';

	return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');





add_filter( 'gform_init_scripts_footer', '__return_true' );
add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open', 1 );
function wrap_gform_cdata_open( $content = '' ) {
	if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
		return $content;
	}
	$content = 'document.addEventListener( "DOMContentLoaded", function() { ';
	return $content;
}
add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close', 99 );
function wrap_gform_cdata_close( $content = '' ) {
	if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
		return $content;
	}
	$content = ' }, false );';
	return $content;
}

add_image_size('hd', 1920, 0, true);


/**
 * Adds B4u_map Google widget.
 */
class B4u_map extends WP_Widget {

	function __construct() {
		parent::__construct(
			'b4u_map', // Base ID
			__( 'Google map', 'best4u' ), // Name
			array( 'description' => __( 'Google map widget by Best4u', 'best4u' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		ob_start();
		$adres = get_field('adres', 'widget_'.$this->id);

		echo do_shortcode('[flexiblemap address="'.$adres.'" draggable="false"]');

		$output = ob_get_contents();
		ob_end_clean();
		echo $output;
		echo $args['after_widget'];
	}

	public function form( $instance ) {	}
	public function update( $new_instance, $old_instance ) {}

} // class B4u_map

// register B4u_map widget
function register_b4u_map() {
	register_widget( 'B4u_map' );
}
add_action( 'widgets_init', 'register_b4u_map' );


// Register Custom Post Type
function coaches() {

    $labels = array(
        'name'                  => _x( 'Сoaches', 'Post Type General Name', 'Сoaches' ),
        'singular_name'         => _x( 'Сoache', 'Post Type Singular Name', 'Сoaches' ),
        'menu_name'             => __( 'Сoaches', 'Сoaches' ),
        'name_admin_bar'        => __( 'Сoaches', 'Сoaches' ),
        'archives'              => __( 'Item Archives', 'Сoaches' ),
        'attributes'            => __( 'Item Attributes', 'Сoaches' ),
        'parent_item_colon'     => __( 'Parent Item:', 'Сoaches' ),
        'all_items'             => __( 'All Items', 'Сoaches' ),
        'add_new_item'          => __( 'Add New Item', 'Сoaches' ),
        'add_new'               => __( 'Add New Сoache', 'Сoaches' ),
        'new_item'              => __( 'New Сoache', 'Сoaches' ),
        'edit_item'             => __( 'Edit Item', 'Сoaches' ),
        'update_item'           => __( 'Update Item', 'Сoaches' ),
        'view_item'             => __( 'View Item', 'Сoaches' ),
        'view_items'            => __( 'View Items', 'Сoaches' ),
        'search_items'          => __( 'Search Item', 'Сoaches' ),
        'not_found'             => __( 'Not found', 'Сoaches' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'Сoaches' ),
        'featured_image'        => __( 'Featured Image', 'Сoaches' ),
        'set_featured_image'    => __( 'Set featured image', 'Сoaches' ),
        'remove_featured_image' => __( 'Remove featured image', 'Сoaches' ),
        'use_featured_image'    => __( 'Use as featured image', 'Сoaches' ),
        'insert_into_item'      => __( 'Insert into item', 'Сoaches' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'Сoaches' ),
        'items_list'            => __( 'Items list', 'Сoaches' ),
        'items_list_navigation' => __( 'Items list navigation', 'Сoaches' ),
        'filter_items_list'     => __( 'Filter items list', 'Сoaches' ),
    );
    $args = array(
        'label'                 => __( 'Сoache', 'Сoaches' ),
        'description'           => __( 'Сoaches', 'Сoaches' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'coaches', $args );
}
add_action( 'init', 'coaches', 0 );

// Register Custom Taxonomy
function regio() {

    $labels = array(
        'name'                       => _x( 'Regio', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Regio', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Regio', 'text_domain' ),
        'all_items'                  => __( 'All Items', 'text_domain' ),
        'parent_item'                => __( 'Parent Item', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
        'new_item_name'              => __( 'New Item Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Item', 'text_domain' ),
        'edit_item'                  => __( 'Edit Item', 'text_domain' ),
        'update_item'                => __( 'Update Item', 'text_domain' ),
        'view_item'                  => __( 'View Item', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Items', 'text_domain' ),
        'search_items'               => __( 'Search Items', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No items', 'text_domain' ),
        'items_list'                 => __( 'Items list', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'regio', array( 'coaches' ), $args );

}
add_action( 'init', 'regio', 0 );

// Register Custom Taxonomy
function vakgebieden() {

    $labels = array(
        'name'                       => _x( 'Vakgebieden', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Vakgebieden', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Vakgebieden', 'text_domain' ),
        'all_items'                  => __( 'All Items', 'text_domain' ),
        'parent_item'                => __( 'Parent Item', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
        'new_item_name'              => __( 'New Item Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Item', 'text_domain' ),
        'edit_item'                  => __( 'Edit Item', 'text_domain' ),
        'update_item'                => __( 'Update Item', 'text_domain' ),
        'view_item'                  => __( 'View Item', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Items', 'text_domain' ),
        'search_items'               => __( 'Search Items', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No items', 'text_domain' ),
        'items_list'                 => __( 'Items list', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'vakgebieden', array( 'coaches' ), $args );

}
add_action( 'init', 'vakgebieden', 0 );

// Register Custom Taxonomy
function ondernemersvaardigheden() {

    $labels = array(
        'name'                       => _x( 'Ondernemersvaardigheden', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Ondernemersvaardigheden', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Ondernemersvaardigheden', 'text_domain' ),
        'all_items'                  => __( 'All Items', 'text_domain' ),
        'parent_item'                => __( 'Parent Item', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
        'new_item_name'              => __( 'New Item Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Item', 'text_domain' ),
        'edit_item'                  => __( 'Edit Item', 'text_domain' ),
        'update_item'                => __( 'Update Item', 'text_domain' ),
        'view_item'                  => __( 'View Item', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Items', 'text_domain' ),
        'search_items'               => __( 'Search Items', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No items', 'text_domain' ),
        'items_list'                 => __( 'Items list', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'ondernemersvaardigheden', array( 'coaches' ), $args );

}
add_action( 'init', 'ondernemersvaardigheden', 0 );




// Register Custom Post Type
function partners() {

    $labels = array(
        'name'                  => _x( 'Partners', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Partner', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Partners', 'text_domain' ),
        'name_admin_bar'        => __( 'Partners', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Items', 'text_domain' ),
        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Partner', 'text_domain' ),
        'description'           => __( 'Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => false,
        'capability_type'       => 'page',
    );
    register_post_type( 'partners', $args );

}
add_action( 'init', 'partners', 1 );

// Register Custom Taxonomy
function regio_partners() {

    $labels = array(
        'name'                       => _x( 'Regio', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Regio', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Regio', 'text_domain' ),
        'all_items'                  => __( 'All Items', 'text_domain' ),
        'parent_item'                => __( 'Parent Item', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
        'new_item_name'              => __( 'New Item Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Item', 'text_domain' ),
        'edit_item'                  => __( 'Edit Item', 'text_domain' ),
        'update_item'                => __( 'Update Item', 'text_domain' ),
        'view_item'                  => __( 'View Item', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Items', 'text_domain' ),
        'search_items'               => __( 'Search Items', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No items', 'text_domain' ),
        'items_list'                 => __( 'Items list', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'regio_partners', array( 'partners' ), $args );
}

add_action( 'init', 'regio_partners', 0 );



// Register Custom Taxonomy
function vakgebieden_partners() {

    $labels = array(
        'name'                       => _x( 'Vakgebieden', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Vakgebieden', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Vakgebieden', 'text_domain' ),
        'all_items'                  => __( 'All Items', 'text_domain' ),
        'parent_item'                => __( 'Parent Item', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
        'new_item_name'              => __( 'New Item Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Item', 'text_domain' ),
        'edit_item'                  => __( 'Edit Item', 'text_domain' ),
        'update_item'                => __( 'Update Item', 'text_domain' ),
        'view_item'                  => __( 'View Item', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Items', 'text_domain' ),
        'search_items'               => __( 'Search Items', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No items', 'text_domain' ),
        'items_list'                 => __( 'Items list', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'vakgebieden_partners', array( 'partners' ), $args );

}
add_action( 'init', 'vakgebieden_partners', 0 );

// Register Custom Taxonomy
function ondernemersvaardigheden_partners() {

    $labels = array(
        'name'                       => _x( 'Ondernemersvaardigheden', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Ondernemersvaardigheden', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Ondernemersvaardigheden', 'text_domain' ),
        'all_items'                  => __( 'All Items', 'text_domain' ),
        'parent_item'                => __( 'Parent Item', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
        'new_item_name'              => __( 'New Item Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Item', 'text_domain' ),
        'edit_item'                  => __( 'Edit Item', 'text_domain' ),
        'update_item'                => __( 'Update Item', 'text_domain' ),
        'view_item'                  => __( 'View Item', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Items', 'text_domain' ),
        'search_items'               => __( 'Search Items', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No items', 'text_domain' ),
        'items_list'                 => __( 'Items list', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'ondernemersvaardigheden_partners', array( 'partners' ), $args );

}
add_action( 'init', 'ondernemersvaardigheden_partners', 0 );

// Register Custom Taxonomy
function duur_van_opleiding() {

    $labels = array(
        'name'                       => _x( 'Duur van opleiding', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Duur van opleiding', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Duur van opleiding', 'text_domain' ),
        'all_items'                  => __( 'Duur van opleiding', 'text_domain' ),
        'parent_item'                => __( 'Parent Item', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
        'new_item_name'              => __( 'Duur van opleiding', 'text_domain' ),
        'add_new_item'               => __( 'Duur van opleiding', 'text_domain' ),
        'edit_item'                  => __( 'Edit Item', 'text_domain' ),
        'update_item'                => __( 'Update Item', 'text_domain' ),
        'view_item'                  => __( 'View Item', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Items', 'text_domain' ),
        'search_items'               => __( 'Search Items', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
        'no_terms'                   => __( 'No items', 'text_domain' ),
        'items_list'                 => __( 'Items list', 'text_domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'duur_van_opleiding', array( 'partners' ), $args );

}
add_action( 'init', 'duur_van_opleiding', 0 );


// Register Custom Post Type
function agenda() {

    $labels = array(
        'name'                  => _x( 'Agenda', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Agenda', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Agenda', 'text_domain' ),
        'name_admin_bar'        => __( 'Agenda', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Items', 'text_domain' ),
        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Agenda', 'text_domain' ),
        'description'           => __( 'Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'agenda', $args );

}
add_action( 'init', 'agenda', 2 );




// Register Custom Post Type
function ervaringen() {

    $labels = array(
        'name'                  => _x( 'Ervaringen', 'Post Type General Name', 'Ervaringen' ),
        'singular_name'         => _x( 'Ervaringen', 'Post Type Singular Name', 'Ervaringen' ),
        'menu_name'             => __( 'Ervaringen', 'Ervaringen' ),
        'name_admin_bar'        => __( 'Ervaringen', 'Ervaringen' ),
        'archives'              => __( 'Item Archives', 'Ervaringen' ),
        'attributes'            => __( 'Item Attributes', 'Ervaringen' ),
        'parent_item_colon'     => __( 'Parent Item:', 'Ervaringen' ),
        'all_items'             => __( 'All Items', 'Ervaringen' ),
        'add_new_item'          => __( 'Add New Item', 'Ervaringen' ),
        'add_new'               => __( 'Add New Ervaringen', 'Ervaringen' ),
        'new_item'              => __( 'New Ervaringen', 'Ervaringen' ),
        'edit_item'             => __( 'Edit Item', 'Ervaringen' ),
        'update_item'           => __( 'Update Item', 'Ervaringen' ),
        'view_item'             => __( 'View Item', 'Ervaringen' ),
        'view_items'            => __( 'View Items', 'Ervaringen' ),
        'search_items'          => __( 'Search Item', 'Ervaringen' ),
        'not_found'             => __( 'Not found', 'Ervaringen' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'Ervaringen' ),
        'featured_image'        => __( 'Featured Image', 'Ervaringen' ),
        'set_featured_image'    => __( 'Set featured image', 'Ervaringen' ),
        'remove_featured_image' => __( 'Remove featured image', 'Ervaringen' ),
        'use_featured_image'    => __( 'Use as featured image', 'Ervaringen' ),
        'insert_into_item'      => __( 'Insert into item', 'Ervaringen' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'Ervaringen' ),
        'items_list'            => __( 'Items list', 'Ervaringen' ),
        'items_list_navigation' => __( 'Items list navigation', 'Ervaringen' ),
        'filter_items_list'     => __( 'Filter items list', 'Ervaringen' ),
    );
    $args = array(
        'label'                 => __( 'Ervaringen', 'Ervaringen' ),
        'description'           => __( 'Ervaringen', 'Ervaringen' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'ervaringen', $args );

}
//add_action( 'init', 'ervaringen', 3 );


// Register Custom Post Type
function adviseurs() {

    $labels = array(
        'name'                  => _x( 'Adviseurs', 'Post Type General Name', 'Adviseurs' ),
        'singular_name'         => _x( 'Adviseurs', 'Post Type Singular Name', 'Adviseurs' ),
        'menu_name'             => __( 'Adviseurs', 'Adviseurs' ),
        'name_admin_bar'        => __( 'Adviseurs', 'Adviseurs' ),
        'archives'              => __( 'Item Archives', 'Adviseurs' ),
        'attributes'            => __( 'Item Attributes', 'Adviseurs' ),
        'parent_item_colon'     => __( 'Parent Item:', 'Adviseurs' ),
        'all_items'             => __( 'All Items', 'Adviseurs' ),
        'add_new_item'          => __( 'Add New Item', 'Adviseurs' ),
        'add_new'               => __( 'Add New Adviseurs', 'Adviseurs' ),
        'new_item'              => __( 'New Adviseurs', 'Adviseurs' ),
        'edit_item'             => __( 'Edit Item', 'Adviseurs' ),
        'update_item'           => __( 'Update Item', 'Adviseurs' ),
        'view_item'             => __( 'View Item', 'Adviseurs' ),
        'view_items'            => __( 'View Items', 'Adviseurs' ),
        'search_items'          => __( 'Search Item', 'Adviseurs' ),
        'not_found'             => __( 'Not found', 'Adviseurs' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'Adviseurs' ),
        'featured_image'        => __( 'Featured Image', 'Adviseurs' ),
        'set_featured_image'    => __( 'Set featured image', 'Adviseurs' ),
        'remove_featured_image' => __( 'Remove featured image', 'Adviseurs' ),
        'use_featured_image'    => __( 'Use as featured image', 'Adviseurs' ),
        'insert_into_item'      => __( 'Insert into item', 'Adviseurs' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'Adviseurs' ),
        'items_list'            => __( 'Items list', 'Adviseurs' ),
        'items_list_navigation' => __( 'Items list navigation', 'Adviseurs' ),
        'filter_items_list'     => __( 'Filter items list', 'Adviseurs' ),
    );
    $args = array(
        'label'                 => __( 'Adviseurs', 'Adviseurs' ),
        'description'           => __( 'Adviseurs', 'Adviseurs' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'adviseurs', $args );

}
//add_action( 'init', 'adviseurs', 4);







add_filter( 'gform_pre_render', 'populate_choices' );

add_filter( 'gform_pre_validation', 'populate_choices' );

add_filter( 'gform_admin_pre_render', 'populate_choices' );

add_filter( 'gform_pre_submission_filter', 'populate_choices' );

function populate_choices( $form ) {

    //only populating drop down for form id 5
    if ( $form['id'] != 4 ) {
        return $form;
    }

    $args = array(
        'post_type' => 'coaches',
        'posts_per_page' => -1
    );

    $the_query = new WP_Query( $args );



    if ( have_posts() ) {

        $items = array();
        $items[] = array( 'text' => '', 'value' => '' );

        while ( $the_query->have_posts() ) {
            $the_query->the_post();

            $items[] = array( 'value' => get_the_ID(), 'text' => get_the_title() );

        }

        foreach ( $form['fields'] as &$field ) {

            if ( $field->id == 8 ) {
                $field->choices = $items;
                $field->choices[0]['text'] = 'Kies een naam';
                $field->choices[0]['value'] = 'Kies een naam';
            }
        }

    }

    return $form;
}
add_action('gform_after_submission', 'endo_add_entry_to_db', 10, 2);
function endo_add_entry_to_db($entry, $form) {

    // uncomment to see the entry object

     if( $entry['form_id'] == 4 ){
         $name = $entry[2];
         $title = $entry[3];
         $rating = $entry[5];
         $content = $entry[1];
         $category = $entry[7];
         $post_id = $entry[8];


         global $wpdb;

         $wpdb->insert(
             'wp_richreviews',
             array(
                 'reviewer_name' => $name,
                 'review_title' => $title,
                 'review_rating' => $rating,
                 'review_text' => $content,
                 'review_category' => $category,
                 'post_id' => $post_id,
                 'date_time' => current_time( 'mysql' )
             )
         );

     }

    if( $entry['form_id'] == 6 ){

        $title = $entry[1];
        $company = $entry[2];
        $website = $entry[3];
        $linkedin = $entry[4];
        $knowledge = $entry[5];
        $content = $entry[7];
        $image = $entry[8];

        $fom_post_id = $entry['post_id'];


        global $wpdb;

        $results = $wpdb->get_results( 'SELECT ID FROM wp_posts ORDER BY ID DESC LIMIT 1', OBJECT );
        $new_id = $results[0]->ID;

        $post_name = sanitize_title($title);


        $my_post = array(
            'post_title' => wp_strip_all_tags($title),
            'post_name' => $post_name,
            'post_content' => $content,
            'post_status' => 'draft',
            'post_type' => 'coaches',
            'post_parent' => 0,
            'ID' => $fom_post_id,
            'post_date_gmt' => current_time( 'mysql' )
        );

        wp_insert_post( $my_post );


        $wpdb->insert(
            'wp_postmeta',
            array(
                'post_id' => $fom_post_id,
                'meta_key' => '_thumbnail_id',
                'meta_value' => $fom_post_id + 1
            )

        );

        $wpdb->insert(
            'wp_postmeta',
            array(
                'post_id' => $fom_post_id,
                'meta_key' => 'website',
                'meta_value' => $website
            )

        );

        $wpdb->insert(
            'wp_postmeta',
            array(
                'post_id' => $fom_post_id,
                'meta_key' => '_website',
                'meta_value' => 'field_58da5fbed7aba'
            )

        );

        $wpdb->insert(
            'wp_postmeta',
            array(
                'post_id' => $fom_post_id,
                'meta_key' => 'linkedin',
                'meta_value' => $linkedin
            )

        );

        $wpdb->insert(
            'wp_postmeta',
            array(
                'post_id' => $fom_post_id,
                'meta_key' => '_linkedin',
                'meta_value' => 'field_58da5fdcd7abb'
            )

        );

        $wpdb->insert(
            'wp_postmeta',
            array(
                'post_id' => $fom_post_id,
                'meta_key' => 'company_name',
                'meta_value' => $company
            )

        );

        $wpdb->insert(
            'wp_postmeta',
            array(
                'post_id' => $fom_post_id,
                'meta_key' => '_company_name',
                'meta_value' => 'field_58da5f46d7ab7'
            )

        );


        $knowledge = unserialize($knowledge);
        $index = 0;
        foreach( $knowledge as $item ){

            $wpdb->insert(
                'wp_postmeta',
                array(
                    'post_id' => $fom_post_id,
                    'meta_key' => 'knowledge_'.$index.'_title',
                    'meta_value' => $item
                )
            );

            $wpdb->insert(
                'wp_postmeta',
                array(
                    'post_id' => $fom_post_id,
                    'meta_key' => '_knowledge_'.$index.'_title',
                    'meta_value' => 'field_58da5fadd7ab9'
                )
            );
            $index++;
        }

        $wpdb->insert(
            'wp_postmeta',
            array(
                'post_id' => $fom_post_id,
                'meta_key' => 'knowledge',
                'meta_value' => count($knowledge)
            )
        );

        $wpdb->insert(
            'wp_postmeta',
            array(
                'post_id' => $fom_post_id,
                'meta_key' => '_knowledge',
                'meta_value' => 'field_58da5f75d7ab8'
            )
        );
    }
    return $form;
}

add_filter( 'gform_pre_send_email', 'before_email' );
function before_email( $email ) {
    //cancel sending emails

    if(strpos($email['message'], 'http://www.ikstartsmart.nl/intakeformulier/?naam=')) {
        $email['message'] = str_replace('+','%2B', $email['message']);
        $email['message'] = str_replace(' ', '%20', $email['message']);
    }

    return $email;
}



function facebookShareLink($post_id){
    $url = get_permalink($post_id);
    $link = '<a class="facebook" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;" title="Share to Facebook" href="http://www.facebook.com/sharer.php?u='.$url.'" rel="nofollow"><i class="fa fa-facebook"></i></a>';
    return $link;
}
function googleplusShareLink($post_id){
    $url = get_permalink($post_id);
    $link = '<a class="google-plus" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;" title="Share to Google Plus" href="https://plus.google.com/share?url='.$url.'" rel="nofollow"><i class="fa fa-google-plus"></i></a>';
    return $link;
}
function linkedInShareLink($post_id){
    $url = get_permalink($post_id);
    $link = '<a class="linkedin" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;" title="Share to LinkedIn" href="http://www.linkedin.com/shareArticle?mini=true&url='.$url.'" rel="nofollow"><i class="fa fa-linkedin"></i></a>';
    return $link;
}
function twitterShareLink($post_id){
    $url = get_permalink($post_id);
    $link = '<a class="twitter" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;" title="Share to Twitter" href="http://twitter.com/share?text='.get_the_title($post_id).'&amp;url='.$url.'" rel="nofollow"><i class="fa fa-twitter"></i></a>';
    return $link;
}
function pinterestShareLink($post_id){
    $url = get_permalink($post_id);
    $post_thumbnail_id = get_post_thumbnail_id( $post_id );
    $thumbnail_url = wp_get_attachment_thumb_url( $post_thumbnail_id );
    $link = '<a class="pinterest" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;" title="Share to Pinterest" href="http://pinterest.com/pin/create/bookmarklet/?url='.$url.'&amp;media='.$thumbnail_url.'&amp;description='.get_the_title($post_id).'" rel="nofollow"><i class="fa fa-pinterest-p"></i></a>';
    return $link;
}
function mailShareLink(){
    $url = get_permalink(25);
    $link = '<a href="'.$url.'"><i class="fa fa-pinterest-p"></i></a>';
    return $link;
}

function getSocialIcons($atts){
    ob_start(); ?>
    <div class="socialIcons">
        <?php
        $post_id = get_the_ID();
        echo facebookShareLink($post_id);
        echo twitterShareLink($post_id);
        echo linkedInShareLink($post_id);
        ?>
    </div>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

add_shortcode('social_icons', 'getSocialIcons');
?>