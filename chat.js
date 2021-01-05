function chatd() {
    let chat = document.getElementById("chat");
    let friendlist = document.getElementById("friendlist");
    if (chat.style.display === "none"){
        chat.style.display = "block";
        friendlist.style.display = "none";
    }
    else {
        chat.style.display = "none";
        friendlist.style.display = "block";
    }
}

function openchattab() {
    let user = event.srcElement.id;
    let mainchat = document.getElementById("mainchat");
        $.ajax({
            url: 'chat.inc.php',
            type: 'POST',
            data: {
                user: user
            },
            success: function (response) {
                mainchat.innerHTML = response;
            }
        });
        scroll1();
        scroll2();
}

function chattabd1() {
    let chattab1 = document.getElementById("chattab1");
    let messages1 = document.getElementById("messages1");
    let tab1 = document.getElementsByClassName("tab1")[0];
    /*$.ajax({
        url: 'chat.inc.php',
        type: 'POST',
        data: {
            tabdisp: "tab1b"
        }
    });*/
    chattab1.style.display = "none";
    tab1.style.display = "block";
    messages1.scroll(0, messages1.scrollHeight)
}

function chattabd2() {
    let chattab2 = document.getElementById("chattab2");
    let messages2 = document.getElementById("messages2");
    let tab2 = document.getElementsByClassName("tab2")[0];
    /*$.ajax({
        url: 'chat.inc.php',
        type: 'POST',
        data: {
            tabdisp: "tab2b"
        }
    });*/
    chattab2.style.display = "none";
    tab2.style.display = "block";
    messages2.scroll(0, messages2.scrollHeight)
}

function frlistclose() {
    let chat = document.getElementById("chat");
    let friendlist = document.getElementById("friendlist");
    chat.style.display = "none";
    friendlist.style.display = "block";
}

function closechat1() {
    let tab1 = document.getElementById("tab1");
    tab1.style.display = "none";
    $.ajax({
        url: 'chat.inc.php',
        type: 'POST',
        data: {
            action: "closechattab1"
        }
    });
}

function closechat2() {
    let tab2 = document.getElementById("tab2");
    tab2.style.display = "none";
    $.ajax({
        url: 'chat.inc.php',
        type: 'POST',
        data: {
            action: "closechattab2"
        }
    });
}

function closechattab1() {
    let tab1 = document.getElementById("chattab1");
    tab1.style.display = "none";
    $.ajax({
        url: 'chat.inc.php',
        type: 'POST',
        data: {
            action: "closechattab1"
        }
    });
}

function closechattab2() {
    let tab2 = document.getElementById("chattab2");
    tab2.style.display = "none";
    $.ajax({
        url: 'chat.inc.php',
        type: 'POST',
        data: {
            action: "closechattab2"
        }
    });
}

function minimize1() {
   /* $.ajax({
        url: 'chat.inc.php',
        type: 'POST',
        data: {
            tabdisp: "tab1n"
        }
    });*/
    let tab1 = document.getElementById("tab1");
    tab1.style.display = "none";
    let chattab1 = document.getElementById("chattab1");
    chattab1.style.display = "block";
}

function minimize2() {
    /*$.ajax({
        url: 'chat.inc.php',
        type: 'POST',
        data: {
            tabdisp: "tab1n"
        }
    });*/
    let tab2 = document.getElementById("tab2");
    tab2.style.display = "none";
    let chattab2 = document.getElementById("chattab2");
    chattab2.style.display = "block";
}

function friendsearch() {
    let input, filter, userdiv, users, i, txtValue;
    input = document.getElementById("friendlistsearch");
    filter = input.value.toUpperCase();
    userdiv = document.getElementsByClassName("frienddiv");

    for (i = 0; i < userdiv.length; i++) {
        users = userdiv[i].getElementsByClassName("friendname")[0];
        if (users) {
            txtValue = users.textContent || users.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                userdiv[i].style.display = "";
            } else {
                userdiv[i].style.display = "none";
            }
        }
    }
}

function sendmessage1() {
    let message = document.getElementById("chatinput1").value;
    let messages1 = document.getElementById("messages1");
    $(document).ready(function() {
    if (message !== ""){
        $.ajax({
            url: 'chat.inc.php',
            type: 'POST',
            data: {
                sendmessage: "tab1",
                message: message
            }
        });
            $('#chatinput1').val('');
            $.ajax({
                url: 'chattab.php',
                type: 'POST',
                data: {
                    refreshtab: "tab1"
                },
                success(response){
                    messages1.innerHTML = response;
                }
            });

    }
    setTimeout(function () {
        messages1.scroll(0, messages1.scrollHeight);
    },100)
    });
    }

function refreshtab1() {
    let tab1 = document.getElementById("messages1");
    $.ajax({
        url: 'chattab.php',
        type: 'POST',
        data: {
            refreshtab: "tab1"
        },
        success(response){
            tab1.innerHTML = response;
        }
    });
}

function sendmessage2() {
    $(document).ready(function() {
    let message = document.getElementById("chatinput2").value;
    let messages2 = document.getElementById("messages2");
    if (message !== ""){
            $.ajax({
                url: 'chat.inc.php',
                type: 'POST',
                data: {
                    sendmessage: "tab2",
                    message: message
                }
            });
            $('#chatinput2').val('');
            $.ajax({
                url: 'chattab.php',
                type: 'POST',
                data: {
                    refreshtab: "tab2"
                },
                success(response){
                    messages2.innerHTML = response;
                }
            });
    }
    $.ajax({
        url: 'chattab.php',
        type: 'POST',
        data: {
            refreshtab: "tab2"
        },
        success(response){
            messages2.innerHTML = response;
        }
        });
    $(document).ready(function() {
        setTimeout(function () {
            messages2.scroll(0, messages2.scrollHeight);
        },100)
    });
    });
}

function refreshtab2() {
    let tab2 = document.getElementById("messages2");
    $.ajax({
        url: 'chattab.php',
        type: 'POST',
        data: {
            refreshtab: "tab2"
        },
        success(response){
            tab2.innerHTML = response;
        }
    });
}

function refreshfrlist() {
    let frlist = document.getElementById("friendlistmid");
    $.ajax({
        url: 'frlist.php',
        type: 'POST',
        success(response){
            frlist.innerHTML = response;
        }
    });
}

function process1(e) {
    let code = (e.keyCode ? e.keyCode : e.which);
    if (code == 13) {
            sendmessage1()
    }
}

function process2(e) {
        let code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            $(document).ready(function() {
            sendmessage2()
            });
        }
}

function scroll1() {
        setTimeout(function () {
            let messages1 = document.getElementById("messages1");
            messages1.scroll(0, messages1.scrollHeight);
        },50)
}

function scroll2() {
        setTimeout(function () {
            let messages2 = document.getElementById("messages2");
            messages2.scroll(0, messages2.scrollHeight);
        },50)
}

function tab1ref() {
    setInterval(function () {
        refreshtab1();
    },5000)
}
function tab2ref() {
    setInterval(function () {
        refreshtab2();
    },5000)
}

function tab12ref() {
    setInterval(function () {
        refreshtab1();
        refreshtab2();
    },5000)
}

setInterval(function () {
    let frlist = document.getElementsByClassName("friendlistmid")[0];
    $.ajax({
        url: 'friends.php',
        type: 'POST',
        data: {
            frlist: "fr"
        },
        success(response){
            frlist.innerHTML = response;
        }
    });
},10000)