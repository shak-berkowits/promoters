// JavaScript Document
$(document).ready(function() {

    "use strict";
    
    $(".request-form").submit(function(e) {
        e.preventDefault();
        var name = $(".name");
        var email = $(".email");
        var phone = $(".phone");
        var flag = false;
        if (name.val() == "") {
            name.closest(".form-control").addClass("error");
            name.focus();
            flag = false;
            return false;
        } else {
            name.closest(".form-control").removeClass("error").addClass("success");
        } if (email.val() == "") {
            email.closest(".form-control").addClass("error");
            email.focus();
            flag = false;
            return false;
        } else {
            email.closest(".form-control").removeClass("error").addClass("success");
            flag = true;
        }if (phone.val() == "") {
            phone.closest(".form-control").addClass("error");
            phone.focus();
            flag = false;
            return false;
        } else {
            phone.closest(".form-control").removeClass("error").addClass("success");
            flag = true;
        }
        var dataString = "name=" + name.val() + "&email=" + email.val() + "&phone=" + phone.val();
        $(".loading").fadeIn("slow").html("Loading...");
        $.ajax({
            type: "POST",
            data: dataString,
            url: "php/requestForm.php",
            cache: false,
            success: function (d) {
                $(".form-control").removeClass("success");
					if(d == 'success') // Message Sent? Show the 'Thank You' message and hide the form
						$('.loading').fadeIn('slow').html('<font color="#48af4b">Mail sent Successfully.</font>').delay(3000).fadeOut('slow');
					else
						$('.loading').fadeIn('slow').html('<font color="#ff5607">Mail not sent.</font>').delay(3000).fadeOut('slow');
                        document.requestform.reset(); 
								  }
        });
        return false;
    });

    $("#reset").on('click', function() {
        $(".form-control").removeClass("success").removeClass("error");
    });

    /*----------------------------------------------------*/
    /*  Request Form Validation
    /*----------------------------------------------------*/
    
    $(".request-form").validate({
        rules:{ 
                name:{
                    required: true,
                    minlength: 2,
                    maxlength: 26,
                },
                email:{
                    required: true,
                    email: true,
                    }
                },
                phone:{
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                },
                messages:{
                        name:{
                            required: "Please enter no less than (2) characters"
                        }, 
                        email:{
                            required: "We need your email address to contact you",
                            email: "Your email address must be in the format of name@domain.com"
                        }, 
                        phone:{
                            required: "We need your phone number to contact you",
                            phone: "Your phone number must be of 10 digits only."
                        }, 
                    }
    });
})



