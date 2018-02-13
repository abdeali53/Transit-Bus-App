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
        header("Location: " . "login.php"); 
    }else{
        Console.log("condition not met");
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
     <img src="TTC.png" id = "profile_image" alt="Avatar" /> 
    </button>
    <form action = "index.html" method = "POST">
    <div class="profile__form">
      <div class="profile__fields">
        <div class="field">
          <input type="text" id="fieldUser" class="input" name = "name" required pattern=.*\S.* />
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
        <a href="#">Sign Up Here</a>
      </div>
    </form>

     </div>
  </div>
</div>
  
  

    <script  src="js/index.js"></script>




</body>

</html>
