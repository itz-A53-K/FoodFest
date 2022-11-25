
var LoginForm=document.getElementById("LoginForm")
var RegForm=document.getElementById("RegForm")
var Indicator=document.getElementById("Indicator")

function register(){
    RegForm.style.transform = "translateX(13px)";
    LoginForm.style.transform = "translateX(-120px)";
    Indicator.style.transform = "translateX(135px)";
}

function login(){
    RegForm.style.transform = "translateX(360px)";
    LoginForm.style.transform = "translateX(350px)";
    Indicator.style.transform = "translateX(13px)";
}
