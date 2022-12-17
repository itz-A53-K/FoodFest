
document.querySelector('#verify').addEventListener("click",(e)=>{
    if(document.querySelector('#userEmail').value==""){
        alert('Please enter the Email first')
    }
    else{
        console.log('kjhkjhhk');
        document.querySelector('#verifyEmail').value=document.querySelector('#userEmail').value;
        // document.querySelector('.varification').classList.remove('hidden');
        // document.location = 'http://localhost/FoodFest/otp_var.php'

    }
})

