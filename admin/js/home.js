if(/preparing/.test(window.location.href)){
    // console.log("preparing");
    document.querySelector('.taskBtn').classList.remove('ClickedTaskBtn');
        document.getElementById('preparing').classList.add('ClickedTaskBtn');
}
else if(/delivered/.test(window.location.href)){
    // console.log("delivered");
    document.querySelector('.taskBtn').classList.remove('ClickedTaskBtn');
        document.getElementById('delivered').classList.add('ClickedTaskBtn');
}

