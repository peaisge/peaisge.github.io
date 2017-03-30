$(document).ready(function() {
    var loginOk, emailOk;
    
    $("#loginVu").hide();

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
            if (rep == "1"){
                $("#login").css('background-color','#fba');
                $("#loginVu").show();
                loginOk = false;
            }
            else {//login non utilisé
                if (loginSaisi.length === 1 || loginSaisi.length > 30){
                    $("#login").css('background-color','#fba');
                    loginOk = false;
                }
                else if (loginSaisi.length === 0){
                    $("#login").css('background-color','rgb(242, 242, 242');
                    loginOk = false;
                }
                else{
                    $("#loginVu").hide();
                    $("#login").css('background-color','rgb(242, 242, 242');
                    loginOk = true;
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
    else if(emailSaisi.length == 0){
        $("#email").css('background-color','rgb(242, 242, 242');
        emailOk =  false;
    }
    else{
        $("#email").css('background-color','rgb(242, 242, 242');
        emailOk = true;
   }
    });

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

function verifLogin(champ){
    if (champ.value.length == 1 || champ.value.length > 30){
        surligne(champ, true);
        return false;
    }
    else if(champ.value.length == 0){
        return false;
    }
    else{
        surligne(champ, false);
        return true;
    }
}

function existLogin(champ){
    var loginSaisi = champ.value;
    $.post("utilities/testUser.php", {login: loginSaisi}, function(rep) {
        if (rep == "0") {//login non utilisé
            $("#loginVu").hide();
            surligne(champ, false);
            return true;
        } 
        else {
            $("#loginVu").show();
            surligne(champ, true);
            return false;
        }
    });
}

function verifMail(champ){
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if (champ.value.length > 0 && !regex.test(champ.value)){
        surligne(champ, true);
        return false;
    }
    else if(champ.value.length == 0){
        return false;
    }
    else{
        surligne(champ, false);
        return true;
   }
}

function verifTel(champ){
    var regex = /(\+\d+(\s|-))?0\d(\s|-)?(\d{2}(\s|-)?){4}/;
    var span = document.getElementById("telError");
    if (champ.value.length > 0 && !regex.test(champ.value)){
        surligne(champ, true);
        if (span.style.display == "none"){
            span.style.display = "block";
        }
        return false;
    }
    else{
        surligne(champ, false);
        if (span.style.display == "block"){
            span.style.display = "none";
        }
        return true;        
    }
}

function verifNames(champ){
    var regex = /^([A-zÀ-ÿ]+(( |')[a-zà-ÿ]+)*)+([-]([A-zÀ-ÿ]+(( |')[a-zà-ÿ]+)*)+)*$/;
    if (!regex.test(champ.value) || champ.value.length < 2){
        surligne(champ, true);
        return false;
    }
    else if(champ.value.length == 0){
        return false;
    }
    else{
        surligne(champ, false);
        return true;
    }
}

function verifDate(champ){
    var divDate = document.getElementById("dateError");
    var date = champ.value;
    var a = date.substring(0,4);
    var m = date.substring(5,7);
    var j = date.substring(8,10);
    if (champ.value.length > 0 && (isNaN(j)|| j<1 || j>31 ||
            isNaN(m) || m<1 || m>12 ||
            isNaN(a) || a<1900 || a>2017)){
        surligne(champ, true);
        return false;
    }
    var date2 = new Date(a, m-1, j);
    var j2 = date2.getDate();
    var m2 = date2.getMonth() + 1;
    var a2 = date2.getFullYear();
    if (a2<=100) {a2 = 1900+a2}
    if (champ.value.length > 0 && (j!=j2 || m!=m2 || a!=a2)) {
        surligne(champ, true);
        if (divDate.style.display == "none"){
            divDate.style.display = "block";
        }
        return false;
    }
    if(champ.value.length == 0){
        return false;
    }
    if (divDate.style.display == "block"){
        divDate.style.display = "none";
    }
    surligne(champ, false);
    return true;
}

function verifPassword(champ){
    var div = document.getElementById("mdpError");
    if (champ.value.length < 6){
        surligne(champ, true);
        if (div.style.display == "none"){
            div.style.display = "block";
        }
        return false;
    }
    else if(champ.value.length == 0){
        return false;
    }
    else{
        surligne(champ, false);
        if (div.style.display == "block"){
            div.style.display = "none";
        }
        return true;
    }
}

function verifPasswordEquality(champ){
    var mdp1 = document.getElementById("password1").value;
    var mdp2 = document.getElementById("password2").value;
    var div = document.getElementById("mdpEqualityError");
    if (mdp1 != mdp2){
        surligne(champ, true);
        if (div.style.display == "none"){
            div.style.display = "block";
        }
        return false;
    }
    else {
        surligne(champ, false);
        if (div.style.display == "block"){
            div.style.display = "none";
        }
        return true;
    }
}

function verifRegisterForm(f){
    var loginOk = verifLogin(f.login);
    var loginLibre = existLogin(f.login);
    var mailOk = verifMail(f.email);
    var prenomOk = verifNames(f.prenom);
    var nomOk = verifNames(f.nom);
    var dateOk = verifDate(f.date);
    var telOk = verifTel(f.tel);
    var password1Ok = verifPassword(f.password1);
    var password2Ok = verifPassword(f.password2);
    if (loginOk && mailOk && telOk && prenomOk && nomOk && dateOk && password1Ok && password2Ok){
        alert("Votre compte a été créé, vous pouvez maintenant vous connecter");
        return true;
    }
    else{
        alert("Veuillez remplir correctement tous les champs");
        return false;
    }
}

function verifLoginForm(f){
    var loginOk = verifLogin(f.login);
    var mdpOk = verifPassword(f.password);
    if (loginOk && mdpOk){
        return true;
    }
    alert("Veuillez remplir correctement tous les champs");
    return false;
}


