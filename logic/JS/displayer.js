document.querySelector("#alf").addEventListener("click",function(){
    document.getElementById("maskLayer").style.display = "block";
    document.getElementById("addLanguageField").style.display = "block";
});

document.querySelector("#close").addEventListener("click",function(){
    document.getElementById("maskLayer").style.display = "none";
    document.getElementById("addLanguageField").style.display = "none";
});