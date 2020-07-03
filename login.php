<!DOCTYPE html>
<html lang="en">
      <head>
            <?php
            include 'header.php';
            ?>
            <link rel="stylesheet" href="login.css">
            <script src="login.js"></script>
      </head>
      <body id="background" onload="background()" background="pictures/backgrounds/32.jpg">
            <main>
                  <center>
                        <div id="header">
                              <div id="logodiv">
                                    <img id="logo" src="pictures/logo/logo.jpg" alt="Heil Hitler" draggable="false">
                              </div>
                              <div id="eagle">
                                    <a>Eagle's Nest</a>
                              </div>
                        </div>
                        <div class="maindiv">
                              <form id="form" action="log.inc.php" method="post">
                                    <div id="bar">
                                          <a id="bara">Heil Hitler</a>
                                    </div>
                                    <div class="inputdiv">
                                          <input class="input" type="text" name="username" placeholder="username" required>
                                    </div>
                                    <div class="inputdiv">
                                          <input class="input" type="password" name="password" placeholder="password" required>
                                    <div class="inputdiv">
                                          <button id="login" type="submit" name="login">Login</button>
                                          <br>

                                    </div>
                              </form>
                            <a id="forgotpwd" href="pwdreset.php">Forgot your password?</a>
                            <?php
                            if (isset($_GET['email'])){
                                if ($_GET['email'] == "sent"){
                                    echo "<a>Check your email!</a>";
                                }
                            }
                            ?>
                        </div>

                  </center>
            </main>
      </body>
</html>






