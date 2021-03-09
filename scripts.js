// Detect the button click and save via ajax

jQuery(document).ready(function() {


    // Detect if a colour has ben clicked
    jQuery('#color_select_wrap').on( 'click', '.color-item', function ( event ) {

        jQuery('#color_save_button_wrap').show();

        // Add class to the clicked colour
        var target = event.target;
        var color = jQuery( target ).attr('data-color');
        jQuery("#last_clicked_color").val(color);

        jQuery('.color-item').removeClass("selected-color");
        jQuery(target).addClass("selected-color");


    });


    // Detect if the save button has been clicked
    jQuery('#save_color').on( 'click', function ( event ) {


        // get the clicked color
        last_clicked_color = jQuery("#last_clicked_color").val();
        film = jQuery("#film").val();
        console.log(last_clicked_color);

        jQuery(".feedback_message").html('please wait while we save your information.');

        jQuery('#color_save_button_wrap').hide();

        jQuery.ajax({
            type: 'POST',
            url: ajax_params.ajaxurl,
            data: {
            "action"  : "save_color",
            "color": last_clicked_color,
            "film": film
            },
                success: function(data)
            {
            jQuery('#color_save_button_wrap').show();
             jQuery(".current_color").html(last_clicked_color);  // update current color name
             jQuery(".current_film").html(film); // update current film name
             jQuery(".feedback_message").html(data); // Add the feedback to the feedback div
            },
            error: function(xhr,status,error){
                jQuery('#color_save_button_wrap').show();
                jQuery(".feedback_message").html('Unable to process the request at the moment.'); // Add the feedback to the feedback div
            }
        });

    });





});
