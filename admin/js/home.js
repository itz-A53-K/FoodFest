if (/preparing/.test(window.location.href)) {
    // console.log("preparing");
    document.querySelector('.taskBtn').classList.remove('ClickedTaskBtn');
    document.getElementById('preparing').classList.add('ClickedTaskBtn');
}
else if (/Out_For_Delivery/.test(window.location.href)) {
    // console.log("delivered");
    document.querySelector('.taskBtn').classList.remove('ClickedTaskBtn');
    document.getElementById('Out For Delivery').classList.add('ClickedTaskBtn');
}
else if (/delivered/.test(window.location.href)) {
    // console.log("delivered");
    document.querySelector('.taskBtn').classList.remove('ClickedTaskBtn');
    document.getElementById('delivered').classList.add('ClickedTaskBtn');
}
if (/taskId/.test(window.location.href)) {
    currentUrl = window.location.href;
    cutUrl = currentUrl.slice(currentUrl.indexOf('taskId'));
    cardId = "taskCard" + cutUrl.slice(7,);
    console.log(cardId);
    document.querySelector('.taskCard').classList.remove('ClickedTaskBtn');
    document.getElementById(cardId).classList.add('clickedTask');
}
