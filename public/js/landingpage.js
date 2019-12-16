var navbar = document.getElementsByClassName("navbar")[0];
var burger = document.getElementsByClassName("burger")[0];
var logo = document.getElementsByClassName("navbar-brand")[0];
var items = document.getElementsByClassName("navbar-item");
var isActive = document.getElementsByClassName("is-active")[0];
var modules = document.getElementById("MemorizNavbar");
var isInv = true;
var bgIsInv = true;
var breakpoint = 100;
var isMobile = false;
var currentVP;


function getViewport(){
    let intViewportHeight = window.innerHeight;
    let intViewportWidth = window.innerWidth;
    if(intViewportWidth <= 1024){
        breakpoint = 50;
    }

    if(intViewportWidth < 768 && currentVP!==intViewportWidth){
        document.getElementById("bg-image").src="/public/images/landingpage/landingpage-mobile.png"
        document.getElementById("rocket").src="/public/images/landingpage/landingpage-mobile-rocket.png"
        isMobile = true;
        breakpoint = 650;
        document.getElementById("title").innerHTML = "Deine Lernplattform"
        document.getElementById("loslegen").classList.toggle("is-primary");
        document.getElementById("loslegen").classList.toggle("is-white");
        
        currentVP = intViewportWidth;
    }else if(intViewportWidth < 768){
        isMobile = true;
    }
}


function colorChange(){
    burger.classList.toggle("burger-inv");
    logo.classList.toggle("logo-inv");
    isActive.classList.toggle("is-active-inv");
    navbar.classList.toggle("navbar-inv");
    modules.classList.toggle("navbar-menu-inv");
    let x;
    for(x of items){
        x.classList.toggle("navbar-item-inv");
    }
    
}




window.addEventListener('scroll', function(e){
    let position = window.scrollY;

    rocket(parseInt(position));
    
    if(isInv && position > breakpoint){
        isInv = false;
        colorChange();
        
    }
    if(!isInv && position < breakpoint){
        isInv = true;
        colorChange();
        
    }

});


window.addEventListener('resize', function(e){
    getViewport();
    resizeHeading();
});

function resizeHeading(){
    if(!isMobile){
        document.getElementById("heading").setAttribute("style", `height: ${document.getElementById("bg-image").clientHeight}px`);
    }
    
}

var currentPos = 0;

var rocket = (x) => {
    let top = 0;
    if(x > currentPos){
        var rocketID = document.getElementById("rocket");
        var container = document.getElementById("trim-container");
        let pos = parseInt(window.getComputedStyle(container).getPropertyValue("top"));
        container.setAttribute("style", `top: ${-x/2}px`);
        currentPos = x;
        top = pos;
    }
    else if(x < currentPos){
        var rocketID = document.getElementById("rocket");
        var container = document.getElementById("trim-container");
        let pos = parseInt(window.getComputedStyle(container).getPropertyValue("top"));
        container.setAttribute("style", `top: ${top + top-x/2}px`);
        currentPos = x;
    }
    
}

document.addEventListener("DOMContentLoaded", function(event){
    colorChange();
    getViewport();
    resizeHeading();
});




