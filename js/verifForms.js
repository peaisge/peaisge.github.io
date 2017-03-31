$(document).ready(function() {
    
    var loginConnexionOk, passwordOk;
    loginConnexionOk = false;
    passwordOk = false;
    
    $("#loginNonVu").hide();
    $("#mauvaisMdp").hide();
    
    $("#login-connexion").keyup(function() {
        var loginSaisi = $("#login-connexion").val();
        $.post("utilities/testUser.php", {login: loginSaisi}, function(rep) {
            if (rep == "0"){//login inexistant
                $("#login-connexion").css('background-color','#fba');
                $("#loginNonVu").show();
                loginConnexionOk = false;
            }
            else {//login utilisé
                $("#login-connexion").css('background-color','rgb(242, 242, 242)');
                $("#loginNonVu").hide();
                loginConnexionOk = true;
            }
        });
    });
    
    $("password").keyup(function() {
        var loginSaisi = $("#login-connexion").val();
        var passwordSaisi = $("#password").val();
        $.post("utilities/testPassword.php", {login: loginSaisi, password: passwordSaisi}, function(rep) {
            if (rep == "0"){//mauvais mot de passe
               $("#password").css('background-color','#fba'); 
               $("mauvaisMdp").show();
               passwordOk = false;
            }
            else{
               $("#password").css('background-color','rgb(242, 242, 242)');
               $("mauvaisMdp").hide();
               passwordOk = true;
            }
        });
    });
    
    $("#loginForm").submit(function(event) {
        if (loginConnexionOk && passwordOk){
            alert("Vous êtes maintenant connecté");
            return;
        }
        alert("Login ou mot de passe erroné");
        event.preventDefault();
    });    
    
    var loginOk, emailOk, prenomOk, nomOk, dateOk, telOk, password1Ok, password2Ok;
    loginOk = false;
    emailOk = false;
    prenomOk = false;
    nomOk = false;
    dateOk = false;
    telOk = true;
    password1Ok = false;
    password2Ok = false;
    
    $("#loginVu").hide();
    $("#dateError").hide();
    $("#telError").hide();
    $("#mdpError").hide();
    $("#mdpEqualityError").hide();
    
    /*$(".lien").click(function() {
        var lien = "content/content_" + $(this).attr("id") + ".php";
        var nomUtilisateur = $("#nom").val();
        $.post(lien, {nom: nomUtilisateur},function(rep){
        	$("#main").html(rep);
        });
    });
    */

    $("#login").keyup(function() {
        var loginSaisi = $("#login").val();
        $.post("utilities/testUser.php", {login: loginSaisi}, function(rep) {
            if (rep == "1"){//login utilisé
                $("#login").css('background-color','#fba');
                $("#loginVu").show();
                loginOk = false;
            }
            else {//login non utilisé
                $("#loginVu").hide();
                if (loginSaisi.length == 1 || loginSaisi.length > 30){
                    $("#login").css('background-color','#fba');
                    loginOk = false;
                }
                else if (loginSaisi.length == 0){
                    $("#login").css('background-color','rgb(242, 242, 242)');
                    loginOk = false;
                }
                else{
                    $("#login").css('background-color','rgb(242, 242, 242)');
                    loginOk = true;
                    if (loginOk && emailOk && prenomOk && nomOk && dateOk && telOk && password1Ok && password2Ok){
                        $("#register").prop('disabled', false);
                    }
                } 
            }
        });
    });
    
    $("#email").keyup(function() {
        var emailSaisi = $("#email").val();
        var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
        if (emailSaisi.length > 0 && !regex.test(emailSaisi)){
            $("#email").css('background-color','#fba');
            emailOk = false;
        }
        else if (emailSaisi.length == 0){
            $("#email").css('background-color','rgb(242, 242, 242)');
            emailOk = false;
        }
        else{
            $("#email").css('background-color','rgb(242, 242, 242)');
            emailOk = true;
            if (loginOk && emailOk && prenomOk && nomOk && dateOk && telOk && password1Ok && password2Ok){
                $("#register").prop('disabled', false);
            }
       }
    });
    
    $("#prenom").keyup(function() {
        var prenomSaisi = $("#prenom").val();
        var regex = /^([A-zÀ-ÿ]+(( |')[a-zà-ÿ]+)*)+([-]([A-zÀ-ÿ]+(( |')[a-zà-ÿ]+)*)+)*$/;    
        if (prenomSaisi.length > 1 && !regex.test(prenomSaisi) || prenomSaisi.length == 1){
            $("#prenom").css('background-color','#fba');
            prenomOk = false;
        }
        else if(prenomSaisi.length === 0){
            $("#prenom").css('background-color','rgb(242, 242, 242)');
            prenomOk = false;
        }
        else{
            $("#prenom").css('background-color','rgb(242, 242, 242)');
            prenomOk = true;
            if (loginOk && emailOk && prenomOk && nomOk && dateOk && telOk && password1Ok && password2Ok){
                $("#register").prop('disabled', false);
            }
        }
    });

    $("#nom").keyup(function() {
        var nomSaisi = $("#nom").val();
        var regex = /^([A-zÀ-ÿ]+(( |')[a-zà-ÿ]+)*)+([-]([A-zÀ-ÿ]+(( |')[a-zà-ÿ]+)*)+)*$/;    
        if (nomSaisi.length > 1 && !regex.test(nomSaisi) || nomSaisi.length == 1){
            $("#nom").css('background-color','#fba');
            nomOk = false;
        }
        else if(nomSaisi.length === 0){
            $("#nom").css('background-color','rgb(242, 242, 242)');
            nomOk = false;
        }
        else{
            $("#nom").css('background-color','rgb(242, 242, 242)');
            nomOk = true;
            if (loginOk && emailOk && prenomOk && nomOk && dateOk && telOk && password1Ok && password2Ok){
                $("#register").prop('disabled', false);
            }
        }
    });
    
    $("#date").keyup(function() {
        var dateSaisie = $("#date").val();
        var a = dateSaisie.substring(0,4);
        var m = dateSaisie.substring(5,7);
        var j = dateSaisie.substring(8,10);
        if (dateSaisie.length > 0 && (isNaN(j)|| j<1 || j>31 || 
                isNaN(m) || m<1 || m>12 || isNaN(a) || a<1900 || a>2017)){
            $("#dateError").show();
            $("#date").css('background-color','#fba');
            dateOk = false;
        }
        else if (dateSaisie.length == 0){
            $("#dateError").hide();
            $("#date").css('background-color','rgb(242, 242, 242)');
            dateOk = false;
        }
        else{
            var date2 = new Date(a, m-1, j);
            var j2 = date2.getDate();
            var m2 = date2.getMonth() + 1;
            var a2 = date2.getFullYear();
            if (a2 <= 100){
                a2 = 1900 + a2;
            }
            if (j!=j2 || m!=m2 || a!=a2){
                $("#dateError").show();
                $("#date").css('background-color','#fba');
                dateOk = false;
            }
            else {
                $("#dateError").hide();
                $("#date").css('background-color','rgb(242, 242, 242)');
                dateOk = true;
                if (loginOk && emailOk && prenomOk && nomOk && dateOk && telOk && password1Ok && password2Ok){
                    $("#register").prop('disabled', false);
                }
        }
        }
    });

    $("#tel").keyup(function() {
        var telSaisi = $("#tel").val();
        var regex = /(\+\d+(\s|-))?0\d(\s|-)?(\d{2}(\s|-)?){4}/;
        if (telSaisi.length > 0 && !regex.test(telSaisi)){
            $("#telError").show();
            $("#tel").css('background-color','#fba');
            telOk = false;
        }
        else if(telSaisi.length == 0){
            $("#telError").hide();
            $("#tel").css('background-color','rgb(242, 242, 242)');
            telOk = true;
            if (loginOk && emailOk && prenomOk && nomOk && dateOk && telOk && password1Ok && password2Ok){
                $("#register").prop('disabled', false);
            }
        }
        else{
            $("#telError").hide();
            $("#tel").css('background-color','rgb(242, 242, 242)');
            telOk = true;
            if (loginOk && emailOk && prenomOk && nomOk && dateOk && telOk && password1Ok && password2Ok){
                $("#register").prop('disabled', false);
            }
        }
    });
    
    $("#password1").keyup(function() {
        var passwordSaisi = $("#password1").val();
        if (passwordSaisi.length > 0 && passwordSaisi.length < 6){
            $("#mdpError").show();
            $("#password1").css('background-color','#fba');
            password1Ok = false;
        }
        else if(passwordSaisi.length == 0){
            $("#mdpError").hide();
            $("#password1").css('background-color','rgb(242, 242, 242)');
            password1Ok = false;
        }
        else{
            $("#mdpError").hide();
            $("#password1").css('background-color','rgb(242, 242, 242)');
            password1Ok = true;
            if (loginOk && emailOk && prenomOk && nomOk && dateOk && telOk && password1Ok && password2Ok){
                $("#register").prop('disabled', false);
            }
        }
    });
    
    $("#password2").keyup(function() {
        var mdp1 = $("#password1").val();
        var mdp2 = $("#password2").val();
        if (mdp2.length == 0){
            $("#mdpEqualityError").hide();
            $("#password2").css('background-color','rgb(242, 242, 242)');
            password2Ok = false;
        }
        else if (mdp2.length < 6){
            $("#mdpEqualityError").hide();
            $("#password2").css('background-color','#fba');
            password2Ok = false;
        }
        else if (mdp1 != mdp2){
            $("#mdpEqualityError").show();
            $("#password2").css('background-color','#fba');
            password2Ok = false;
        }
        else {
            $("#mdpEqualityError").hide();
            $("#password2").css('background-color','rgb(242, 242, 242)');
            password2Ok = true;
            if (loginOk && emailOk && prenomOk && nomOk && dateOk && telOk && password1Ok && password2Ok){
                alert("loginOk="+ loginOk+ ", emailOk="+ emailOk+ ", prenomOk="+ prenomOk+ ", nomOk="+ nomOk+ ", dateOk="+ dateOk+ ", telOk="+ telOk+ ", password1Ok="+ password1Ok+ ",password2Ok="+ password2Ok);
                $("#register").prop('disabled', false); 
            }
        }
    });
    
    $("#registerForm").submit(function(event) {
        if (loginOk && emailOk && prenomOk && nomOk && dateOk && telOk && password1Ok && password2Ok){
            alert("Votre compte a été créé, vous pouvez maintenant vous connecter");
            return;
        }
        alert("Veuillez remplir correctement tous les champs");
        event.preventDefault();
    });
    
    /*function verifRegisterForm(){
        var bienRempli = loginOk && emailOk && prenomOk && nomOk && dateOk && telOk && password1Ok && password2Ok;
        if (bienRempli){
            alert("Votre compte a été créé, vous pouvez maintenant vous connecter");
            return true;
        }
        else{
            alert("Veuillez remplir correctement tous les champs");
            return false;
        }
    }*/
    
    /*$("#formFilm").submit(function() {
        
        var url = "http://www.omdbapi.com/?t="+$("#titre").val()+"&y=&plot=short&r=json";
        //alert(url);
        $.getJSON(url, function(data) {
            $("#annee").val(data.Year);
            $("#infoFilm").html(data.Plot);
        });
        return false;
    }
    );
    */
   
    /*    $(".lien").click(function(){
     
     //$("#main").load("content/content_"+$(this).attr('id')+".php");
     $.post("content/content_"+$(this).attr('id')+".php",{id:45,toto:'Olivier'},function(rep){
     $("#main").html(rep);//colle la réponse dans le div d'id main
     });
     window.location.hash = $(this).attr('id');
     return false;
     });
     
     
     $("#login").keyup(function(){
     var loginX = $("#login").val(); 
     $.post("scripts/testUser.php",{login:loginX},function(rep){
     if(rep=="0"){//login OK
     $("#login").css("background-color","green");
     }else{
     $("#login").css("background-color","red");               
     }
     });
     });
     */
});

function surligne(champ, erreur){
    if (erreur){
        champ.style.backgroundColor = "#fba";
    }
    else
        champ.style.backgroundColor = "";
}

