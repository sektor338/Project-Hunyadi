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