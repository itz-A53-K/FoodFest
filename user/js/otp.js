// if()

document.querySelector('#varify').addEventListener("click",(e)=>{
    if(document.querySelector('#userEmail').value==""){
        alert('Please enter the Email first')
    }
    else{
        document.querySelector('.varification').classList.remove('hidden');
       

    }
})