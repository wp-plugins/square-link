<?php

class squarelink_space_widget extends WP_Widget
{
    public function squarelink_space_widget()
    {
        parent::__construct(
			'squarelink_widget', // ID
			'Square Link', // Nom
			array( 'description' => 'Insérer un espace Square Link sur votre site', ) // Args
		);
    }
    
    public function widget($args, $instance)
	{
		$api = new squarelink_API();
		$display = $api->getSpace($instance['ad_slot']);

	    echo $args['before_widget'];
	    echo $args['before_title'];
	    echo apply_filters('widget_title', $instance['title']);
	    echo $args['after_title'];
	    echo $display;
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
	        <label for="<?php echo $this->get_field_name( 'ad_slot' ); ?>">Choisissez l'emplacement :</label>
	        <select class="widefat" id="<?php echo $this->get_field_id( 'ad_slot' ); ?>" name="<?php echo $this->get_field_name( 'ad_slot' ); ?>">
		        <?php
		        $spaces = $this->getSpaces();
			   	if(!is_null($spaces)) {
			        foreach ($spaces as $space) {
			            if($ad_slot == $space->token) {
			            	echo "<option selected='selected' data-token='$space->token' value='$space->token'>$space->name ($space->width x $space->height)</option>";
			            } else {
				            echo "<option data-token='$space->token' value='$space->token'>$space->name ($space->width x $space->height)</option>";
				        }
			        }
			    }
		        ?>
		    </select>
	    	<br/>
	    </p>
	    <?php
	}

	private function getSpaces() 
	{
		$api = new squarelink_API();
		$website = $api->getWebsite(get_option('squarelink_setting_siteid'));
		$spaces = $website->spaces;

		return $spaces;
	}
}

function squarelink_register_widget() {
	register_widget( 'squarelink_space_widget' );
}

add_action( 'widgets_init', 'squarelink_register_widget' );