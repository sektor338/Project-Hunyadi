function notifipage() {
    let notifitab = document.getElementById("notifitab");
    let user = notifitab.className;
    let notifinum = document.getElementById("badge");
    $(document).ready(function() {
        $.ajax({
            url: 'notifi.inc.php',
            type: 'POST',
            data: {
                user: user
            }
        });
        notifinum.style.display = "none";
    });
    window.location.replace("/notifications.php");
}
function filterf() {
    let ffilter = document.getElementById("ffilter");
    let fnotifi = document.getElementsByClassName("notififriend");
    let classLenght = fnotifi.length;

    if (fnotifi[0].style.display == "block"){
        for (let i = 0; i < classLenght; i++){
            fnotifi[i].style.display = "none";
            ffilter.style.backgroundColor = "grey";
        }
    }
    else {
        for (let i = 0; i < classLenght; i++){
            fnotifi[i].style.display = "block";
            ffilter.style.backgroundColor = "#27ae60";
        }
    }

}
function filterc() {
    let cfilter = document.getElementById("cfilter");
    let cnotifi = document.getElementsByClassName("notificomments");
    let classLenght = cnotifi.length;
    if (cnotifi[0].style.display !== "none"){
        for (let i = 0; i < classLenght; i++){
            cnotifi[i].style.display = "none";
            cfilter.style.backgroundColor = "grey";
        }
    }
    else {
        for (let i = 0; i < classLenght; i++){
            cnotifi[i].style.display = "block";
            cfilter.style.backgroundColor = "#27ae60";
        }
    }
}
function filterv() {
    let vfilter = document.getElementById("vfilter");
    let vnotifi = document.getElementsByClassName("notifivotes");
    let classLenght = vnotifi.length;

    if (vnotifi[0].style.display !== "none"){
        for (let i = 0; i < classLenght; i++){
            vnotifi[i].style.display = "none";
            vfilter.style.backgroundColor = "grey";
        }
    }
    else {
        for (let i = 0; i < classLenght; i++){
            vnotifi[i].style.display = "block";
            vfilter.style.backgroundColor = "#27ae60";
        }
    }
}
function filterr() {
    let rfilter = document.getElementById("rfilter");
    let rnotifi = document.getElementsByClassName("notifireport");
    let classLenght = rnotifi.length;
    if (rnotifi[0].style.display !== "none"){
        for (let i = 0; i < classLenght; i++){
            rnotifi[i].style.display = "none";
            rfilter.style.backgroundColor = "grey";
        }
    }
    else {
        for (let i = 0; i < classLenght; i++){
            rnotifi[i].style.display = "block";
            rfilter.style.backgroundColor = "#27ae60";
        }
    }
}