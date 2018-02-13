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
        
    <style type="text/css">
        #top-header{
            font-family: Proxima Nova Soft, Tahoma, Geneva, Verdana, sans-serif;
            font-size: 60px;
            color: #fe426f;
            font-weight: bold;
            }
      #title{
          color:black;
      }
   
    .container{
        /* margin: 0 auto;
        height:100%;
        background:url(https://raw.githubusercontent.com/khadkamhn/day-01-login-form/master/img/bg.jpg) no-repeat center;*/
        background-color : orange; 
    }
      #dist{
          color:black;
      }
      #no{
          margin-right: 10px;
          width: 60px;
      }

     html,
     body,
    .login-box {
     height: 100%;
    }
     
    </style>
  
    
    </head>
<body>
     <!-- <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input disabled value="I am not editable" id="disabled" type="text" class="validate">
          <label for="disabled">Disabled</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
        <i class="material-icons prefix">email</i> 
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
        <i class="material-icons prefix">lock</i> 
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
    </form> -->

<div class = "container">
  <div class="valign-wrapper row login-box">
    <div class="col s12">
     <div class="card hoverable center-align ">
      <form>
       <div class="card-content">
        <span class="card-title">Enter credentials</span>
        <div class="row">
          <div class="input-field col s12">
              <i class="material-icons prefix">email</i> 
              <input name="email" type="email" class="validate">
              <label for="email">Email</label>
          </div>
          <div class="input-field col s12">
            <!-- <label for="password">Password </label>
            <input type="password" class="validate" name="password" id="password" /> -->
            <i class="material-icons prefix">lock</i> 
            <input name="password" type="password" class="validate">
            <label for="password">Password</label>
          </div>
        </div>
       </div>
      <div class="card-action center-align">
        <input type="reset" id="reset" class="btn-flat grey-text waves-effect">
        <input type="submit" class="btn green waves-effect waves-light" value="Login">
      </div>
      
     </form>
     </div>
    </div>
   </div>
  </div>

    
</body>
</html>