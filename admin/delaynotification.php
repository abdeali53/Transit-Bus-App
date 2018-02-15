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
<?php
require("../twilio-php-master/Twilio/autoload.php");
use Twilio\Rest\Client;
if($_SERVER['REQUEST_METHOD'] == 'POST') {

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "root";
  $dbname = "transit";

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

  $account_sid = 'AC1f70cfb991b87c000be5f21d19c2f990';
  $auth_token = '0542fb8108d66694893ac99d964417fc';

  // A Twilio number you own with SMS capabilities
  $twilio_number = "+16474924480";

  $client = new Client($account_sid, $auth_token);

  $array_phonenumbers = array();
   while ($user = mysqli_fetch_assoc($results)) {
    array_push($array_phonenumbers,$user['phone_number']);
    $client->messages->create(
        // Where to send a text message (your cell phone?)
        $user['phone_number'],
        array(
            'from' => $twilio_number,
            'body' => 'Next bus will going to be delayed!!!'
        )
    );
   }

   mysqli_free_result($results);
   mysqli_close($connection);

    echo '<script language="javascript">';
    echo 'alert("message is successfully sent")';
    echo '</script>';
}
?>

<?php include 'master-page/left-panel.php' ?>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">BUS DELAY NOTIFICATION</strong>
                        </div>
                        <div class="card-body">
                          <form action = "delaynotification.php" method="POST" >
                              <button type="submit" class="btn btn-secondary mb-1">SEND NOTIFICATION</button>
                          </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
</html>
 <?php 
}else{
  header("Location: " . "../log.php");
}
  ?>
