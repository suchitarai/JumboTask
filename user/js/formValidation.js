$(document).ready(function() {

/*-------------Start: login Form validation----------------*/  
$("#login").validate({
    rules: {
      username: {
        required: true
      },
      userpass: {
        required: true
      },   
    },
    messages: {
    
        username: {
        required: "Please Enter User Name."
      },
      userpass:{
        required: "Please Enter Password."
      }
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      error.addClass("text-danger");
      if (element.prop("type") === "checkbox" ) {
        error.insertAfter(element.parent("label"));
      }
    else if ( element.prop("type") === "radio") {
      error.appendTo( element.parents(".radio-parent") );
        //error.insertAfter(element.parent("fieldset"));
      }

    else {
		error.insertAfter(element.parent(".input-group"));
        //error.insertAfter(element);
      }
    },
    highlight: function (element, errorClass, validClass) {
      $(element).parents(".form-input").addClass("has-error").removeClass("has-success");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).parents(".form-input").addClass("has-success").removeClass("has-error");
    },
    submitHandler: function () {
    var formdata=$("#login").serialize();
    $.ajax({
      type: "POST",
      url: '../controller/form_submit.php?method=login',
      data: formdata,
      dataType: 'html',
      cache: false,
      success: function(msg){ 
		var obj = {"message":msg };
		var myJSON = JSON.stringify(obj);
	    alert(myJSON);
		 window.location = 'createuser.php';   
      }
    });
  }

  }); 

/*-------------End: login Form validation----------------*/ 


 
});
