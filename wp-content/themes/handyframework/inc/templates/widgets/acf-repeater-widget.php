<?php 

// Creating the widget 
class b4u_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'b4u_widget', 

// Widget name will appear in UI
__('Repeater Widget', 'best4u'), 

// Widget description
array( 'description' => __( 'Repeater widget based on ACF. Go to theme folder/inc/templates/widgets/acf-repeater-widget.php to edit the looks of it.', 'best4u' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$wid = $args['widget_id']; // WIDGET ID
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
?>

<?php if( have_rows('repeater_field_name','widget_'.$wid) ): ?>
<?php while( have_rows('repeater_field_name','widget_'.$wid) ): the_row(); ?>
	<!-- Display sub fields -->
<?php endwhile; ?>
<?php endif; ?>



<?php 
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'best4u' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class b4u_widget ends here

// Register and load the widget
function b4u_load_widget() {
	register_widget( 'b4u_widget' );
}
add_action( 'widgets_init', 'b4u_load_widget' );