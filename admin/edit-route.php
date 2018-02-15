<?php
if (isset($_GET["id"]) == FALSE) {
  // missing an id parameters, so
  // redirect person back to add employee page
  header("Location: " . "index.php");
  exit();
}

$id = $_GET["id"];

// @TODO: Your code should show the person's information in the form

// @TODO: your database code should  here
//---------------------------------------------------
require("../dbconnection.php");
$connection = connect();

$sql 	 = "SELECT * FROM route ";
$sql 	.= "WHERE route_id='" . $id . "'";

$results = mysqli_query($connection, $sql);

$from_address = "";
$to_address = "";
$time = "";
$is_avail_monday = 0;
$is_avail_tuesday = 0;
$is_avail_wednesday = 0;
$is_avail_thursday = 0;
$is_avail_friday = 0;
$is_avail_saturday = 0;

while ($data = mysqli_fetch_assoc($results)) {
  $from_address = $data['from_address'];
  $to_address = $data['to_address'];
  $time = $data['time'];
  $is_avail_monday = $data['is_avail_monday'];
  $is_avail_tuesday = $data['is_avail_tuesday'];
  $is_avail_wednesday = $data['is_avail_wednesday'];
  $is_avail_thursday = $data['is_avail_thursday'];
  $is_avail_friday = $data['is_avail_friday'];
  $is_avail_saturday = $data['is_avail_saturday'];
}

$timearray = explode(":", $time);
$hour = (int)$timearray[0];
$array = str_split($timearray[1]);
$minute = $array[0].$array[1];
$ampm = $array[2].$array[3];

if ($results == FALSE) {
  // there was an error in the sql
  echo "Database query failed. <br/>";
  echo "SQL command: " . $query;
  exit();
}

$routes = mysqli_fetch_assoc($results);

//---------------------------------------------------

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // get items from DATABASE
  $newroute = [];
  $newroute["rno"] = $_POST['routeNumber'];
  $newroute["bno"] = $_POST['busNumber'];
  $newroute["src"] = $_POST['source'];
  $newroute["dest"] = $_POST['destination'];
  $newroute["arrTime"] = $_POST['arrivalTime'];
  $newroute["deptTime"] = $_POST['departTime'];
  $newroute["is_available_Sat"] = $_POST['is_available_Saturday'];

    $sql2 	 = "UPDATE route SET ";
    $sql2 	.= "routeNumber='" . $newroute["rno"] . "', ";
    $sql2 	.= "busNumber='" . $newroute["bno"] . "', ";
    $sql2 	.= "source='" . $newroute["src"] . "', ";
    $sql2 	.= "destination='" . $newroute["dest"] . "', ";
    $sql2 	.= "arrivalTime='" . $newroute["arrTime"] . "', ";
    $sql2 	.= "departTime='" . $newroute["deptTime"] . "', ";
    $sql2 	.= "is_available_Saturday='" . $newroute["is_available_Sat"] . "' ";
    $sql2 	.= "WHERE id= '" . $id . "' ";

    $results2 = mysqli_query($connection, $sql2);

    if ($results2 == FALSE) {
      // there was an error in the sql
      echo "Database query failed. <br/>";
      echo "SQL command: " . $sql2;
      exit();
    }else{
        // 5. Close database connection
        mysqli_close($connection);
        header("Location: " . "tables-basic.php");
    }

  //---------------------------------------------------

  // @TODO: delete these two statement after your add your db code

}

?>

<?php include 'master-page/left-panel.php' ?>
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">5</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                          </div>
                        </div>

                        <div class="dropdown for-message">
                          <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">9</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                                <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                                <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Basic</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header"><strong>Route Update</strong><small> Form</small></div>
                      <div class="card-body card-block">
                        <form action = "<?php echo "edit-route.php?id=" . $id; ?>" method="POST" >
                          <div class="form-group"><label for="Source" class=" form-control-label">Source</label><input type="text" value="<?php echo $from_address; ?>" name="source" class="form-control"></div>
                          <div class="form-group"><label for="Destination" class=" form-control-label">Destination</label><input value="<?php echo $to_address; ?>" type="text" name="destination"  class="form-control"></div>
                          <div class = "row">
                            <div class="col-lg-12">
                              <div class="form-group"><label for="Time" class=" form-control-label">Time</label>
                                <select name="hours">
                                    <option value="01" <?php $hour == 1 ? ' selected' : '';?>>01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4" <?php $hour == 4 ? ' selected' : '';?>>04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8" >08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                  </select>
                                  <select name="minutes">
                                    <option value="0">00</option>
                                    <option value="05">05</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="35">35</option>
                                    <option value="40">40</option>
                                    <option value="45">45</option>
                                    <option value="50">50</option>
                                    <option value="55">55</option>
                                    <option value="60">60</option>
                                  </select>
                                  <select name="ampm">
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                  </select>
                              </div>
                            </div>
                          </div>
                          <div class = "row">
                            <div class="col-lg-6">
                              <div class="form-group"><label for="Availability" class=" form-control-label">Availability</label><br>
                                <input type="checkbox" name="monday" value="Monday"> Monday<br>
                                <input type="checkbox" name="tuesday" value="Tuesday"> Tuesday<br>
                                <input type="checkbox" name="wednesday" value="Wednesday"> Wednesday<br>
                                <input type="checkbox" name="thursday" value="Thursday"> Thursday<br>
                                <input type="checkbox" name="friday" value="Friday"> Friday<br>
                                <input type="checkbox" name="saturday" value="Saturday"> Saturday<br>
                              </div>
                            </div>
                          </div>
                          <div class = "row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <button type="submit" class="btn btn-secondary mb-1">Update Route</button>
                              </div>
                            </div>
                          </div>
                        </form>
                    </div>
                  </div>

                  </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
    <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>

  </body>
</html>
