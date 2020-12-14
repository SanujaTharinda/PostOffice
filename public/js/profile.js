function changeUsernameClick(){
    let bottom = document.getElementById("profile-bottom");
    bottom.innerHTML = '';
    let newMessage = document.createElement('p');
    newMessage.innerHTML = 'New Username';
    let newInput = document.createElement('input');
    newInput.classList.add('new-username');
    newInput.setAttribute('id', 'new-username');
    newInput.setAttribute('onkeyup', 'checkUsername(this.value)');
    bottom.appendChild(newMessage);
    bottom.appendChild(newInput);

    let submit = document.createElement('button');
    submit.innerHTML = 'Change';
    submit.setAttribute('type', 'button');
    submit.setAttribute('id', 'change-button');
    submit.classList.add('btn');
    submit.classList.add('btn-danger');
    submit.classList.add('change');
    submit.setAttribute('onclick', 'changeUsername()');
    submit.setAttribute('disabled', 'true');
    bottom.appendChild(submit);
}

function checkUsername(newUsername){
    $.ajax({
        type: 'POST',
        data: {
            newUsername
        },
        url: "http://localhost/PostOffice/ProfileController/usernameExists",
        success: function (data) {
            const usernameExists = JSON.parse(data);
            let changeButton = document.getElementById('change-button');
            if(!usernameExists) {
                changeButton.disabled = false;
                let errorMessage = document.getElementById('error-message');
                if(errorMessage != null)
                    errorMessage.remove();
            }
            else {
                changeButton.disabled = true;
                let errorMessage = document.createElement('div');
                errorMessage.setAttribute('id','error-message');
                errorMessage.innerHTML = 'Sorry username already exists...';
                let bottom = document.getElementById("profile-bottom");
                bottom.appendChild(errorMessage);
            }
        }
    });  
}

function changeUsername(){
    let newUsername = document.getElementById('new-username').value;
    $.ajax({
        type: 'POST',
        data: {
            newUsername
        },
        url: "http://localhost/PostOffice/ProfileController/changeUsername",
        
        success: function (data) {
            window.location.replace("http://localhost/PostOffice/ProfileController/profile");
        }
    });
}

function changePasswordClick() {
    let bottom = document.getElementById("profile-bottom");
    bottom.innerHTML = '';

    let previosuPasswordLabel = document.createElement('p');
    previosuPasswordLabel.innerHTML = 'Previous Password';
    let previosuPasswordInput = document.createElement('input');
    previosuPasswordInput.setAttribute('id', 'previous-password');
    previosuPasswordInput.setAttribute('onchange','checkPreviousPassword()');
    bottom.appendChild(previosuPasswordLabel);
    bottom.appendChild(previosuPasswordInput);

    let messagePrevious = document.createElement('div');
    messagePrevious.setAttribute('id', 'message-previous');
    bottom.appendChild(messagePrevious);
    
    let newPasswordLabelFirst = document.createElement('p');
    newPasswordLabelFirst.innerHTML = 'New Password';
    let newPasswordInputFirst = document.createElement('input');
    newPasswordInputFirst.setAttribute('id', 'new-password');
    bottom.appendChild(newPasswordLabelFirst);
    bottom.appendChild(newPasswordInputFirst);

    let newPasswordLabelSecond = document.createElement('p');
    newPasswordLabelSecond.innerHTML = 'Re-enter New Password';
    let newPasswordInputSecond = document.createElement('input');
    newPasswordInputSecond.setAttribute('id', 'new-password-re-enter');
    newPasswordInputSecond.setAttribute('oninput', 'checkNewPassword()');
    bottom.appendChild(newPasswordLabelSecond);
    bottom.appendChild(newPasswordInputSecond);

    let messageNew = document.createElement('div');
    messageNew.setAttribute('id', 'message-new');
    bottom.appendChild(messageNew);


    let submit = document.createElement('button');
    submit.innerHTML = 'Change';
    submit.setAttribute('type', 'button');
    submit.setAttribute('id', 'change-button-password');
    submit.classList.add('btn');
    submit.classList.add('btn-danger');
    submit.classList.add('change');
    submit.setAttribute('onclick', 'changePassword()');
    submit.setAttribute('disabled', 'true');
    bottom.appendChild(submit);


}

function changePassword() {
    const username = $('#profile-bottom').attr('username');
    const newPassword = document.getElementById('new-password').value;
    $.ajax({
        type: 'POST',
        data: {
            username,
            newPassword
        },
        url: "http://localhost/PostOffice/ProfileController/changePassword",
        success: function (data) {
            document.getElementById('profile-bottom').innerHTML = data;
        }
    });
}

async function checkPreviousPassword(){
    const username = $('#profile-bottom').attr('username');
    const password = document.getElementById('previous-password');
    let message = document.getElementById('message-previous');
    let change = document.getElementById('change-button-password');
    const isValid = JSON.parse(await isPasswordValid(username, password.value));

    if(!isValid){
        console.log("Not Valid");
        message.innerHTML = "Wrong Password";
        change.disabled = true;
        password.setAttribute('onkeyup', 'checkPreviousPassword()');

    } else if (checkNewPassword()){
        change.disabled = false;
    } 
    else{
        message.innerHTML = "";
    }

    
}

function isPasswordValid(username, password) {
    return $.ajax({
        type: 'POST',
        data: {
            username,
            password
        },
        url: "http://localhost/PostOffice/ProfileController/isUserValid",
        success: function (data) {
        }
    });

}


function checkNewPassword(){
    let change = document.getElementById('change-button-password');
    let newPasswrod = document.getElementById('new-password');
    let newPasswordSecond = document.getElementById('new-password-re-enter');
    const prePassword = document.getElementById('previous-password');

    if(newPasswrod.value == '' || newPasswordSecond.value == ''){
        change.disabled = true;
        return false;
    }
    
    if(newPasswrod.value != newPasswordSecond.value){
        document.getElementById('message-previous').innerHTML = '';
        change.disabled = true;
        document.getElementById('message-new').innerHTML = 'Re-entered password must be the same...';
        return false;
    }else{
        document.getElementById('message-previous').innerHTML = '';

        if(checkPreviousPassword()){
            document.getElementById('message-new').innerHTML = '';
            change.disabled = false;
        }
        
      
        
    }

}





