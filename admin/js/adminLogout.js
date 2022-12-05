//delete btn in deleteItem.php
logoutBtn= document.querySelector('.logoutBtn');
console.log(logoutBtn);
logoutBtn.addEventListener("click", (e)=>{
        // alert("Do you really want to logout?");
        if(confirm("Do you really want to logout?")) document.location = 'http://localhost/FoodFest/admin/partial/_adminLogout.php';
})