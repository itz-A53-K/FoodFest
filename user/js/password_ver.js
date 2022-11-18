

var user_login = document.getElementById("loginPassword");
var user_reg = document.getElementById("userPass");

function CheckPassword() 
{ 
    var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
    if(user_login.value.match(passw)) 
    { 
        alert('Correct, try another...')
        
    }
    else
    { 
        alert('Wrong...!')
        
    }
}

function reg_pass()
{
    var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
    if(user_reg.value.match(passw)) 
    { 
        alert('Correct, try another...')
        
    }
    else
    { 
        alert('Wrong...!')
        
    }
}