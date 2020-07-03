<!DOCTYPE html>
<html lang="en">
      <head>
            <?php include 'header.php';?>
            <?php include 'upload.inc.php';?>
            <script src="upload.js"></script>
            <link rel="stylesheet" href="upload.css">
      </head>
      <body>
            <?php include 'navbar.php'; ?>
            <?php
            if (!isset($_SESSION['username'])) {
                header("Location: index.php");
            }
            ?>
            <main>
                <center>
                <div id="uploaddiv">
                    <div id="uploaddivup">
                        <form method="POST" action="upload.inc.php" enctype="multipart/form-data">
                            <input type="hidden" name="size" value="10000000">
                            <?php
                            echo '<input type="hidden" name="usname" value="'.$_SESSION['username'].'">';
                            ?>
                            <div>
                                <h1 id="uploadh1">Upload</h1>
                            </div>
                            <div id="leftdiv1">
                                <label for="title">Title</label><br>
                                <input class="input" type="text" name="title" maxlength="34" required><br>
                                <label for="tags">Tags</label><br>
                                <input class="input" type="text" name="tags" maxlength="20">
                            </div>
                            <div id="rightdiv1">
                                <label onclick="uplabel()" id="filelabel" for="fileuploadbutton">Select a file</label>
                                <input id="fileuploadbutton" class="fileuploadb" type="file" name="image" required>
                            </div>
                            <div id="subdiv">
                                <input id="submit" value="Upload" type="submit" name="upload">
                            </div>
                        </form>
                    </div>
                    <div id="uploaddivdown">
                        <div class="hintdiv">
                            <img class="hintpic" src="pictures/icons/resolution.png" alt="resolution">
                            <p class="hinttext">Please upload your content with the best resolution.</p>
                        </div>
                        <div class="hintdiv">
                            <img class="hintpic" src="pictures/icons/tag.png" alt="tag">
                            <p class="hinttext">If you want to add more tag just leave a space between the tags.</p>
                        </div>
                        <div class="hintdiv">
                            <img class="hintpic" src="pictures/icons/report.png" alt="repost">
                            <p class="hinttext">Please avoid reposting, users will report you and it will cause you trouble.</p>
                        </div>
                        <div class="hintdiv">
                            <img class="hintpic" src="pictures/icons/files.png" alt="resolution">
                            <p class="hinttext">Allowed files: jpg, jpeg, png, gif, mp4, webm, mov</p>
                        </div>
                    </div>
                </div>
                </center>
            </main>
<?php include 'footer.php';?>
      </body>
</html>
