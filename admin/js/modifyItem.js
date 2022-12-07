
//modify btn in modifyItem.php
modifyBtn = document.getElementsByClassName('modifyBtn');
Array.from(modifyBtn).forEach((element) => {
    element.addEventListener("click", (e) => {
        //open modal
        document.querySelector('#modifyFormModal').classList.remove('hidden');
        document.querySelector('.body').classList.add('overflow');

        // btnId.value = e.target.id;
        lineDiv = e.target.parentNode;
        console.log(lineDiv);
        food_Name = lineDiv.getElementsByTagName("h4")[0].innerText;
        price = lineDiv.getElementsByTagName("span")[0].innerText;
        food_Desc = lineDiv.getElementsByTagName("p")[0].innerText;
        item_Available = lineDiv.getElementsByTagName("span")[1].innerText;
        food_ID = lineDiv.getElementsByTagName("span")[2].innerText;
        category_id = lineDiv.getElementsByTagName("span")[3].innerText;

        // console.log( price);
        // console.log(item_Available.substr(16,));
        
        console.log(category_id);

        editFood_name.value=food_Name;
        editPrice.value=price.substr(1,);
        editFood_desc.value=food_Desc;
        editFood_Id.value=food_ID;
        editCategory.selectedIndex = category_id-1;

        if (item_Available.substr(16,)=="Yes") {
            
            editItem_Available.selectedIndex = "0";
        }
        else{
            editItem_Available.selectedIndex = "1";
            
        }
        
    })
})

// modifyForm cancel modal btn
modifyCancelBtn = document.querySelector('#modifyCancelBtn');
// console.log(cancelBtn);
modifyCancelBtn.addEventListener("click", (e) => {
        document.querySelector('#modifyFormModal').classList.add('hidden');
        document.querySelector('.body').classList.remove('overflow');
        
    
})

