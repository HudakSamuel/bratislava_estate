const nextButton = document.getElementById("nextButton");
const prevButton = document.getElementById("prevButton");
const images = document.querySelectorAll(".image-container img");
const imageContainer = document.querySelector(".image-container");


var counter = 0;
const imageWidth = images[0].clientWidth;
nextButton.addEventListener('click', ()=>{
    if(counter == images.length - 1){
        counter = -1;
        imageContainer.style.transition = "none";
        counter++;
        imageContainer.style.transform = "translateX(" + (-imageWidth * counter ) + "px)";
    }else{
        imageContainer.style.transition = "transform 0.4s ease-in-out";
        counter++;
        imageContainer.style.transform = "translateX(" + (-imageWidth * counter ) + "px)";
    }

    
})

prevButton.addEventListener('click', ()=>{
    if(counter == 0){
        counter = images.length;
        imageContainer.style.transition = "none";
        counter--;
        imageContainer.style.transform = "translateX(" + (-imageWidth * counter ) + "px)";
    }else{
        imageContainer.style.transition = "transform 0.4s ease-in-out";
        counter--;
        imageContainer.style.transform = "translateX(" + (-imageWidth * counter ) + "px)";
    }

    
})