<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {

// Get the form values that were sent by addEmployee.php
$newuser = [];
$newuser["nam"] = $_POST['name'];
$newuser["em"] = $_POST['email'];
$newuser["pass"] = $_POST['password'];

// @TODO: your database code should  here
//---------------------------------------------------
// Credentials
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

//INSERT INTO `employees` (`id`, `first_name`, `last_name`, `hire_date`) VALUES ('2', 'sss', 'www', '2017-08-07');
// 2. Perform database query (INSERT DATA IN TABLE)
$sql = "INSERT INTO user";
$sql .= "(name,email,password)";
$sql .= "VALUES ";
$sql .= "(";
$sql .= "'" . $newuser["nam"] . "', ";
$sql .= "'" . $newuser["em"] . "', ";
$sql .= "'" . $newuser["pass"] . "'";
$sql .= ")";

$results = mysqli_query($connection, $sql);

if ($results == FALSE) {
    // there was an error in the sql 
    echo "Database query failed. <br/>";
    echo "SQL command: " . $sql;
    exit();
  }

// 4. Release returned data
//  mysqli_free_result($results);

// 5. Close database connection
mysqli_close($connection);
} 
?>

<?php include 'master-page/left-panel.php' ?>
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

       


        <div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header"><strong>ADD User</strong><small> Form</small></div>
                      <div class="card-body card-block">
                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST')
                        {
                        echo "<div class='row'>";
                        echo "<div class='alert alert-success col-md-7 col-md-offset-2' role='alert' align='center'>
                        User information has been added Successfully. <a class = 'alert-link' href = 'users.php'><span>
                        Go back to Users</span></a>
                        </div>";
                        echo "</div>";
                        }
                        ?>
                        <form action = "add-user.php" method="POST" >
                            <div class="form-group"><label for="Name" class=" form-control-label">Name</label><input type="text" name="name"  class="form-control"></div>
                            <div class="form-group"><label for="Email" class=" form-control-label">Email</label><input type="text" name="email"  class="form-control"></div>
                            <div class="form-group"><label for="Password" class=" form-control-label">Password</label><input type="text" name="password"  class="form-control"></div>
                            <p>
                            <button type="submit" class="btn btn-secondary mb-1">add</button>
                            </p>
                        </form>
                    </div>
                    <div>
                    
                 
                        
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
    
  </body>
</html>
