function postedit() {
    let getclass = event.srcElement.className;
    let postid = parseInt(getclass);
    let title = document.getElementsByClassName(String(postid) + ' titlea')[0].innerHTML;
    let textarea = document.getElementsByClassName(String(postid) + ' titlediv')[0];
    $.ajax({
        url: 'titleedit.php',
        type: 'POST',
        data: {
            postid: postid,
            postedit: title
        },
        success:function (response) {
            textarea.innerHTML = response;
        }
    });
}
function postedited() {
    let getclass = event.srcElement.className;
    let postid = parseInt(getclass.slice(0, -11));
    let title = document.getElementsByClassName(String(postid) + ' titleinput')[0].value;
    let textarea = document.getElementsByClassName(String(postid) + ' titlediv')[0];
    $.ajax({
        url: 'titleedit.php',
        type: 'POST',
        data: {
            postid: postid,
            postedited: title
        },
        success:function (response) {
            textarea.innerHTML = response;
        }
    });
}
function postdelete() {
    let postid = event.srcElement.className;
    let post = document.getElementsByClassName(postid)[0];
    let point = document.getElementById(postid).innerHTML;
    if (point == "0"){
        post.style.display = "none";
        $(document).ready(function() {
            $.ajax({
                url: 'postaction.php',
                type: 'POST',
                data: {
                    postdelete: "delete",
                    postid: postid
                }
            });
        });
        alert("You've deleted your post!");
    }
    else{
        alert("You can't delete posts that has more or less points than 0!");
    }
}
function postpagedelete() {
    let postid = event.srcElement.className;
    let post = document.getElementsByClassName(postid)[0];
    let point = document.getElementById(postid).innerHTML;
    if (point == "0"){
        post.style.display = "none";
        $(document).ready(function() {
            $.ajax({
                url: 'postaction.php',
                type: 'POST',
                data: {
                    postdelete: "delete",
                    postid: postid
                }
            });
        });
        alert("You've deleted your post!");
        window.location.replace("https://eaglesnest88.media/fresh.php");
    }
    else{
        alert("You can't delete posts that has more or less points than 0!");
    }
}