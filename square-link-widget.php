<?php

class SquareLink_Space_Widget extends WP_Widget
{
    public function SquareLink_Space_Widget()
    {
        parent::__construct(
			'squarelink_widget', // ID
			'Square Link', // Nom
			array( 'description' => 'Insérer un espace Square Link sur votre site', ) // Args
		);
    }
    
    public function widget($args, $instance)
	{
	    echo $args['before_widget'];
	    echo $args['before_title'];
	    echo apply_filters('widget_title', $instance['title']);
	    echo $args['after_title'];
	    echo '<!-- Square Link Ad Slot via Wordpress Plugin -->
<div id="squarelink_'.$instance['ad_slot'].'" class="squarelink_ad"></div>
<script type="text/javascript">
(function() {var a = document.createElement(\'script\'); 
a.type = \'text/javascript\'; a.async = true; 
a.src = \'//app.square-link.com/ad.js\';
var s = document.getElementsByTagName(\'script\')[0]; 
s.parentNode.insertBefore(a, s); })();
</script>';
	    echo $args['after_widget'];
	}

    public function form($instance)
	{
	    $title = isset($instance['title']) ? $instance['title'] : '';
	    $ad_slot = isset($instance['ad_slot']) ? $instance['ad_slot'] : '';
	    ?>
	    <p>
	        <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
	        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo  $title; ?>" />
	        <br/><br/>
	        <label for="<?php echo $this->get_field_name( 'ad_slot' ); ?>">Identifiant de l'espace :</label>
	        <input class="widefat" id="<?php echo $this->get_field_id( 'ad_slot' ); ?>" name="<?php echo $this->get_field_name( 'ad_slot' ); ?>" type="text" value="<?php echo  $ad_slot; ?>" />
	    	<br/>
	    	<a href="https://app.square-link.com/publisher/sites/installation" target="_blank">Comment retrouver l'identifiant de mon espace ?</a>
	    </p>
	    <?php
	}
}

function squarelink_register_widget() {
	register_widget( 'SquareLink_Space_Widget' );
}

add_action( 'widgets_init', 'squarelink_register_widget' );