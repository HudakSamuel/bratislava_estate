//=======Global variables=====//
//next image
var imageIndex = 0;
var hIndex = 0;          //header index
var pIndex = 0;          //paragraph index

//slide to next image
var xDown = 0;
var yDown = 0;

//banner text and background images
var imgArray = ["images/dom3.jpg",
                "images/dom4.jpg",
                "images/dom2.jpg"];

var hText = ["Staré mesto", "Rusovce", "Koliba"];
var pText = ["Nadštandartne vybavené luxusné byty na Blumentálskej ulici.  Byty s výrivkou a bazénom ešte stále k dispozícii. Ak hladáte byt pre mladých ľudí, ktorý sú plný energie ste na správnom mieste.", 
            "Najnovší developerský projekt v prémiovej lokalite na okraji Bratislavi. V ponuke sú velkometrážne byty, ale taktiež aj tie menšie. Nájdite si už teraz svoj vysnívaný byt za prijateľnú cenu.", 
            "Nový rezidenčný projekt v jednej z najkrajších častí Bratislavy na krásnom slnečnom pozemku obklopený záhradami okolitých rodinných domov. Napĺňa očakávania bývania v prémiovej lokalite"
            ];



//========Elements==========//
//banner arrows
var rightArrow = document.getElementById("arrow-right");
var leftArrow = document.getElementById("arrow-left");
var bannerArrows = document.querySelector(".banner-arrows");

//banner text
var banner = document.querySelector(".banner");
var bannerText = document.querySelector(".banner-text");



//========Listeners=======//
//next image 
rightArrow.addEventListener("click", moveImgRight);
leftArrow.addEventListener("click", moveImgLeft);

//slide to next image
banner.addEventListener("touchstart", slideStart);
banner.addEventListener("touchmove", slideMove);

//show and hide banner arrows
banner.addEventListener("mouseover", showArrows);
banner.addEventListener("mouseout", hideArrows);
rightArrow.addEventListener("mouseover", showArrows);
leftArrow.addEventListener("mouseover", showArrows);



function moveImgRight(){
    //currently at last img in array
    if(imageIndex == imgArray.length - 1){      
        imageIndex = 0;
        hIndex = 0;
        pIndex = 0;
        
        changeTextAndImg();
        repeatTextAnimation();
    } 

    else{
        imageIndex++;
        hIndex++;
        pIndex++;
        
        changeTextAndImg();
        repeatTextAnimation();
    }
    
}

function moveImgLeft(){
    //currently at first img in array
    if(imageIndex == 0){        
        imageIndex = 2;
        hIndex = 2;
        pIndex = 2;
        
        changeTextAndImg();
        repeatTextAnimation();
    }
        
    else{
        imageIndex--;
        hIndex--;
        pIndex--;
        
        changeTextAndImg();
        repeatTextAnimation();
    }
        
}

function repeatTextAnimation(){
    //repeats text animation by removing animation class and adding it 
    //back again after 20ms
    console.log(bannerText.childNodes.length);
    bannerText.childNodes[1].classList.remove("animate__fadeInDown");
    bannerText.childNodes[3].classList.remove("animate__fadeInUp");
    bannerText.childNodes[5].classList.remove("animate__fadeInUp");
    
    setTimeout(function(){
        bannerText.childNodes[1].classList.add("animate__fadeInDown");
        bannerText.childNodes[3].classList.add("animate__fadeInUp");
        bannerText.childNodes[5].classList.add("animate__fadeInUp");
    },20);
}

function changeTextAndImg(){
    //need to rewrite whole background attributes because they 
    //get changed
    banner.style.background = "linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3))" + " , url(" + imgArray[imageIndex] + ")";
    banner.style.backgroundRepeat = "no-repeat";
    banner.style.backgroundPosition = "center";
    banner.style.backgroundSize = "cover";
    bannerText.childNodes[1].innerHTML = hText[hIndex];
    bannerText.childNodes[3].innerHTML = pText[pIndex];
}

function hideArrows(){
    rightArrow.classList.remove("animate_fadeIn");
    leftArrow.classList.remove("animate_fadeIn");
    
    rightArrow.classList.add("animate__fadeOut");
    leftArrow.classList.add("animate__fadeOut");
}

function showArrows(){
    rightArrow.classList.remove("animate__fadeOut");
    leftArrow.classList.remove("animate__fadeOut");

    rightArrow.classList.add("animate__fadeIn");
    leftArrow.classList.add("animate__fadeIn");; 
}

function slideStart(event){
    //records coordinates when finger initially touches the screen
    var firstFingerTouch = event.touches[0];    //first finger that touched the screen
    xDown = firstFingerTouch.clientX;
    yDown = firstFingerTouch.clientY;
}

function slideMove(event){
    //records coordinates when finger is removed from screen
    if ( ! xDown || ! yDown ) {
        return;
    }
    
    var firstFingerMove = event.touches[0];
    var xUp = firstFingerMove.clientX;
    var yUp = firstFingerMove.clientY;

    //difference between initial touch and last touch
    var xDiff = xDown - xUp;
    var yDiff = yDown - yUp;

    //xDiff needs to be greater because we want horizontal slide
    if (Math.abs(xDiff) > Math.abs(yDiff)){
        if ( xDiff > 10) {
            moveImgLeft();
        }      
    
        if ( xDiff < 10 ) {
            moveImgRight();
        } 
    }
    
    //reset coordinates
    xDown = null;
    yDown = null;  
}


