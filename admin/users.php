<?php if(isset($_COOKIE['tokenid'])) 
 { 
  $tokenID = $_COOKIE['tokenid'];

  require("../dbconnection.php");
  $connection = connect();
  
  $sql2  = "SELECT * FROM validsessions where tokenid =" . $tokenID;

  $results2 = mysqli_query($connection, $sql2);     
  $correctuser = mysqli_fetch_assoc($results2);
  if ($results2 == FALSE ||  $correctuser['username'] != $_COOKIE['tokenusername']) {
    // there was an error in the sql 
    echo "erro";
    // header("Location: " . "../log.php");
    exit();
  }
  
?>
<?php include 'master-page/left-panel.php' ?>


        <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->


                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Users</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Name</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Password</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

                                require("../dbconnection.php");
                                $connection = connect();

                                $sql = "SELECT * FROM user";

                                $results = mysqli_query($connection, $sql);

                                while ($user = mysqli_fetch_assoc($results)) { ?>
                                <tr>
                                  <th scope="row"><?php echo $user['name']; ?></th>
                                  <td><?php echo $user['email']; ?></td>
                                  <td><?php echo $user['password']; ?></td>
                                  <?php } ?>
                                </tr>
                              </tbody>
                            </table>
                             
                        </div>
                    </div>
                </div>



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <?php
    // clean up and close database
    mysqli_free_result($results);
    mysqli_close($connection);
  ?>

</body>
</html>
 <?php 
}else{
  header("Location: " . "../log.php");
}
  ?>
