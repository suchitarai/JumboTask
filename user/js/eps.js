

    $(document).ready(function() {

                        $(".offer-modal").delay(2000).fadeIn("slow", function() {
                            $("div", this).fadeIn("slow");
                            $("div", this).addClass("swing");

                        });

                  
	
		  $(".offer-modal-close").bind("click", function() {
        $(".offer-modal div").addClass("zoomOutDown");
        setTimeout(function() {
            $(".offer-modal").fadeOut("slow", function() {
                $(this).css({
                    "display": "none"
                });
            })
        }, 1000);
    });

    $('.modal-popupbutton').bind("click",function () {

        if( validateEmail(jQuery("#esp_email").val()) == true && jQuery("#esp_email").val() != "") {
            
            $(".offer-modal div").addClass("zoomOutDown");
            setTimeout(function() {
                $(".offer-modal").fadeOut("slow", function() {
                    $(this).css({
                        "display": "none"
                    });
                })
            }, 1000);

        }
    });

});