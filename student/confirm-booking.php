<?php 

session_start();
if(isset($_SESSION['destination'])){
    $destination = $_SESSION['destination'];
    $source = $_SESSION['source'] ;
    $bookingDate = $_SESSION['bookingDate'];
    $routeId = $_SESSION['routeId'];
    $time = $_SESSION['time'];
    $ticketAmount = $_SESSION['ticketAmount'];
    $seatNo = 'LAMB - '. $_SESSION['ticketNo'];    
}
else{
    header("Location: " . "index.php");
}


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo $_POST['bookingDate'];
    // echo $_POST['routeId'];
    // echo $_POST['amount'];
    // echo $_POST['seatNo'];
    require("../dbconnection.php");
    $connection = connect();

    if (mysqli_connect_errno())
    {         
        $output = array("message" =>  "Failed to connect to MySQL: " . mysqli_connect_error());
        echo json_encode($output);
        exit();
    }



    $sql = "INSERT INTO bus_ticket";
$sql .= "(UserId,RouteId,BookingDate,SeatNo,Price)";
$sql .= "VALUES ";
$sql .= "(";
$sql .= "'1" .  "', ";
$sql .= "" . $routeId . ", ";
$sql .= "'" . $bookingDate . "', ";
$sql .= "'" . $seatNo . "', ";
$sql .= "" . $ticketAmount . "";
$sql .= ")";


$results = mysqli_query($connection, $sql);

if ($results == FALSE) {
    // there was an error in the sql
    echo "Database query failed. <br/>";
    echo "SQL command: " . $sql;
    exit();
  }else{
      // 5. Close database connection
      mysqli_close($connection);
      header("Location: " . "book-ticket.php");
  }

// 4. Release returned data
  mysqli_free_result($results);

// 5. Close database connection
 mysqli_close($connection);
    session_unset();     
}
?>
<?php include 'master-page/left-panel.php' ?>
<div id="right-panel" class="right-panel">
<!-- .content -->
<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-header"><strong>Confirm Ticket</strong></div>
              <div class="card-body card-block">
              <form  action = "confirm-booking.php" method="POST">
                                <div class="row" >
                                    <label for="source" class="control-label col-sm-2">Source:</label>                                    
                                    <input type="hidden" name="routeId" value="<?php echo $routeId?>">
                                    <span class="col-sm-10"><?php echo $source?></span>
                                </div>
                                <div class="row" >
                                    <label for="destination" class="col-sm-2">Destination:</label>                                    
                                    <span class="col-sm-10"><?php echo $destination?></span>
                                </div>
                                <div class="row" >
                                    <label for="bookingDate" class="col-sm-2">Booking Date:</label>
                                    <input type="hidden" name="bookingDate" value="<?php echo $bookingDate?>">
                                    <span class="col-sm-10"><?php echo $bookingDate?></span>
                                </div>
                                <div class="row" >
                                    <label for="time" class="col-sm-2">Time:</label>
                                    <input type="hidden" name="time" value="<?php echo $time?>">
                                    <span class="col-sm-10"><?php echo $time?></span>
                                </div>
                                <div class="row" >
                                    <label for="time" class="col-sm-2">Seat Number:</label>
                                    <input type="hidden" name="seatNo" value="<?php echo $seatNo?>">
                                    <span class="col-sm-10"><?php echo $seatNo?></span>
                                </div>
                                <div class="row" >
                                    <label for="amount" class="col-sm-2">Amount:</label>
                                    <input type="hidden" name="amount" value="<?php echo $ticketAmount?>">
                                    <span class="col-sm-10"><?php echo $ticketAmount?></span>
                                </div>
                    
                    <div class = "row">
                      <div class="col-lg-6">
                        <div class="form-group">                          
                          <button id="confirmTicket" type="submit"   class="btn btn-secondary mb-1">Confrim Ticket</button>
                        </div>
                      </div>
                    </div>
                </form>
            </div>
          </div>

          </div><!-- .animated -->
</div>

</div>
</body>
</html>
