<?php 

function classic_button($atts, $content = null) {
 extract( shortcode_atts( array(
          'url' => '#',
          'title' => '',
//          'icon' => '',
), $atts ) );
return '<a href="'.$url.'" class="button" title="">' . do_shortcode($content) . '</a>';
}
add_shortcode('b4ubutton', 'classic_button');

function classic_button2($atts, $content = null) {
 extract( shortcode_atts( array(
          'url' => '#',
          'title' => '',
), $atts ) );
return '<a href="'.$url.'" class="button-alt" title="'.$title.'">' . do_shortcode($content) . '</a>';
}
add_shortcode('b4ubuttonalt', 'classic_button2');

function lead_text($atts, $content = null) {
return '<p class="lead-text">' . do_shortcode($content) . '</p>';
}
add_shortcode('b4ulead', 'lead_text');

function h1_text($content = null) {

return '<div class="h1">'.do_shortcode($content).'</div>';
}
add_shortcode('b4uh1', 'h1_text');

function h2_text($atts, $content = null) {

return '<div class="h2">' . do_shortcode($content) . '</div>';
}
add_shortcode('b4uh2', 'h2_text');

function h3_text($atts, $content = null) {
return '<div class="h3">' . do_shortcode($content) . '</div>';
}
add_shortcode('b4uh3', 'h3_text');

function h4_text($atts, $content = null) {
return '<div class="h4">' . do_shortcode($content) . '</div>';
}
add_shortcode('b4uh4', 'h4_text');

function h5_text($atts, $content = null) {
return '<div class="h5 hahaha">' . do_shortcode($content) . '</div>';
}
add_shortcode('b4uh5', 'h5_text');


function loopTemplate($template) {
     if ($template != '') {
      $getTemplate = $template;
    } else {
      $getTemplate = 'default';
    }
    ob_start();
      get_template_part('inc/templates/loops/'.$getTemplate);
      $output = ob_get_contents();
      ob_end_clean();
      return $output;
   }


function b4uloop($atts) {

   // EXAMPLE USAGE:
   // [loop the_query="showposts=100&post_type=page&post_parent=453"]
   
   // Defaults
   extract(shortcode_atts(array(
      "the_query" => '',
      "template" => '',
      "pagination" => '',
      "container" => 'true',
   ), $atts));

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
   $the_query = new WP_Query( $the_query.'&paged='.$paged );
if ( $the_query->have_posts() ) :

   while ( $the_query->have_posts() ) : $the_query->the_post(); 
$output = @$output.loopTemplate($template);
  endwhile; 
  if($pagination == 'true'): ?>
 <div class="navHolder">
  <div class="nav-prev">
     <?php previous_posts_link( '&laquo; Vorige' ); ?>
   </div>
   <div class="nav-next">
     <?php next_posts_link( 'Volgende &raquo;', $the_query->max_num_pages ); ?>
   </div>
 </div>
<?php endif;
   wp_reset_postdata(); ?>

<?php else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


 <?php

   return @'<div class="loopHolder">'.$output.'</div>';
   
}
add_shortcode("b4uloop", "b4uloop");



add_action( 'init', 'b4u_tinymce_buttons' );
function b4u_tinymce_buttons() {
    add_filter( "mce_external_plugins", "wptuts_add_buttons" );
    add_filter( 'mce_buttons', 'wptuts_register_buttons' );
}
function wptuts_add_buttons( $plugin_array ) {
    $plugin_array['wptuts'] = get_template_directory_uri() . '/inc/shortcodes/b4u-shortcodes.js';
    return $plugin_array;
}
function wptuts_register_buttons( $buttons ) {
    array_push( $buttons, 'text', '2cols', 'b4ubutton', 'b4ubuttonalt', 'b4ulead' , 'b4uh1', 'b4uh2', 'b4uh3', 'b4uh4', 'b4uh5','b4uloop'); // dropcap', 'recentposts
    return $buttons;
}

