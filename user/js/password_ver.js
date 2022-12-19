
var userRegMail = document.getElementById("verifyEmail");

var userRegName = document.getElementById("userName");
var userRegPass = document.getElementById("userPass");
var confirmPass = document.getElementById("confirmPass");
var otp = document.getElementById("otp");
var code;

function regValidate()
{
    var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
    if (userRegName.value==""|| userRegMail.value==""||userRegPass.value=="" || otp.value=="") {
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
    // else{
    //     validateCaptcha();
    // }
    

}

function createCaptcha() 
{
    //clear the contents of captcha div first 
    // document.getElementById('captcha1').innerHTML = "";
    document.getElementById('captcha').innerHTML = "";
    var charsArray =
    // "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%&";
    "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
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
    code = captcha.join("");
    document.getElementById("captcha").innerHTML= code;
    // document.getElementById("captcha1").innerHTML= code; // adds the canvas to the h2 element
}
    

function validateCaptcha() 
{
    if (document.getElementById("cpatchaTextBox").value == code) 
    {
        
    }
    else
    {
        alert("Captcha do not match. Try Again");
        createCaptcha();
        return false;
    }
}

//captcha for login
function createCaptchaL() 
{
    //clear the contents of captcha div first 
    document.getElementById('captcha1').innerHTML = "";
    // document.getElementById('captcha').innerHTML = "";
    var charsArray =
    // "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
    "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
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
    code = captcha.join("");
    // document.getElementById("captcha").innerHTML= code;
    document.getElementById("captcha1").innerHTML= code; // adds the captcha code to the h2 element
}
function validateCaptchaL() 
{
    if (document.getElementById("cpatchaTextBox1").value == code) 
    {
        
    }
    else
    {
        alert("Captcha do not match. Try Again");
        createCaptchaL();
        return false;
    }
}
