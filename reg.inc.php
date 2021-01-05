<?php
date_default_timezone_set('Europe/Budapest');
      if (isset($_POST['submit'])) {

            include_once 'dbh.inc.php';

            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $country = mysqli_real_escape_string($conn, $_POST['country']);
            $sex = mysqli_real_escape_string($conn, $_POST['sex']);
            $race = mysqli_real_escape_string($conn, $_POST['race']);
            $ideology = mysqli_real_escape_string($conn, $_POST['ideology']);
            $religion = mysqli_real_escape_string($conn, $_POST['religion']);
            $born = mysqli_real_escape_string($conn, $_POST['born']);
            $reg_date = date("Y-m-d H:i:s");
            $points = 0;
            $userdesc = "";

            if (empty($username) ||empty($password) || empty($email) || empty($country) || empty($sex) || empty($race) || empty($ideology) || empty($religion) || empty($born)) {
                                header("Location: register.php?signup=empty");
                                exit();
                            }
                  else {
                                if ($password !== $password2) {
                                    header("Location: register.php?passwordsNotTheSame");
                              exit();
                        }
                        else {
                              if ($ideology == "Communist" || $religion == "Muslim" || $religion == "Hinduist" || $religion == "Judaist" || $race == "Negroid" || $race == "Capoid") {
                                    header("Location: auschwitz.php");
                                    exit();
                              }
                              else {
                                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                          header("Location: register.php?signup=invalidemail");
                                          exit();
                                    }
                                    else {
                                          $sql = "SELECT * FROM users WHERE name = '$username'";
                                          $result = mysqli_query($conn, $sql);
                                          $resultCheck = mysqli_num_rows($result);

                                          if ($resultCheck > 0) {
                                                header("Location: register.php?signup=existinguser");
                                                exit();
                                          }
                                          else {
                                                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                                $sql = "INSERT INTO users (name, pwd, email, country, sex, race,  ideology, religion, born, points, reg_date)
                                                VALUES ('$username', '$hashedPwd', '$email', '$country', '$sex', '$race', '$ideology', '$religion', '$born', '$points', '$reg_date')";
                                                mysqli_query($conn, $sql);
                                                header("Location: actionpage.php");
                                          }
                                    }
                              }
                        }

                  }


            /*include 'error_handler.php'*/
      }
      else {
            header("Location: register.php");
            exit();
      }
