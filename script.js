//active page link
document.querySelectorAll('.itemLink').forEach(link =>{
   
    if(link.href === window.location.href){
        link.classList.add('activePage');
    }
    
})

if (window.location.href == "http://localhost/FoodFest/admin/home.php?btn=preparing" || window.location.href == "http://localhost/FoodFest/admin/home.php?btn=delivered" ) {
    document.getElementById("home").classList.add('activePage');
}

disableBtn=document.getElementsByClassName('.btnDisable')
// console.log(disableBtn);
Array.from(disableBtn).forEach((element) =>{
    element.addEventListener("click", (e)=>{
        // alert("Hello! I am an alert box!!");
        console.log("kjdhfhsdkhifdh");
    })
})