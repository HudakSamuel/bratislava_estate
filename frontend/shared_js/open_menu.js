var menuToggle = false;

var menuIcon = document.querySelector(".fa-bars");
var menu = document.getElementById("dropdown");

window.addEventListener("mouseup", closeOutsideOfMenu);
menuIcon.addEventListener("click", toggleMenu);

function toggleMenu(){
    if(menuToggle == true ){
        menu.classList.remove("open");
        menuToggle = false;
    }
    
    else{
        menuToggle = true;
        menu.classList.add("open"); 
    }
    
}

function closeOutsideOfMenu(event){
    //close menu when user clicks away from menu container
    if (event.target != menu && event.target.parentNode != menu && event.target != menuIcon){
        menu.classList.remove("open");
        menuToggle = false;
    }

}