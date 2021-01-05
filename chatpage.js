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

function user() {
    let name = event.srcElement.id;
    $.ajax({
        url: 'chatpage.inc.php',
        type: 'POST',
        data: {
            seenmes:name
        }
    });
    window.location.replace("/chatpage.php?user=" + name);
}
function sendmessage1() {
    let message = document.getElementById("chatinput1").value;
    let receiver = document.getElementById("chatinput1").name;
    let centermid = document.getElementById("centermid");
    $(document).ready(function() {
        if (message !== ""){
            $.ajax({
                url: 'chatpage.inc.php',
                type: 'POST',
                data: {
                    sendmessage: message,
                    receiver: receiver
                }
            });
            $('#chatinput1').val('');
            setTimeout(function () {
            refreshtab();
            },100)
            setTimeout(function () {
            scroll1();
            },150)
        }
    });
}

function refreshtab() {
    let centermid = document.getElementById("centermid");
    let url = document.URL.slice(43);
    $.ajax({
        url: 'chatpage.inc.php',
        type: 'POST',
        data: {
            refresh: "tab1",
            url: url
        },
        success(response){
            centermid.innerHTML = response;
        }
    });
}

function process1(e) {
    let code = (e.keyCode ? e.keyCode : e.which);
    if (code == 13) {
        sendmessage1()
    }
}

function refreshfrlist() {
    let frlist = document.getElementsByClassName("friendlistmid")[0];
    $.ajax({
        url: 'frlist.php',
        type: 'POST',
        data: {
            fr: "fr"
        },
        success(response){
            frlist.innerHTML = response;
        }
    });
}

function scroll1() {
    setTimeout(function () {
        let centermid = document.getElementById("centermid");
        centermid.scroll(0, centermid.scrollHeight);
    },50)
}
setInterval(function () {
    refreshtab();
   refreshfrlist()
},5000)
