function upvotef() {
      let getclass = event.srcElement.className;
      let post_id = parseInt(getclass.slice(0, -6));
      let poster = event.srcElement.name;
      let point = document.getElementById(post_id);
      let thisimg = event.srcElement;
      let otherimg = document.getElementsByClassName(String(post_id) + ' downvote');
      $(document).ready(function() {
            $.ajax({
                  url: 'udvote.php',
                  type: 'POST',
                  data: {
                        action: "like",
                        post_id: post_id,
                        poster: poster
                  }
            });
            setTimeout(function () {
                  $.ajax({
                        url: 'refreshpoints.php',
                        type: 'GET',
                        data: {
                              post_id: post_id,
                        },
                        success:function(response) {
                              point.innerHTML = response;
                              if (thisimg.src === "https://eaglesnest88.com/pictures/icons/upvoteb.png"){
                                    thisimg.src = "https://eaglesnest88.com/pictures/icons/upvoteg.png";
                                    otherimg.item(0).src = "https://eaglesnest88.com/pictures/icons/downvoteb.png";
                              }
                              else {
                                    thisimg.src = "https://eaglesnest88.com/pictures/icons/upvoteb.png";
                              }
                        }
                  });
            },1000);
      });
}

function downvotef() {
      let getclass = event.srcElement.className
      let post_id = parseInt(getclass.slice(0, -8));
      let poster = event.srcElement.name;
      let point = document.getElementById(post_id);
      let thisimg = event.srcElement;
      let otherimg = document.getElementsByClassName(String(post_id) + ' upvote');
      $(document).ready(function() {
            $.ajax({
                  url: 'udvote.php',
                  type: 'POST',
                  data: {
                        action: "dislike",
                        post_id: post_id,
                        poster: poster
                  }
            });
            setTimeout(function () {
                  $.ajax({
                        url: 'refreshpoints.php',
                        type: 'GET',
                        data: {
                              post_id: post_id,
                        },
                        success:function(response) {
                              point.innerHTML = response;
                              if (thisimg.src === "https://eaglesnest88.com/pictures/icons/downvoteb.png"){
                                    thisimg.src = "https://eaglesnest88.com/pictures/icons/downvoteg.png";
                                    otherimg.item(0).src = "https://eaglesnest88.com/pictures/icons/upvoteb.png";
                              }
                              else {
                                    thisimg.src = "https://eaglesnest88.com/pictures/icons/downvoteb.png";
                              }
                        }
                  });
            },1000);

      });
}

function reportf() {
    let getclass = event.srcElement.className
    let post_id = parseInt(getclass.slice(0, -6));
    let poster = event.srcElement.name;
    let reportbutton = document.getElementsByClassName(String(post_id) + ' report')[0];
      $.ajax({
            url: 'reporthandler.php',
            type: 'POST',
            data: {
                  post_id: post_id,
                  poster: poster,
                  report: "postreport"
            }
      });
      reportbutton.style.display = "none";
      alert("Post has been reported");
}
