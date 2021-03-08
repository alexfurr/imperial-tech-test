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

        $color = $_POST['color'];

        // TO DO save the colour and film to user options

        // To do save the favourite film



        echo $color.' has been saved';

        die();

    }

} // End Class
?>
