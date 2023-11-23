function test(){
    nom=document.getElementById("nom").value;
    prenom=document.getElementById("prenom").value;
    Motdepasse=document.getElementById("Motdepasse").value;
    Motdepasse1=document.getElementById("Motdepasse1").value;
    Email=document.getElementById("Email").value;
    Adresse=document.getElementById("Adresse").value;
    Occupation=document.getElementById("Occupation").value;

    if(nom.length==0 ){
        alert("nom invalid");
        return false;
    }
    if(prenom.length==0 ){
        alert("prenom invalid");
        return false;
    }
    if(Motdepasse.length==0 ){
        alert("Mot de passe invalid");
        return false;
    }
    if(Motdepasse1.length==0 ){
        alert("Mot de passe  invalid");
        return false;
    }
    if(Email.length==0 || Email.indexOf("@")==-1 || Email.indexOf(".")==-1 || Email.indexOf(".")>Email.indexOf("@")){
        alert("Email invalid");
        return false;
    }
    if(Adresse.length==0 ){
        alert("Adresse invalid");
        return false;
    }

    if(Occupation.length==0 ){
        alert("Occupation invalid");
        return false;
    }
}


