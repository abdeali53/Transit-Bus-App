<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {

$source = $_POST['source'];
$destination = $_POST['destination'];

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

}
?>

<?php include 'master-page/left-panel.php' ?>
    <div id="right-panel" class="right-panel">
        <div class="card">
                        <div class="card-header"><strong>New Route</strong></div>
                        <div class="card-body card-block">
                            <form action = "new-bus.php" method="POST" >
                                <div class="form-group">
                                    <label for="Source" class=" form-control-label">Source</label>
                                    <select class="form-control" id="source">
                                        <option value="Lambton">Lambton</option>
                                        <option value="Mississauga">Mississauga</option>
                                        <option value="Brampton">Brampton</option>
                                    </select>    
                                </div>
                                <div class="form-group">
                                    <label for="Destination" class=" form-control-label">Destination</label>
                                    <select class="form-control" id="destination">
                                        <option value="Lambton">Lambton</option>
                                        <option value="Mississauga">Mississauga</option>
                                        <option value="Brampton">Brampton</option>
                                    </select>  
                                </div>
                                <div class="form-group"><button type="submit" class="btn btn-secondary mb-1">Next Bus</button></div>
                            </form>
                        </div>
        </div>
    </div>
</body>
</html>