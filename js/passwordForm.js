$(document).ready(function(){
    var mdpActuelOk;
    var mdpNouveau1Ok;
    var mdpNouveau2Ok;
    
    $("#mauvaisMdp-password").hide();
    $("#mdpError-password").hide();
    $("#mdpEqualityError-password").hide();
    
    $("#mdpActuel").keyup(function() {
        var mdpSaisi = $("#mdpActuel").val();
        $.post("utilities/testPassword-updatePassword.php", {password: mdpSaisi}, function(rep) {
            if (rep == "0"){//mauvais mot de passe
                if (mdpSaisi.length == 0){
                    $("#mdpActuel").css('background-color','rgb(242, 242, 242)');
                    $("#mauvaisMdp-password").hide();
                }
                else if (mdpSaisi.length < 6){
                    $("#mdpActuel").css('background-color','#fba');
                    $("#mauvaisMdp-password").hide();
                }
                else{
                    $("#mdpActuel").css('background-color','#fba');
                    $("#mauvaisMdp-password").show();
                }
                mdpActuelOk = false;
            }
            else{
                $("#mdpActuel").css('background-color','rgb(242, 242, 242)');
                $("#mauvaisMdp-password").hide();
                mdpActuelOk = true;
            }
        });
    });
    
    $("#mdpNouveau1").keyup(function() {
        var mdpSaisi = $("#mdpNouveau1").val();
        if (mdpSaisi.length > 0 && mdpSaisi.length < 6){
            $("#mdpError-password").show();
            $("#mdpNouveau1").css('background-color','#fba');
            mdpNouveau1Ok = false;
        }
        else if(mdpSaisi.length == 0){
            $("#mdpError-password").hide();
            $("#mdpNouveau1").css('background-color','rgb(242, 242, 242)');
            mdpNouveau1Ok = false;
        }
        else{
            $("#mdpError-password").hide();
            $("#mdpNouveau1").css('background-color','rgb(242, 242, 242)');
            mdpNouveau1Ok = true;
        }
    });
    
    $("#mdpNouveau2").keyup(function() {
        var mdp1 = $("#mdpNouveau1").val();
        var mdp2 = $("#mdpNouveau2").val();
        if (mdp2.length == 0){
            $("#mdpEqualityError-password").hide();
            $("#mdpNouveau2").css('background-color','rgb(242, 242, 242)');
            mdpNouveau2Ok = false;
        }
        else if (mdp2.length < 6){
            $("#mdpEqualityError-password").hide();
            $("#mdpNouveau2").css('background-color','#fba');
            mdpNouveau2Ok = false;
        }
        else if (mdp1 != mdp2){
            $("#mdpEqualityError-password").show();
            $("#mdpNouveau2").css('background-color','#fba');
            mdpNouveau2Ok = false;
        }
        else {
            $("#mdpEqualityError-password").hide();
            $("#mdpNouveau2").css('background-color','rgb(242, 242, 242)');
            mdpNouveau2Ok = true;
            if (mdpActuelOk && mdpNouveau1Ok && mdpNouveau2Ok){
                alert("mdpActuelOk="+ mdpActuelOk+ ", mdpNouveau1Ok="+ mdpNouveau1Ok+ ", mdpNouveau2Ok="+ mdpNouveau2Ok);
            }
        }
    });
    
    $("#mdpForm").submit(function(event) {
        if (mdpActuelOk && mdpNouveau1Ok && mdpNouveau2Ok){
            alert("Votre mot de passe a été modifié");
            return;
        }
        if (!mdpActuelOk){
            alert("Mauvais mot de passe actuel");
        }
        else{
            alert("Mauvais nouveau mot de passe");
        }
        event.preventDefault();
    });
    
});