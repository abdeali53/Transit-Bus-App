<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Materialize Example</title>
        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js">
        </script>

        <style>
            body {
                background-image: url("bus_bg.png");
                height: 100%; 
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
            #mainColumn{
                margin-top:160px;
            }
            #top-header{
            font-family: Proxima Nova Soft, Tahoma, Geneva, Verdana, sans-serif;
            font-size: 60px;
            color: #014580;
            font-weight: bold;
            }
            #top-header img{
                width:120px;
                height:60px;
            }

        </style>
          
    </head>

<body>
    <div class =  "container">
        <div class="row center-align">
            <div class="col s12" id="top-header">
                Lambton
                <img src = "TTC.png">
            </div>
        </div>
        <div class = "row">
            <div class = "col s6 valign-wrapper " id = "mainColumn">
              <div class="card hoverable valign center-align ">
               <form action = "dashboard.php" method = "POST">
                <div class="card-content">
                  <div class="row">
                   <div class="input-field col s12 ">
                    <i class="material-icons prefix" style = "color:grey;">email</i> 
                    <label for="email" style = "color:#ca0d18;">Email</label>
                    <input type="email" name="email"  class="validate">
                   </div>
                 <div class="input-field col s12">
                  <!-- <label for="password">Password </label>
                  <input type="password" class="validate" name="password" id="password" /> -->
                  <i class="material-icons prefix" style = "color:grey;">lock</i> 
                  <label for="password" style = "color:#ca0d18;">Password</label>
                  <input type="password" name="password"  class="validate" >
                </div>
               </div>
              </div>
              <div class="card-action right-align" style = "color:#ca0d18;">
              <a class="btn waves-effect waves-light red darken-4">Sign Up</a>
                <button class="btn waves-effect waves-ligh red darken-4" type="submit" name="login">Login
                    <i class="material-icons right">send</i>
                </button>
             </div>
             </form>
            </div>
        </div>
    </div>
 </div>


</body>
</html>