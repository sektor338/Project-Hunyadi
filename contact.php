<!DOCTYPE html>
<html lang="en">
      <head>
            <?php include 'header.php';?>
            <script src="main.js"></script>
            <link rel="stylesheet" href="index.css">
      </head>
      <body>
            <?php include 'navbar.php'; ?>
            <main>

                  <center>
                        <div class="contactdiv">
                              <h1>CONTACT US</h1>
                              <form class="" action="contact.email.php" method="POST">
                                    <label for="c-name">Name</label><br>
                                    <input type="text" name="c-name" minlength="4" maxlength="255">
                                    <br>
                                    <br>
                                    <label for="c-email">Email</label><br>
                                    <input type="email" name="c-email" minlength="5" maxlength="255">
                                    <br>
                                    <br>
                                    <label for="c-subject">Subject</label><br>
                                    <select class="subject" name="c-subject">
                                          <option value="problem">Problem</option>
                                          <option value="idea">Idea</option>
                                    </select>
                                    <br>
                                    <br>
                                    <label for="c-text">Message</label><br>
                                    <textarea name="c-text" minlength="10"></textarea>
                                    <br>
                                    <br>
                                    <input type="submit" value="Submit">
                              </form>
                        </div>
                  </center>


            </main>

            <?php include 'footer.php'; ?>

                  <?php // IDEA: chat, jobb alul ?>

      </body>
</html>
