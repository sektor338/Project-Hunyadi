<?php
if (isset($_POST['postid'])){
    echo"<textarea class='".$_POST['postid']." commentinput' draggable='false' cols='40' rows='3' maxlength='200'></textarea>";
}
