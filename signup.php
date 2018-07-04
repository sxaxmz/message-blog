<?php
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$name = $_POST['name'];
$error = "";
$missing = "";
$result = "";
if ($_POST) {
  
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
 $error .= "<p>".$email." is considered Invalid.</p>"; 
}
if (!$username) {
  $missing .=  "<p>Username is empty<p/>";
}
if (!$Password) {
  $missing .=  "<p>Password is empty</p>";
}
if (!$email) {
  $missing .=  "<p>Email is empty</p>";
}
if (!$name) {
  $missing .=  "<p>Name is empty</p>";
}
if ($error != "") {
  $error = '<div class="alert alert-danger" role="alert"> <p> There are some missing field(s): </p>'.$error.' </div>';
}
if ($missing != "") {
  $missing = '<div class="alert alert-warning" role="alert"> <p> There are some error(s): </p> '.$missing.' </div>';
}
if ($error == "" && $missing == "") {
  include("connection.php");
if (array_key_exists("logout", $_GET)) {
  unset($_SESSION);
  setcookie("username", "", time() - 60*60);
  $_COOKIE['username'] = "";
} else  if ( (array_key_exists("username", $_SESSION) && $_SESSION['username']) || (array_key_exists("username", $_COOKIE) && $_COOKIE['username']) ) {
  header("Location: index.html");
}
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['name'])) {
 $query = "INSERT INTO user (name, username, password, email) VALUES ('$_POST['name']','$_POST['username']','md5(md5($_POST['username']).$_POST['password'])','$_POST['email']')"; 
  if ( $result = mysqli_query($connection, $query) ) {
  
         
         header("Location: login.html");
           
   } else {
       $error = "<p>Connection error! </p>"; 
}
  }
}
  
}
?>


<!-- This page is the UI only, in-order to get the login form running the file type should be changed from ".html" to ".php"-->
                                              <!-- Also, a database is required."-->

<doctype html>
<html>

	<head>
		<title> Message/Blog </title>

		<meta charset="utf-8" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="JQueryUI/jquery-ui.css" rel="stylesheet">
        <script src="JQueryUI/jquery-ui.js"></script>

        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

	</head>

	<body>


   <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
     <a class="navbar-brand logo" href="landing.html">Message-Blog</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
     </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="navbar-nav mr-auto">

        <a class="nav-item menu-item nav-link" href="landing.html">Home </a>
        <a class="nav-item menu-item nav-link" href="index.html">Feeds </a>
        <a class="nav-item menu-item nav-link" href="contactForm.php">Contact Us </a>
        <a class="nav-item nav-link menu-item disabled" href="#">Followers</a>
      </div>

      <form class="form-inline my-2 my-lg-3 search-section">
        <input class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search" />
        <button class="btn btn-outline-success my-2 my-sm-1" type="submit">Search</button>
      </form>
        

    <form class="form-inline my-2 my-lg-3" action="login.php">
      <button class="btn btn-outline-success my-2 my-sm-0 top-links top-links-login">Login</button>
    </form>
    <form class="form-inline my-2 my-lg-3" action="signup.php">
      <button class="btn btn-success my-2 my-sm-0 top-links" href="signup.php">Join Free</button>
      </form>

  </div>
  </nav>



<div class="container">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
	 <div class="login-form">

    <div id="error" > <?php echo $error; ?> </div>
    <div id="missing" > <?php echo $missing; ?> </div>
	  <form>
	  	<div class="form-group">
	  		<h3>Sign up Form</h3>

      

	  	</div>
      <div class="form-group">
      <input class="form-control" name="name" id="name" type="text" placeholder="name">
      </div>
	  	<div class="form-group">
		  <input class="form-control" name="username" id="username" type="text" placeholder="Username">
	    </div>
	    <div class="form-group">
		  <input class="form-control" name="password" id="password" type="password" placeholder="*****">
	    </div>
      <div class="form-group">
      <input class="form-control" name="passwordConfirm" id="passwordConfirm" type="password" placeholder="*****">
      </div>
      <div class="form-group">
      <input class="form-control" password="email" id="email" type="text" placeholder="Email">
      </div>
	    <div class="form-group">
		  <input class="form-control" type="submit" class="btn btn-primary" id="login-btn" value="Login">
	    </div>

	  </form>
    </div>
  </div>
  </div>
</div>

    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
             <img class="mb-2" src="images/MB-logo.png" alt="" width="120" height="120">
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <span class="d-block mb-3 text-muted" style="margin-top: 50px;">&copy; <a href="https://github.com/sxaxmz/message-blog">Osama Hussein   </a> 2018</span>
          </div>
        </div>
      </div>
    </footer>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
      var fieldMissing = "";
      function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
    }
      $("form").submit(function (e) {
        
        if (isEmail($("#emailFrom").val()) == false) {
          fieldMissing += "<p>Invalid <Strong>Email</strong> address!</p>";
        }
        
        if ($("#username").val() == "") {
          fieldMissing += "<p>Username</p>";
        }
        if ($("#name").val() == "") {
          fieldMissing += "<p>Name</p>";
        }
        if ($("#password").val() == ""){
          fieldMissing += "<p>Password</p>";
        }
        if ($("#passwordConfirm").val() == "") {
          fieldMissing += "<p>Password Confirm</p>";
        }
        
        if (fieldMissing != "" ){
          $("#missing").html('<div class="alert alert-warning" role="alert"> <p> <strong> There are some missing field(s):</strong> </p>'+fieldMissing +' </div>');
          
        e.preventDefault();
      }
        fieldMissing = "";
       
    }); 
	    </script>

	</body>
</html>