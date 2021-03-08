// Detect the button click and save via ajax

jQuery(document).ready(function() {


    // Detect if a colour has ben clicked
    jQuery('#color_select_wrap').on( 'click', '.color-item', function ( event ) {

        jQuery('#color_save_button_wrap').show();

        // Add class to the clicked colour
        var target = event.target;
        var color = jQuery( target ).attr('data-color');
        jQuery("#last_clicked_color").val(color);

        jQuery(target).addClass("selected-color");


    });


    // Detect if the save button has been clicked
    jQuery('#save_color').on( 'click', function ( event ) {


        // get the clicked color
        last_clicked_color = jQuery("#last_clicked_color").val();
        console.log(last_clicked_color);

        jQuery.ajax({
            type: 'POST',
            url: ajax_params.ajaxurl,
            data: {
            "action"  : "save_color",
            "color": last_clicked_color,
            },
                success: function(data)
            {
            jQuery("#feedback_message").html(data); // Add the feedback to the feedback div
            }
        });

    });





});
