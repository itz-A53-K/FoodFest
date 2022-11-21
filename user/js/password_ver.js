
var userRegName = document.getElementById("userName");
var userRegMail = document.getElementById("userEmail");
var userRegPass = document.getElementById("userPass");
var confirmPass = document.getElementById("confirmPass");
var code;

function regValidate()
{
    var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
    if (userRegName.value==""|| userRegMail.value==""||userRegPass.value=="" ) {
        alert('Please fill all the fields')
        return false;
    }
    else if ( userRegPass.value.length <3) {
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

function createCaptcha() 
{
    //clear the contents of captcha div first 
    document.getElementById('captcha').innerHTML = "";
    var charsArray =
    "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
    var lengthOtp = 6;
    var captcha = [];
    for (var i = 0; i < lengthOtp; i++)
    {
        //below code will not allow Repetition of Characters
        var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
        if (captcha.indexOf(charsArray[index]) == -1)
        captcha.push(charsArray[index]);
        else i--;
    }
    var canv = document.createElement("canvas");
    canv.id = "captcha";
    canv.width = 100;
    canv.height = 50;
    var ctx = canv.getContext("2d");
    ctx.font = "px Georgia";
    ctx.strokeText(captcha.join(""), 0, 30);
    //storing captcha so that can validate you can save it somewhere else according to your specific requirements
    code = captcha.join("");
    document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
}
    
function validateCaptcha() 
{
    if (document.getElementById("cpatchaTextBox").value == code) 
    {
        
    }
    else
    {
        alert("Invalid Captcha. try Again");
        return false;
        createCaptcha();
    }
}
