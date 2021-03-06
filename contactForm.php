<?php
/** REQUIRE RUNNING SERVER WITH SMTP OR EMAIL SERVICES/PACKAGE INSTALLED**/
$emailTo = "noreply@firstwebpage3.com";
$emailFrom = $_POST['emailFrom'];
$emailSubject = $_POST['subject'];
$emailMsg = $_POST['msg'];

$error = "";
$missing = "";
$emailSuccess = "";
$emailFail = "";

if ($_POST) {
  
if (filter_var($emailFrom, FILTER_VALIDATE_EMAIL) === false) {
 $error .= "<p>".$emailFrom." is considered Invalid.</p>"; 
}


if (!$emailSubject) {
  $missing .=  "<p>Subject is empty</p>";
}
if (!$emailMsg) {
  $missing .=  "<p>Message is empty<p/>";
}
if (!$emailFrom) {
  $missing .=  "<p>Email From is empty</p>";
}

if ($error != "") {
  $error = '<div class="alert alert-danger" role="alert"> <p> There are some missing field(s): </p>'.$error.' </div>';
}

if ($missing != "") {
  $missing = '<div class="alert alert-warning" role="alert"> <p> There are some error(s): </p> '.$missing.' </div>';
}

if ($error == "" && $missing == "") {
  
 if ( mail ($emailFrom, $emailTo, $emailSubject, $emailMsg) ) {
 $emailSuccess .= '<div class="alert alert-success ">Email Sent Successfully</div>'; 
 } else {
 $emailFail .= '<div class="alert alert-danger ">Failed to send the email</div>'; 
 }
  
}
  
}
?>

<!-- This page is the UI only, in-order to get the contact form running the file type should be changed from ".html" to ".php"-->
<!-- and it should be used on a server that have SMTP or any other email services/packages installed -->

<html>
<head>
  <meta charset="utf-8">
  <title> Contact Form </title>
  
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
    <ul class="navbar-nav mr-auto">
     
      <a class="nav-item menu-item nav-link" href="landing.html">Home </a>
        <a class="nav-item menu-item nav-link" href="index.html">Feeds </a>
        <a class="nav-item menu-item active nav-link" href="contactForm.html">Contact Us </a>
        <a class="nav-item nav-link menu-item disabled" href="#">Followers</a>
      </div>

     <form class="form-inline my-2 my-lg-3 search-section">
        <input class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search" />
        <button class="btn btn-outline-success my-2 my-sm-1" type="submit">Search</button>
      </form>
        
     <div id="userStatus"> 
    <form class="form-inline my-2 my-lg-3" action="login.html">
      <button class="btn btn-outline-success my-2 my-sm-0 top-links">Login</button>
    </form>
    <form class="form-inline my-2 my-lg-3" action="signup.html">
      <button class="btn btn-success my-2 my-sm-0 top-links" href="login.html">Join Free</button>
      </form>
    </div>
  </div>
</nav>



    <div class="container-contact">
      <h2> Get in touch </h2>
      
      <div id="error" > <?php echo $error; ?> </div>
      <div id="missing" > <?php echo $missing; ?> </div>
      <div id="emailRespond"> <?php echo $emailSuccess.$emailFail; ?> </div>
      
    <form method="post">
      <label>Email from:</label><input id="emailFrom" type="text" class="form-control" name="emailFrom" placeholder="Enter sender email">
      <label>Subject: </label><input id="emailSubject" type="text" class="form-control" name="subject" placeholder="Email subject">
      <label>Message: </label><textarea id="emailMsg" type="text" class="form-control" row="5" name="msg" placeholder="Enter your message"></textarea>
      <br>
      <button id="sendEmail" type="submit" class="btn btn-primary btn-send">Send </button>
    </form>
    </div>

    <br><br>

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

  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    
    <script type='text/javascript'>
      var errormsg = "";
      var fieldMissing = "";

	function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
    }
      $("form").submit(function (e) {
        
        
        if (isEmail($("#emailFrom").val()) == false) {
          errormsg += "<p>Invalid <Strong>Email From</strong> address!</p>";
        }
        if ($("#emailFrom").val() == "") {
          fieldMissing += "<p>Email From </p>";
        }
        if ($("#emailSubject").val() == ""){
          fieldMissing += "<p>Subject </p>";
        }
        if ($("#emailMsg").val() == "") {
          fieldMissing += "<p>Message </p>";
        }
        
        if (fieldMissing != "" ){
          $("#missing").html('<div class="alert alert-warning" role="alert"> <p> There are some missing field(s): </p>'+fieldMissing +' </div>');
          
        e.preventDefault();
      }
          if (errormsg != "") {
          $("#error").html('<div class="alert alert-danger" role="alert"> <p> There are some error(s): </p>'+errormsg +' </div>');
          
           e.preventDefault();
         }  
        fieldMissing = "";
        errormsg = "";
       
    }); 
    </script>
  </body>
</html>