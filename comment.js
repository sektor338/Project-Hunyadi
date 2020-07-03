function commentsf(){
    let getclass = event.srcElement.className;
    let post_id = parseInt(getclass.slice(0, -7));
    let cdiv = document.getElementsByClassName(String(post_id) + ' commentsec');
    if (cdiv.item(0).style.display === "block"){
        cdiv.item(0).style.display = "none";
    }
    else {
        cdiv.item(0).style.display = "block";
    }
}

function creportf() {
    let getclass = event.srcElement.className
    let comment_id = parseInt(getclass.slice(0, -21));
    let commenter = event.srcElement.name;
    let reportbutton = document.getElementsByClassName(String(comment_id) + ' commentsbottombuttons')[0];
    $.ajax({
        url: 'reporthandler.php',
        type: 'POST',
        data: {
            post_id: comment_id,
            poster: commenter,
            report: "commentreport"
        }
    });
    reportbutton.style.display = "none";
    alert("Comment has been reported");
}
let commentCount = 2;
function loadcomments() {
    commentCount = commentCount + 2;
    let getclass = event.srcElement.className;
    let post_id = parseInt(getclass.slice(0, -11));
    let comments = document.getElementsByClassName(String(post_id) + ' comments');
        $.ajax({
            url: 'commentsection.php',
            type: 'POST',
            data: {
            commentlimit : commentCount,
            postid: post_id
            },
            success:function (response) {
                comments.item(0).innerHTML = response;
            }
        });
}

function csubmit() {
    let commentCount = 2;
    let getclass = event.srcElement.className;
    let post_id = parseInt(getclass.slice(0, -13));
    let commenter = document.getElementsByClassName(String(post_id) + " commenter")[0].value;
    let comment = document.getElementsByClassName(String(post_id) + " commentinput")[0].value;
    let textarea = document.getElementsByClassName(String(post_id) + " commentinput")[0];
    let submit = document.getElementsByClassName(String(post_id) + " commentwritesubmit")[0].value;
    let comments = document.getElementsByClassName(String(post_id) + ' comments');
    if (comment !== ""){
        $(document).ready(function() {
            $.ajax({
                url: 'comment.inc.php',
                type: 'POST',
                data: {
                    commenter: commenter,
                    postid: post_id,
                    comment: comment,
                    Submit: submit
                }
            });
            $.ajax({
                url: 'commentsection.php',
                type: 'POST',
                data: {
                    commentlimit : commentCount,
                    postid: post_id
                },
                success:function (response) {
                    comments.item(0).innerHTML = response;
                }
            });
            textarea.value = "";
            $.ajax({
                url: 'commenttextarea.php',
                type: 'POST',
                data: {
                    postid: post_id
                },
                success:function (response) {
                    textarea.innerHTML = response;
                }
            });
        });
    }
}

function ceditdisplay() {
    let comment_id = event.srcElement.id;
    let pcomment = document.getElementsByClassName(String(comment_id) + ' commentsupperrightdownp')[0].innerHTML;
    let textarea = document.getElementsByClassName(String(comment_id) + ' commentsupperrightdown')[0];
    $.ajax({
        url: 'commentsec.php',
        type: 'POST',
        data: {
            commentid: comment_id,
            edittext: pcomment
        },
        success:function (response) {
            textarea.innerHTML = response;
        }
    });
}

function cedit() {
    let getclass = event.srcElement.className;
    let comment_id = parseInt(getclass.slice(0, -15));
    let editedcomment = document.getElementsByClassName(String(comment_id) + ' commenteditsavep')[0].value;
    let textarea = document.getElementsByClassName(String(comment_id) + ' commentsupperrightdown')[0];
    $.ajax({
        url: 'commentsec.php',
        type: 'POST',
        data: {
            commentid: comment_id,
            editedtext: editedcomment
        },
        success:function (response) {
            textarea.innerHTML = response;
        }
    });
}

function cdelete() {
    let commentCount = 2;
    let getclass = event.srcElement.className;
    let comment_id = event.srcElement.id;
    let post_id = parseInt(getclass.slice(0, -24));
    let comments = document.getElementsByClassName(String(post_id) + ' comments');
    $.ajax({
        url: 'comment.inc.php',
        type: 'POST',
        data: {
            dcomment_id: comment_id
        }
    });
    $.ajax({
        url: 'commentsection.php',
        type: 'POST',
        data: {
            commentlimit : commentCount,
            postid: post_id
        },
        success:function (response) {
            comments.item(0).innerHTML = response;
        }
    });
}

function cupvotef() {
    let getclass = event.srcElement.className;
    let comment_id = parseInt(getclass.slice(0, -7));
    let commenter = event.srcElement.name;
    let point = document.getElementsByClassName(String(comment_id) + ' commentsupperrightuppoints');
    let thisimg = event.srcElement;
    let otherimg = document.getElementsByClassName(String(comment_id) + ' cdownvote');
    $(document).ready(function() {
        $.ajax({
            url: 'comment.inc.php',
            type: 'POST',
            data: {
                caction: "clike",
                comment_id: comment_id,
                commenter: commenter
            }
        });
        setTimeout(function () {
            $.ajax({
                url: 'refreshcpoints.php',
                type: 'GET',
                data: {
                    comment_id: comment_id,
                },
                success:function(response) {
                    point.item(0).innerHTML = response;
                    if (thisimg.src === "https://eaglesnest88.media/pictures/icons/upvoteb.png"){
                        thisimg.src = "https://eaglesnest88.media/pictures/icons/upvoteg.png";
                        otherimg.item(0).src = "pictures/icons/downvoteb.png";
                    }
                    else {
                        thisimg.src = "https://eaglesnest88.media/pictures/icons/upvoteb.png";
                    }
                }
            });
        },1000);
    });
}

function cdownvotef() {
    let getclass = event.srcElement.className;
    let comment_id = parseInt(getclass.slice(0, -9));
    let commenter = event.srcElement.name;
    let point = document.getElementsByClassName(String(comment_id) + ' commentsupperrightuppoints');
    let thisimg = event.srcElement;
    let otherimg = document.getElementsByClassName(String(comment_id) + ' cupvote');
    $(document).ready(function() {
        $.ajax({
            url: 'comment.inc.php',
            type: 'POST',
            data: {
                caction: "cdislike",
                comment_id: comment_id,
                commenter: commenter
            }
        });
        setTimeout(function () {
            $.ajax({
                url: 'refreshcpoints.php',
                type: 'GET',
                data: {
                    comment_id: comment_id,
                },
                success:function(response) {
                    point.item(0).innerHTML = response;
                    if (thisimg.src === "https://eaglesnest88.media/pictures/icons/downvoteb.png"){
                        thisimg.src = "https://eaglesnest88.media/pictures/icons/downvoteg.png";
                        otherimg.item(0).src = "pictures/icons/upvoteb.png";
                    }
                    else {
                        thisimg.src = "https://eaglesnest88.media/pictures/icons/downvoteb.png";
                    }
                }
            });
        },1000);

    });
}
