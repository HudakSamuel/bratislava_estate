const messages = [];

function userNameControl(){
    const username = document.getElementById("username");
    const usernameValue = username.value.trim();
    const formControl = username.parentElement;

    // removes php created error messages after invalid validation //
    var phpErrorMsgs = document.getElementsByClassName("php-validation-user-error");
    removePhpErrorMessages(phpErrorMsgs);

    // conditions //
    const userError1 = "Meno je príliš krátke";
    
    if (usernameValue.length < 5) {
        setError(username);
        if(messages.indexOf(userError1) == -1){
            
            createNewErrorMessage(formControl,userError1);
            messages.push(userError1);
        }
    }

    if (usernameValue.length >= 5) {
        if(messages.indexOf(userError1) != -1){
            removeErrorMessageElement(userError1);
        }
    }

    if (usernameValue.length >= 5 /* && .... */){
        setSuccess(username);
    }
}

function emailControl(){
    const mail = document.getElementById("mail");
    const mailValue = mail.value.trim();
    const formControl = mail.parentElement;

    // removes php created error messages after invalid validation //
    var phpErrorMsgs = document.getElementsByClassName("php-validation-email-error");
    removePhpErrorMessages(phpErrorMsgs);

    // conditions // 
    const mailMsg1 = "Mail neobsahuje @";
    const mailMsg2 = "Email je príliš krátky";
  

    if (mailValue.length < 5) {
        setError(mail);
        if(messages.indexOf(mailMsg2) == -1){
            
            createNewErrorMessage(formControl,mailMsg2);
            messages.push(mailMsg2);
        }
    }

    if (mailValue.length >= 5) {
        if(messages.indexOf(mailMsg2) != -1){
            removeErrorMessageElement(mailMsg2);
        }
    }

    if (mailValue.indexOf("@") == -1){
        setError(mail);
        if(messages.indexOf(mailMsg1) == -1){
            createNewErrorMessage(formControl,mailMsg1);
            messages.push(mailMsg1);
        }
    }

    if (mailValue.indexOf("@") != -1){
        if(messages.indexOf(mailMsg1) != -1){
            removeErrorMessageElement(mailMsg1);
        }
    }

    if (mailValue.length >= 5 && mailValue.indexOf("@") != -1 /* && .... */){
        setSuccess(mail);
    }
}

function passwordControl(){
    const password = document.getElementById("password");
    const passwordValue = password.value.trim();
    const formControl = password.parentElement;

    // removes php created error messages after invalid validation //
    var phpErrorMsgs = document.getElementsByClassName("php-validation-password-error");
    removePhpErrorMessages(phpErrorMsgs);

    // conditions //
    const passError1 = "Heslo je príliš krátke";
    
    if (passwordValue.length < 5) {
        setError(password);
        if(messages.indexOf(passError1) == -1){
            
            createNewErrorMessage(formControl,passError1);
            messages.push(passError1);
        }
    }

    if (passwordValue.length >= 5) {
        if(messages.indexOf(passError1) != -1){
            removeErrorMessageElement(passError1);
        }
    }

    if (passwordValue.length >= 5 /* && .... */){
        setSuccess(password);
    }
}

function passwordConfControl(){
    const passwordConf = document.getElementById("passwordConf");
    const password = document.getElementById("password");
    const passwordConfValue = passwordConf.value.trim();
    const passwordValue = password.value.trim();
    const formControl = passwordConf.parentElement;

    // removes php created error messages after invalid validation //
    var phpErrorMsgs = document.getElementsByClassName("php-validation-passwordConf-error");
    removePhpErrorMessages(phpErrorMsgs);

    // conditions //
    const passConfError1 = "Heslá sa nezhodujú";
    
    if (passwordValue != passwordConfValue) {
        setError(passwordConf);
        if(messages.indexOf(passConfError1) == -1){
            
            createNewErrorMessage(formControl,passConfError1);
            messages.push(passConfError1);
        }
    }

    if (passwordValue == passwordConfValue) {
        if(messages.indexOf(passConfError1) != -1){
            removeErrorMessageElement(passConfError1);
            setSuccess(passwordConf);
        }
    }
}


function createNewErrorMessage(formControl, errorMsg){
    // creates new small element with error msg //
    const newSmall = document.createElement("small");
    const smallText = document.createTextNode(errorMsg);
    // sets its ID according to error msg and appends to its parent //
    newSmall.setAttribute("id", errorMsg);
    newSmall.appendChild(smallText);
    formControl.appendChild(newSmall);
}

function removeErrorMessageElement(errorMsg){
    // finds index of error msg in messages array and removes it//
    var index = messages.indexOf(errorMsg);
    messages.splice(index,1);
    // removes small element with particular msg //
    let errorElement = document.getElementById(errorMsg);
    errorElement.remove();
}


function removePhpErrorMessages(phpErrorMsgs){
    // loops through all elements with specific error message class and
    // removes them //
    if (phpErrorMsgs.length > 0){
        for (let i = 0; i < phpErrorMsgs.length; i++){
            phpErrorMsgs[i].remove();
        }
    }
    return;
}

function setError(inputField){
    inputField.classList.remove("input-success");
    
    setTimeout(function(){
        inputField.classList.add("input-error");
    },20);
}

function setSuccess(inputField){
    inputField.classList.remove("input-error");
    
    setTimeout(function(){
        inputField.classList.add("input-success");
    },20);
    
}