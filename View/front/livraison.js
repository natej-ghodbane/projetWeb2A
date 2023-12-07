function validerdatelivraison(){
    var date=document.getElementById("date").value;
    var mindate="2023-11-24";
    if(date<mindate){
        alert("entrer une date apres le 2023-11-24");
        return false;
    }
    else{
        alert("date validée");
        return true;
    }
}



   


