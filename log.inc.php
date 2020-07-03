<?php

session_start();

      if (isset($_POST['login'])) {
            include 'dbh.inc.php';

            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            if (empty($username) || empty($password)) {
                  header("Location: login.php?erroremp");
                  exit();
            }
            else {
                  $sql = "SELECT * FROM users WHERE name = '$username'";
                  $result = mysqli_query($conn, $sql);
                  $resultCheck = mysqli_num_rows($result);
                  if ($resultCheck < 1) {
                        header("Location: login.php?erroruser");
                        exit();
                  }
                  else {
                        if ($row = mysqli_fetch_assoc($result)) {
                              $hashedPwdCheck = password_verify($password, $row['pwd']);
                              if ($hashedPwdCheck == false) {
                                    header("Location: login.php?errorpwd");
                                    exit();
                              }
                              elseif ($hashedPwdCheck == true) {
                                    $_SESSION['userid'] = $row['id'];
                                    $_SESSION['username'] = $row['name'];
                                    $_SESSION['email'] = $row['email'];
                                    $_SESSION['country'] = $row['country'];
                                    $_SESSION['religion'] = $row['religion'];
                                    $_SESSION['ideology'] = $row['ideology'];
                                    $_SESSION['race'] = $row['race'];
                                    $_SESSION['birth'] = $row['born'];
                                    $_SESSION['points'] = $row['points'];
                                    $_SESSION['userdesc'] = $row['user_desc'];
                                    $_SESSION['profpic'] = $row['profile_pic'];
                                    $_SESSION['collar_badges'] = $row['collar_badges'];
                                    $_SESSION['shoulder_straps'] = $row['shoulder_straps'];
                                    $_SESSION['parka'] = $row['parka'];
                                    $_SESSION['patreon'] = $row['patreon'];
                                    $_SESSION['division'] = $row['waffenssdiv'];
                                    header("Location: index.php?login=success");
                                    exit();
                              }
                        }
                  }
            }
      }
      else {
            header("Location: login.php?error");
            exit();
      }
