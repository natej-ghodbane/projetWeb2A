function validerdatelivraison(){
    var date=document.getElementById("date").value;
    var mindate="2023-11-22";
    if(date<mindate){
        alert("entrer une date apres le 2023-11-12");
        return false;
    }
    else{
        alert("date validée");
        return true;
    }
}



   


