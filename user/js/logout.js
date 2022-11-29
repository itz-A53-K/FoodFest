//delete btn in deleteItem.php
logoutBtn= document.querySelector('.logoutBtn');
console.log(logoutBtn);
logoutBtn.addEventListener("click", (e)=>{
        //open modal
        document.querySelector('.logoutModal').classList.remove('hidden');
        // document.querySelector('.body').classList.add('overflow');
        
        

})
cancelBtn = document.querySelector('.cancelBtn');
cancelBtn.addEventListener("click", (e) => {
        document.querySelector('.logoutModal').classList.add('hidden');
        // document.querySelector('.body').classList.remove('overflow');
        
    
})