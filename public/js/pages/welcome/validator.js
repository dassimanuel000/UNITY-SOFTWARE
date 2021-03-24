function include(file) {
    var oScript = document.createElement("script");
    oScript.src = file;
    oScript.type = "text/javascript";
    document.body.appendChild(oScript);
}

// On l'utilise :
include("jquery.min.js");


$(function() {

    $("email_error_message").hide();
    $("email_invalide_error_message").hide();

    var error_message = false;

    $("#email").focusout(function(e) {
        e.preventDefault();
        check_mail();
    });


    function check_mail() {

        //////////////////////////////////////////////////////
        var email = document.getElementById('email');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!filter.test(email.value)) {
            $("#email_invalide_error_message").html("Ceci n'est pas une adresse mail ( @ )");
            $("#email_invalide_error_message").show();
        } else {
            $("#email_invalide_error_message").hide();
        }
        /////////////////////////////////////////////////

        var mail_length = $("#email").val().length;

        if (mail_length < 5 || mail_length > 40) {
            $("#email_error_message").html("mauvais mail");
            $("#email_error_message").show();
            error_mail = true;
        } else {
            $("#email_error_message").hide();
        }

    }


});