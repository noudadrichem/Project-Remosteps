window.addEventListener("load", function(){
    
    var loginPopup = document.querySelector(".login-popup");
    var loginButton = document.querySelector(".account-login");
    var languagePopup = document.querySelector(".language-popup");
    var languageButton = document.querySelector(".language");
    var close = document.querySelector(".close");
    var closeTwo = document.querySelector(".closeTwo");
    
    loginButton.addEventListener('click', function(e){
        
        loginPopup.classList.add('display');
        
    });
    
    languageButton.addEventListener('click', function(e) {
        
        languagePopup.classList.add('display');
        
    });
    
    close.addEventListener('click', function(e) {
        
        loginPopup.classList.remove('display');
        
    });
    
    closeTwo.addEventListener('click', function(e) {

        languagePopup.classList.remove('display');
        console.log('click');
        
    });
    
});