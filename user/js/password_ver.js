
var otp = document.getElementById("otp");
var code;

function otpValidate() {
    var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
    if (otp.value == "") {
        alert('Please fill all the fields')
        return false;
    }
    
}

function createCaptcha() {
    //clear the contents of captcha div first 
    document.querySelector('#captcha').innerHTML = "";
    var charsArray =
        // "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%&";
        "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    var lengthOtp = 6;
    var captcha = [];
    for (var i = 0; i < lengthOtp; i++) {
        //below code will not allow Repetition of Characters
        var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
        if (captcha.indexOf(charsArray[index]) == -1)
            captcha.push(charsArray[index]);
        else i--;
    }
    code = captcha.join("");
    document.getElementById("captcha").innerHTML = code;
    // document.getElementById("captcha1").innerHTML= code; // adds the canvas to the h2 element
}


function validateCaptcha() {

    var userRegName = document.getElementById("userName");
    var userRegPass = document.getElementById("userPass");
    var confirmPass = document.getElementById("confirmPass");

    if (document.getElementById("cpatchaTextBox").value == code) {

        var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
        if (userRegName.value == "" || userRegPass.value == "") {
            alert('Please fill all the fields')
            return false;
        }
        else if (userRegPass.value.length < 3) {
            alert('Password length must be alteast 6 characters')
            return false;
        }

        else if (userRegPass.value.length > 18) {
            alert('Password length must not exceed 18 characters')
            return false;
        }
        else if (!userRegPass.value.match(passw)) {
            alert('Password is too weak ! Please set a strong password');
            return false;

        }
        else if (userRegPass.value != confirmPass.value) {
            alert('Passwords do not match')
            return false;
        }
        else {
            return true;
        }
    }
    else {
        alert("Captcha do not match. Try Again");
        document.getElementById("cpatchaTextBox").value = "";
        createCaptcha();
        return false;
    }
}
function validate_reg_cpatchaBox1() {
    // console.log(document.getElementById("reg_captchaBox1").value);
    if (document.getElementById("reg_captchaBox1").value == code) {
        return true;
    }
    else {
        alert("Captcha do not match. Try Again");
        document.getElementById("reg_captchaBox1").value = "";
        createCaptcha();
        return false;
    }
}

//captcha for login
function createCaptchaL() {
    //clear the contents of captcha div first 
    document.getElementById('captcha1').innerHTML = "";
    // document.getElementById('captcha').innerHTML = "";
    var charsArray =
        // "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
        "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    var lengthOtp = 6;
    var captcha = [];
    for (var i = 0; i < lengthOtp; i++) {
        //below code will not allow Repetition of Characters
        var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
        if (captcha.indexOf(charsArray[index]) == -1)
            captcha.push(charsArray[index]);
        else i--;
    }
    code = captcha.join("");
    // document.getElementById("captcha").innerHTML= code;
    document.getElementById("captcha1").innerHTML = code; // adds the captcha code to the h2 element
}
function validateCaptchaL() {
    if (document.getElementById("cpatchaTextBox1").value == code) {
        return true;
    }
    else {
        alert("Captcha do not match. Try Again");
        document.getElementById("cpatchaTextBox1").value = "";
        createCaptchaL();
        return false;
    }
}
