//active page link
document.querySelectorAll('.itemLink').forEach(link =>{
   
    if(link.href === window.location.href){
        link.classList.add('activePage');
    }
})