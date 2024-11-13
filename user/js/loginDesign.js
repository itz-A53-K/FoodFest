
var LoginForm=document.getElementById("LoginForm")
var RegForm=document.getElementById("RegForm")
var AdminForm=document.getElementById("AdminForm")
var Indicator=document.getElementById("Indicator")

function register(){
    RegForm.style.transform = "translateX(13px)";
    LoginForm.style.transform = "translateX(-120px)";
    Indicator.style.transform = "translateX(135px)";
    AdminForm.style.transform = "translateX(0px)";
}

function login(){
    RegForm.style.transform = "translateX(360px)";
    LoginForm.style.transform = "translateX(350px)";
    Indicator.style.transform = "translateX(13px)";
    AdminForm.style.transform = "translateX(-777px)";
}
function admin(){
    RegForm.style.transform = "translateX(500px)";
    AdminForm.style.transform = "translateX(777px)";
    LoginForm.style.transform = "translateX(-350px)";
    Indicator.style.transform = "translateX(260px)";
}