<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
// @TODO: your database code should  here
//---------------------------------------------------
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "transit_database";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql 	 = "SELECT * FROM user ";

$results = mysqli_query($connection, $sql);
      
if ($results == FALSE) {
  // there was an error in the sql 
  echo "Database query failed. <br/>";
  echo "SQL command: " . $query;
  exit();
}
while ($user = mysqli_fetch_assoc($results)) { 
    if ($user['email']==$_POST['email'] && $user['password']==$_POST['password']){
        echo "Success" ;
        header("Location: " . "tables-basic.php"); 
    }else{
      echo "Failure" ;
        //  header("Location: " . "log.php"); 
    }
}
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Material Design Login Form</title>
      <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <!--Google Font - Work Sans-->
<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,700' rel='stylesheet' type='text/css'>
<div class="container">
  <div class="profile">
    <button class="profile__avatar" id="toggleProfile">
     <img src="TTC.png" alt="Avatar" /> 
    </button>
    <form action = "log.php" method = "POST">
    <div class="profile__form">
      <div class="profile__fields">
        <div class="field">
          <input type="text" id="fieldUser" class="input" name = "email" required pattern=.*\S.* />
          <label for="fieldUser" class="label">Username</label>
        </div>
        <div class="field">
          <input type="password" id="fieldPassword" class="input" name = "password" required pattern=.*\S.* />
          <label for="fieldPassword" class="label">Password</label>
        </div>
        <div class="profile__footer">
           <input class="button raised blue" type = "submit" value = "LOGIN">
        </div>
      </div>
       <a href="sign-up.php" >Sign Up Here</a>
    </div>
    </form>

     </div>
  </div>
</div>
  
  

    <script  src="js/index.js"></script>




</body>

</html>
