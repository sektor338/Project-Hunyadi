<?php echo "
<div class='rightdiv'>
                      <div class='maindiv' id='topusers'> <table>";
                                include_once 'dbh.inc.php';
                                $sql6 = "SELECT * FROM users ORDER BY points DESC LIMIT 6";
                                $result = mysqli_query($conn, $sql6);
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "
                                    <tr class='toptr'>
                                       <td class='toptd'><img class='img' id='collar_badgestop' src='".$row['collar_badges']."' alt='collar_badges'></td>
                                       <td class='toptd'><a id='topusername' href='users.php?user=".$row['name']."'>".$row['name']."</a></td>
                                       <td class='toptd'><a class='topuserpoints'>".$row['points']."</a></td>
                                   </tr>";
                                }
                              ?>
                         </table>
                      </div>

                  </div>