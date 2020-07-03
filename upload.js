function uplabel() {
    let label = document.getElementById("filelabel");
    let file = document.getElementById("fileuploadbutton");
    setInterval(function(){
        if (file.value !== ""){
            label.innerHTML = "Selected";
            label.style.color = "#27ae60";
        }
    }, 1);

}