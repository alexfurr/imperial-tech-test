<?php
// Loads the CSS, JS files and registers the shortcode

new init();
class init
{



    //~~~~~
    function __construct ()
    {
        $this->wp_actions();
    }


    function wp_actions ()
	{
        // Enqueue scripts and styles
        add_action( 'wp_enqueue_scripts', array( $this, 'load_scripts' ), 1 );

        // Register shortcode
        add_shortcode( 'test-shortcode', array( $this, 'draw_user_prefs' ) );
	}



	function load_scripts ()
	{
		//Load jQuery
		wp_enqueue_script('jquery');

		// Load styles
		wp_enqueue_style( 'imperial-test-style', TEST_PLUGIN_URL . '/styles.css' );

        //Load  JS
        wp_enqueue_script('imperial-test-script', TEST_PLUGIN_URL. '/scripts.js', array( 'jquery' ) );

        //Localise the JS file and add security params
        $params = array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
        );

        wp_localize_script( 'imperial-test-script', 'ajax_params', $params );

	}

    public static function draw_user_prefs()
    {
        $html = '';

        $html.='<div id="color_select_wrap">';

        // Get the user prefs from the options
        $fav_color = get_user_option( 'my_favourite_color', get_current_user_id() );

        if(!$fav_color)
        {
            $fav_color = 'Not yet saved';
        }

        $fav_film = get_user_option( 'my_favourite_film', get_current_user_id() );

        if(!$fav_film)
        {
            $fav_film = 'Not yet saved';
        }

        $html.='<h3>Please select your favourite colour</h3>';

        $html.='<p >Color : <span class="current_film">'.$fav_color.'</span></p>';
        $html.='<p >Film : <span class="current_color">'.$fav_film.'</span></p>';

        $color_options = self::get_colors();
        $html.='<div class="color-picker-wrap">';
        foreach ($color_options as $this_color)
        {
            $html.='<div class="color-item '.(($fav_color==$this_color)?'selected-color':'').'" data-color="'.$this_color.'" style="background:'.$this_color.'"></div>';
        }
        $html.='</div>';

        // Have hidden input of the last button that was clicked
        $html.='<input type="hidden" id="last_clicked_color" value="'.$fav_color.'" />';

        // The input for the film
        $html.='<h3>Please enter your favourite film</h3>';
        $html.='<input type="text" value"" name="film" id="film" />';

        // The save button - only show if the colour has been clicked
        $html.='<div id="color_save_button_wrap">';
        $html.='<button id="save_color">Save this information</button>';
        $html.='</div>';


        // The feedback
        $html.='<div class="feedback_message"></div>';

        $html.='</div>';


        return $html;

    }

    static function get_colors()
    {
        $colors = array(
            "red",
            "blue",
            "green",
            "pink",
            "yellow",
        );
        return $colors;
    }


}


?>
