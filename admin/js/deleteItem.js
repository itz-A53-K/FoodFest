
// body.style.overflow="hidden";



//delete btn in deleteItem.php
deleteBtn= document.getElementsByClassName('deleteBtn');
// console.log(deleteBtn);
Array.from(deleteBtn).forEach((element) =>{
    element.addEventListener("click", (e)=>{
        //open modal
        document.querySelector('#deleteModal').classList.remove('hidden');
        document.querySelector('.body').classList.add('overflow');
        lineDiv = e.target.parentNode;
        // console.log(lineDiv);
        food_Name = lineDiv.getElementsByTagName("h4")[0].innerText;
        food_ID = lineDiv.getElementsByTagName("span")[1].innerText;

        dltItem_Id.value=food_ID;
        console.log(dltItem_Id);
        document.getElementById('dltFoodName').innerText=food_Name;
    })
})

// deleteModal cancel btn
dltCancelBtn = document.querySelector('#dltCancelBtn');
dltCancelBtn.addEventListener("click", (e) => {
        document.querySelector('#deleteModal').classList.add('hidden');
        document.querySelector('.body').classList.remove('overflow');
        
    
})

