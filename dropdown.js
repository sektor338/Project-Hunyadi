function dropdown() {
    let navbarli = document.getElementsByClassName("navbarli");
    let classLenght = navbarli.length;
    for (let i = 0; i < classLenght; i++){
        navbarli[i].style.display = "block";
    }
}

function navup() {
    let navbarli = document.getElementsByClassName("navbarli");
    let classLenght = navbarli.length;
    for (let i = 0; i < classLenght; i++){
        navbarli[i].style.display = "none";
    }
}