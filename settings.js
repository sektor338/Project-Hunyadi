/*function left() {
    let leftnavli = document.getElementsByClassName("leftnavli");
    let classLenght = leftnavli.length;
    for (let i = 0; i < classLenght; i++){
        leftnavli[i].style.display = "block";
    }
}

function right() {
    let leftnavli = document.getElementsByClassName("leftnavli");
    let classLenght = leftnavli.length;
    for (let i = 0; i < classLenght; i++){
        leftnavli[i].style.display = "none";
    }
}*/

function profpic() {
    let profpic = document.getElementById('realprofpic');
    let maindiv1 = document.getElementsByClassName("maindiv1");
    let classLenght = maindiv1.length;
    for (let i = 0; i < classLenght; i++){
        maindiv1[i].style.display = "none";
    }
    profpic.style.display = "inline-block";
}

function userdesc() {
    let userdesc = document.getElementById('realuserdesc');
    let maindiv1 = document.getElementsByClassName("maindiv1");
    let classLenght = maindiv1.length;
    for (let i = 0; i < classLenght; i++){
        maindiv1[i].style.display = "none";
    }
    userdesc.style.display = "inline-block";
}

function email() {
    let email = document.getElementById('realemail');
    let maindiv1 = document.getElementsByClassName("maindiv1");
    let classLenght = maindiv1.length;
    for (let i = 0; i < classLenght; i++){
        maindiv1[i].style.display = "none";
    }
    email.style.display = "inline-block";
}

function passwd() {
    let passwd = document.getElementById('realpasswd');
    let maindiv1 = document.getElementsByClassName("maindiv1");
    let classLenght = maindiv1.length;
    for (let i = 0; i < classLenght; i++){
        maindiv1[i].style.display = "none";
    }
    passwd.style.display = "inline-block";
}

function patreon() {
    let patreon = document.getElementById('realpatreon');
    let maindiv1 = document.getElementsByClassName("maindiv1");
    let classLenght = maindiv1.length;
    for (let i = 0; i < classLenght; i++){
        maindiv1[i].style.display = "none";
    }
    patreon.style.display = "inline-block";
}

function uplabel() {
    let label = document.getElementById("settingsfilelabel");
    let file = document.getElementById("picupload");
    setInterval(function(){
        if (file.value !== ""){
            label.innerHTML = "Selected";
            label.style.color = "#27ae60";
        }
    }, 1);

}