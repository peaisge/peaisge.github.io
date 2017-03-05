function surligne(champ, erreur){
    if (erreur){
        champ.style.backgroundColor = "#fba";
    }
    else
        champ.style.backgroundColor = "";
}

function verifLogin(champ){
    if (champ.value.length < 2 || champ.value.length > 30){
        surligne(champ, true);
        return false;
    }
    else{
        surligne(champ, false);
        return true;
    }
}

function verifMail(champ){
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if (!regex.test(champ.value)){
        surligne(champ, true);
        return false;
    }
    else{
        surligne(champ, false);
        return true;
   }
}

function verifNames(champ){
    var regex = /^([a-zA-Z]+(( |')[a-z]+)*)+([-]([a-zA-Z]+(( |')[a-z]+)*)+)*$/;
    if (!regex.test(champ.value) || champ.value.length < 2){
        surligne(champ, true);
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
    if (isNaN(j)|| j<1 || j>31 ||
            isNaN(m) || m<1 || m>12 ||
            isNaN(a) || a<1900 || a>2017){
        surligne(champ, true);
        return false;
    }
    var date2 = new Date(a, m-1, j);
    var j2 = date2.getDate();
    var m2 = date2.getMonth() + 1;
    var a2 = date2.getFullYear();
    if (a2<=100) {a2 = 1900+a2}
    if (j!=j2 || m!=m2 || a!=a2) {
        surligne(champ, true);
        if (divDate.style.display == "none"){
            divDate.style.display = "block";
        }
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
    var mailOk = verifMail(f.email);
    var prenomOk = verifNames(f.prenom);
    var nomOk = verifNames(f.nom);
    var dateOk = verifDate(f.date);
    var password1Ok = verifPassword(f.password1);
    var password2Ok = verifPassword(f.password2);
    if (loginOk && mailOk && prenomOk && nomOk && dateOk && password1Ok && password2Ok){
        return true;
    }
    else{
        alert("Veuillez remplir correctement tous les champs");
        return false;
    }
}

function verifLoginForm(){
    var login = document.getElementById("login").value;
    var mdp = document.getElementById("password").value;
    if (login.length > 2 && mdp.length > 5){
        return true;
    }
    alert("Veuillez remplir correctement tous les champs");
    return false;
}


