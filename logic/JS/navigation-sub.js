window.addEventListener("load", function(){
    
    var menuButton = document.querySelector(".menu");
    var navigationSub = document.querySelector(".navigation-sub");
    
    menuButton.addEventListener('click', function(e){
        
        console.log('hoiasdasd');
        navigationSub.classList.toggle('show-menu');
        
    });


});