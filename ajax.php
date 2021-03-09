<?php
$test_ajax = new test_ajax();
class test_ajax
{

	//~~~~~
	public function __construct ()
	{
		$this->addWPActions();
	}


	function addWPActions()
	{

		// Save the color
        add_action( 'wp_ajax_save_color', array($this, 'save_color' ));

	}


    public function save_color()
    {



        $color = sanitize_text_field($_POST['color']);
        $film = sanitize_text_field($_POST['film']);



        // TO DO save the colour and film to user options

        // To do save the favourite film

        $user_id = get_current_user_id();

     


        $meta_color_key = 'my_favourite_color';

        $fav_color = get_user_option( $meta_color_key , $user_id );

        if($fav_color === false){

            add_user_meta(  $user_id, $meta_color_key,$color , true);

        }else{

            update_user_meta( $user_id, $meta_color_key,$color );

        }
       

        $meta_film_key = 'my_favourite_film';

        $fav_color = get_user_option( $meta_film_key , $user_id );

        if($fav_color === false){

            add_user_meta(  $user_id, $meta_film_key,$film , true);

        }else{

            update_user_meta( $user_id, $meta_film_key,$film );

        }

        echo $color.' and '. $film .' have been saved';

        die();

    }

} // End Class
?>
