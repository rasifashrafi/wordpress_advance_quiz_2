<?php

/*
Plugin Name: Gretings Widget
Plugin URI: http://wordpress.org/extend/plugins/#
Description: This is an example plugin
Author: Rasif Ashrafi
Version: 1.0.0
Author URI: http://rashrafi.techlaunch.io/Portfolio
*/
$quate = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
 
// Creating the widget 
class wpb_widget extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'wpb_widget', 
 
// Widget name will appear in UI
__('Greetings Widget', 'wpb_widget_domain'), 
 
// Widget description
array( 'description' => __( 'Your Custom Wordpress Widget ', 'wpb_widget_domain' ), ) 
);
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
 
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

$random_notes=array("Each day holds a surprise. But only if we expect it can we see, hear, or feel it when it comes to us. Let's not be afraid to receive each day's surprise, whether it comes to us as sorrow or as joy It will open a new place in our hearts, a place where we can welcome new friends and celebrate more fully our shared humanity."=>"red","A smile is Universal welcome"=>"green","If you would know strength and patience, welcome the company of web."=>"blue","We are open for possibilities. We are open for choices. We are always welcome new ideas. We are always eager to learn. We are never going to close my mind from learning."=>"yellow");
  print_r(array_rand($random_notes ,1));
// This is where you run the code and display the output
echo __( '', 'wpb_widget_domain' );
echo $args['after_widget'];
}
         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
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
} // Class wpb_widget ends here