function friendreq() {
    let receiver = document.getElementById("username").innerHTML;
    let sender = document.getElementById("friendaction").className;
    let friendaction = document.getElementById("friendaction");
    $(document).ready(function() {
        $.ajax({
            url: 'friend.inc.php',
            type: 'POST',
            data: {
                friendrequest: "friendrequest",
                receiver: receiver,
                sender: sender
            }
        });
    });
    friendaction.style.display = "none";
}
function friendrequ() {
    let receiver = event.srcElement.name;
    let friendaction = document.getElementsByClassName(receiver);
    $(document).ready(function() {
        $.ajax({
            url: 'friend.inc.php',
            type: 'POST',
            data: {
                friendrequest: "friendrequest",
                receiver: receiver
            }
        });
    });
    friendaction[0].style.display = "none";
}

function faccept() {
    let buttons = document.getElementsByClassName("friendnotifibtn");
    let classLenght = buttons.length;
    let friendrid = buttons[0].name;
    $(document).ready(function() {
        $.ajax({
            url: 'friend.inc.php',
            type: 'POST',
            data: {
                friendaction: "accept",
                friendrid: friendrid
            }
        });
        for (let i = 0; i < classLenght; i++){
            buttons[i].style.display = "none";
        }
    });
}

function fdeny() {
    let buttons = document.getElementsByClassName("friendnotifibtn");
    let classLenght = buttons.length;
    let friendrid = buttons[1].name;
    $(document).ready(function() {
        $.ajax({
            url: 'friend.inc.php',
            type: 'POST',
            data: {
                friendaction: "deny",
                friendrid: friendrid
            }
        });
        for (let i = 0; i < classLenght; i++){
            buttons[i].style.display = "none";
        }
    });
}

function fblock() {
    let buttons = document.getElementsByClassName("friendnotifibtn");
    let classLenght = buttons.length;
    let friendrid = buttons[2].name;
    $(document).ready(function() {
        $.ajax({
            url: 'friend.inc.php',
            type: 'POST',
            data: {
                friendaction: "block",
                friendrid: friendrid
            }
        });
        for (let i = 0; i < classLenght; i++){
            buttons[i].style.display = "none";
        }
    });
}

function fudeny() {
    let buttons = document.getElementsByClassName("friendbtns");
    let classLenght = buttons.length;
    let friendrid = buttons[0].name;
    $(document).ready(function() {
        $.ajax({
            url: 'friend.inc.php',
            type: 'POST',
            data: {
                friendaction: "fudeny",
                friendrid: friendrid
            }
        });
        for (let i = 0; i < classLenght; i++){
            buttons[i].style.display = "none";
        }
    });
}

function fublock() {
    let buttons = document.getElementsByClassName("friendbtns");
    let classLenght = buttons.length;
    let friendrid = buttons[1].name;
    $(document).ready(function() {
        $.ajax({
            url: 'friend.inc.php',
            type: 'POST',
            data: {
                friendaction: "fublock",
                friendrid: friendrid
            }
        });
        for (let i = 0; i < classLenght; i++){
            buttons[i].style.display = "none";
        }
    });
}

function afudeny() {
    let buttons = document.getElementsByClassName("friendbtns");
    let classLenght = buttons.length;
    let friendrid = buttons[0].name;
    $(document).ready(function() {
        $.ajax({
            url: 'friend.inc.php',
            type: 'POST',
            data: {
                friendaction: "fudeny",
                friendrid: friendrid
            }
        });
        for (let i = 0; i < classLenght; i++){
            buttons[i].style.display = "none";
        }
    });
}

function afublock() {
    let buttons = document.getElementsByClassName("friendbtns");
    let classLenght = buttons.length;
    let friendrid = buttons[1].name;
    $(document).ready(function() {
        $.ajax({
            url: 'friend.inc.php',
            type: 'POST',
            data: {
                friendaction: "fublock",
                friendrid: friendrid
            }
        });
        for (let i = 0; i < classLenght; i++){
            buttons[i].style.display = "none";
        }
    });
}