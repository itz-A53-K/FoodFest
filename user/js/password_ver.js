
var userRegName = document.getElementById("userName");
var userRegMail = document.getElementById("userEmail");
var userRegPass = document.getElementById("userPass");
var confirmPass = document.getElementById("confirmPass");

function regValidate()
{
    var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
    if (userRegName.value==""|| userRegMail.value==""||userRegPass.value=="" ) {
        alert('Please fill all the fields')
        return false;
    }
    else if ( userRegPass.value.length <6) {
        alert ('Password length must be alteast 6 characters')
        return false;
    }
    
    else if (userRegPass.value.length >18) {
        alert ('Password length must not exceed 18 characters')
        return false;
    }
    else if(!userRegPass.value.match(passw)) 
    { 
        alert('Password is too weak ! Please set a strong password');
        return false;
            
    }
    else if (userRegPass.value != confirmPass.value) {
        alert('Passwords do not match')
        return false;
    }
   

}