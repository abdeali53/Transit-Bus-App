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

                                $dbhost = "localhost";
                                $dbuser = "root";
                                $dbpass = "";
                                $dbname = "transit_database";

                                // 1. Create a database connection
                                $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

                                // show an error message if PHP cannot connect to the database
                                if (mysqli_connect_errno())
                                {
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                exit();
                                }

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
