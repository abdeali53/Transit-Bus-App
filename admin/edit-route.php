<?php
if (isset($_GET["id"]) == FALSE) {
  // missing an id parameters, so
  // redirect person back to add employee page
  header("Location: " . "index.html");
  exit();
}

$id = $_GET["id"];

// @TODO: Your code should show the person's information in the form

// @TODO: your database code should  here
//---------------------------------------------------
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "transit";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

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
  $newroute["src"] = $_POST['source'];
  $newroute["dest"] = $_POST['destination'];
  $newroute["time"] = $_POST['hours'] . ":" . $_POST['minutes'] . $_POST['ampm'];
  if ($_POST['monday'] == "Monday") {
    $newroute["monday"] = 1;
  }
  else {
    $newroute["monday"] = 0;
  }
  if ($_POST['tuesday'] == "Tuesday") {
    $newroute["tuesday"] = 1;
  }
  else {
    $newroute["tuesday"] = 0;
  }
  if ($_POST['wednesday'] == "Wednesday") {
    $newroute["wednesday"] = 1;
  }
  else {
    $newroute["wednesday"] = 0;
  }
  if ($_POST['thursday'] == "Thursday") {
    $newroute["thursday"] = 1;
  }
  else {
    $newroute["thursday"] = 0;
  }
  if ($_POST['friday'] == "Friday") {
    $newroute["friday"] = 1;
  }
  else {
    $newroute["friday"] = 0;
  }
  if ($_POST['saturday'] == "Saturday") {
    $newroute["saturday"] = 1;
  }
  else {
    $newroute["saturday"] = 0;
  }

    $sql2 	 = "UPDATE route SET ";
    $sql2 	.= "from_address='" . $newroute["src"] . "', ";
    $sql2 	.= "to_address='" . $newroute["dest"] . "', ";
    $sql2 	.= "time='" . $newroute["time"] . "', ";
    $sql2 	.= "is_avail_monday=" . $newroute["monday"] . ", ";
    $sql2 	.= "is_avail_tuesday=" . $newroute["tuesday"] . ", ";
    $sql2 	.= "is_avail_wednesday=" . $newroute["wednesday"] . ", ";
    $sql2 	.= "is_avail_thursday=" . $newroute["thursday"] . ", ";
    $sql2 	.= "is_avail_friday=" . $newroute["friday"] . ", ";
    $sql2 	.= "is_avail_saturday=" . $newroute["saturday"] . " ";
    $sql2 	.= "WHERE route_id=" . $id . " ";

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

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Routes</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                            <a href="tables-basic.php"><i class="menu-icon fa fa-table"></i>View All Routes</a>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="add-route.php"> <i class="menu-icon fa fa-laptop"></i>Add a Route</a>
                    </li>

                    <h3 class="menu-title">Manage User</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#"> <i class="menu-icon fa fa-tasks"></i>Add user</a>
                    </li>

                    <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
                    <li class="menu-item">
                        <a href="#"> <i class="menu-icon fa fa-glass"></i>Logout</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

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
                                  <?php
                                    if ($hour == 1) {
                                      echo '<option value="01" selected>01</option>';
                                    } else {
                                      echo '<option value="01">01</option>';
                                    }
                                    if ($hour == 2) {
                                      echo '<option value="02" selected>02</option>';
                                    } else {
                                      echo '<option value="02">02</option>';
                                    }
                                    if ($hour == 3) {
                                      echo '<option value="03" selected>03</option>';
                                    } else {
                                      echo '<option value="03">03</option>';
                                    }
                                    if ($hour == 4) {
                                      echo '<option value="04" selected>04</option>';
                                    } else {
                                      echo '<option value="04">04</option>';
                                    }
                                    if ($hour == 5) {
                                      echo '<option value="05" selected>05</option>';
                                    } else {
                                      echo '<option value="05">05</option>';
                                    }
                                    if ($hour == 6) {
                                      echo '<option value="06" selected>06</option>';
                                    } else {
                                      echo '<option value="06">06</option>';
                                    }
                                    if ($hour == 7) {
                                      echo '<option value="07" selected>07</option>';
                                    } else {
                                      echo '<option value="07">07</option>';
                                    }
                                    if ($hour == 8) {
                                      echo '<option value="08" selected>08</option>';
                                    } else {
                                      echo '<option value="08">08</option>';
                                    }
                                    if ($hour == 9) {
                                      echo '<option value="09" selected>09</option>';
                                    } else {
                                      echo '<option value="09">09</option>';
                                    }
                                    if ($hour == 10) {
                                      echo '<option value="10" selected>10</option>';
                                    } else {
                                      echo '<option value="10">10</option>';
                                    }
                                    if ($hour == 11) {
                                      echo '<option value="11" selected>11</option>';
                                    } else {
                                      echo '<option value="11">11</option>';
                                    }
                                    if ($hour == 12) {
                                      echo '<option value="12" selected>12</option>';
                                    } else {
                                      echo '<option value="12">12</option>';
                                    }
                                  echo '</select>';
                                  echo '<select name="minutes">';
                                  if ($minute == 0) {
                                    echo '<option value="0" selected>00</option>';
                                  } else {
                                    echo '<option value="0">00</option>';
                                  }
                                  if ($minute == 5) {
                                    echo '<option value="5" selected>05</option>';
                                  } else {
                                    echo '<option value="5">05</option>';
                                  }
                                  if ($minute == 10) {
                                    echo '<option value="10" selected>10</option>';
                                  } else {
                                    echo '<option value="10">10</option>';
                                  }
                                  if ($minute == 15) {
                                    echo '<option value="15" selected>15</option>';
                                  } else {
                                    echo '<option value="15">15</option>';
                                  }
                                  if ($minute == 20) {
                                    echo '<option value="20" selected>20</option>';
                                  } else {
                                    echo '<option value="20">20</option>';
                                  }
                                  if ($minute == 25) {
                                    echo '<option value="25" selected>25</option>';
                                  } else {
                                    echo '<option value="25">25</option>';
                                  }
                                  if ($minute == 30) {
                                    echo '<option value="30" selected>30</option>';
                                  } else {
                                    echo '<option value="30">30</option>';
                                  }
                                  if ($minute == 35) {
                                    echo '<option value="35" selected>35</option>';
                                  } else {
                                    echo '<option value="35">35</option>';
                                  }
                                  if ($minute == 40) {
                                    echo '<option value="40" selected>40</option>';
                                  } else {
                                    echo '<option value="40">40</option>';
                                  }
                                  if ($minute == 45) {
                                    echo '<option value="45" selected>45</option>';
                                  } else {
                                    echo '<option value="45">45</option>';
                                  }
                                  if ($minute == 50) {
                                    echo '<option value="50" selected>50</option>';
                                  } else {
                                    echo '<option value="50">50</option>';
                                  }
                                  if ($minute == 55) {
                                    echo '<option value="55" selected>55</option>';
                                  } else {
                                    echo '<option value="55">55</option>';
                                  }
                                  if ($minute == 60) {
                                    echo '<option value="60" selected>60</option>';
                                  } else {
                                    echo '<option value="60">60</option>';
                                  }
                                  echo '</select>';
                                  echo '<select name="ampm">';
                                  if ($ampm == "AM") {
                                    echo '<option value="AM" selected>AM</option>';
                                  } else {
                                    echo '<option value="AM">AM</option>';
                                  }
                                  if ($ampm == "PM") {
                                    echo '<option value="PM" selected>PM</option>';
                                  } else {
                                    echo '<option value="PM">PM</option>';
                                  }
                                  echo '</select>';
                                  ?>
                              </div>
                            </div>
                          </div>
                          <div class = "row">
                            <div class="col-lg-6">
                              <div class="form-group"><label for="Availability" class=" form-control-label">Availability</label><br>
                                <?php
                                  if ($is_avail_monday == 1) {
                                    echo '<input type="checkbox" name="monday" value="Monday" checked> Monday<br>';
                                  } else {
                                    echo '<input type="checkbox" name="monday" value="Monday"> Monday<br>';
                                  }
                                ?>
                                <?php
                                  if ($is_avail_tuesday == 1) {
                                    echo '<input type="checkbox" name="tuesday" value="Tuesday" checked> Tuesday<br>';
                                  } else {
                                    echo '<input type="checkbox" name="tuesday" value="Tuesday"> Tuesday<br>';
                                  }
                                ?>
                                <?php
                                  if ($is_avail_wednesday == 1) {
                                    echo '<input type="checkbox" name="wednesday" value="Wednesday" checked> Wednesday<br>';
                                  } else {
                                    echo '<input type="checkbox" name="wednesday" value="Wednesday"> Wednesday<br>';
                                  }
                                ?>
                                <?php
                                  if ($is_avail_thursday == 1) {
                                    echo '<input type="checkbox" name="thursday" value="Thursday" checked> Thursday<br>';
                                  } else {
                                    echo '<input type="checkbox" name="thursday" value="Thursday"> Thursday<br>';
                                  }
                                ?>
                                <?php
                                  if ($is_avail_friday == 1) {
                                    echo '<input type="checkbox" name="friday" value="Friday" checked> Friday<br>';
                                  } else {
                                    echo '<input type="checkbox" name="friday" value="Friday"> Friday<br>';
                                  }
                                ?>
                                <?php
                                  if ($is_avail_saturday == 1) {
                                    echo '<input type="checkbox" name="saturday" value="Saturday" checked> Saturday<br>';
                                  } else {
                                    echo '<input type="checkbox" name="saturday" value="Saturday"> Saturday<br>';
                                  }
                                ?>
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
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

  </body>
</html>
