function test(){
    nom=document.getElementById("nom").value;
    num=document.getElementById("number").value;
    Email=document.getElementById("mail").value;
    ad=document.getElementById("ad").value;
    ad1=document.getElementById("ad1").value;
    ad2=document.getElementById("ad2").value;
    ad3=document.getElementById("ad3").value;
    pin=document.getElementById("q").value;

    if(nom.length==0 ){
        alert("nom invalid");
        return false;
    }
    if(num==0 ){
        alert("number invalid");
        return false;
    }
    if(Email.length==0 || Email.indexOf("@")==-1 || Email.indexOf(".")==-1 || Email.indexOf(".")>Email.indexOf("@")){
        alert("Email invalid");
        return false;
    }
    if(ad==0 ){
        alert("ad01 invalid");
        return false;
    }
    if(ad1.length==0 ){
        alert("ad02 invalid");
        return false;
    }
    if(ad2.length==0 ){
        alert("city invalid");
        return false;
    }
    if(ad3.length==0 ){
        alert("country invalid");
        return false;
    }
    
    if(pin==0 ){
        alert("pin invalid");
        return false;
    }
}

