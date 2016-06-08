window.addEventListener("load", function(){
    // var button = document.querySelector(".sign-up");
    // var openContainer = document.querySelector("openContainer");

    // $(button).on("click", function (e) {
    //     e.preventDefault();
    //     var hrefval = $(this).attr("href");

    //     if (hrefval == "#sign-up") {
    //         var distance = $(openContainer).css('height');

    //         if (distance == "auto" || distance == "0px") {
    //             $(this).addClass("open");
    //             openSidepage();
    //         } else {
    //             closeSidepage();
    //         }
    //     }
    // });
    
    // function openSidepage() {
    //     $(openContainer).animate({
    //         height: '350px'
    //     }, 400, 'easeOutBack');
    // }
    
    // function closeSidepage() {
    //     $(openContainer).removeClass("open");
    //     $('#mainpage').animate({
    //         height: '0px'
    //     }, 400, 'easeOutQuint');
    // }
    
    var openContainerButton = document.querySelector(".openContainerButton");
    var signUpButton = document.querySelector(".sign-up");
    var openContainer = document.querySelector(".openContainer");

    openContainerButton.addEventListener('click', function(e){
        
        openContainer.classList.toggle("openContainerShow");
        openContainerButton.classList.toggle("turnButton");
        
    });
    
    
        
    signUpButton.addEventListener('click', function(e){
        
        setTimeout(function() {
            
            openContainer.classList.add("openContainerShow");
            
        },800);
        
    });
    
});