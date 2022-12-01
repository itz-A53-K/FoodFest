//active page link
document.querySelectorAll('.itemLink').forEach(link =>{
   
    if(link.href === window.location.href){
        link.classList.add('activePage');
    }
})

disableBtn=document.getElementsByClassName('.btnDisable')
console.log(disableBtn);
Array.from(disableBtn).forEach((element) =>{
    element.addEventListener("click", (e)=>{
        // alert("Hello! I am an alert box!!");
        console.log("kjdhfhsdkhifdh");
    })
})