function test(){
    nom=document.getElementById("n").value;
    prenom=document.getElementById("p").value;
    ville=document.getElementById("ville").value;
    sujet=document.getElementById("sujet").value;

    if(nom.length==0 ){
        alert("nom invalid");
        return false;
    }
    if(prenom.length==0 ){
        alert("prenom invalid");
        return false;
    }
    if(ville.selectedIndex==0 ){
        alert("ville invalid");
        return false;
    }
    if(sujet.length==0 ){
        alert("sujet invalid");
        return false;
    }

}