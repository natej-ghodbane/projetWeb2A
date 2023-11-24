function validerQuantité(){
    var q = document.getElementById("q").value;
    var min = 1;
    var max = 9;
    if(q < min || q > max ){
        alert("minimum 1 maximum 9");
    }    
}