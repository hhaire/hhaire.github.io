<!DOCTYPE html>
<html data-wf-page="58e2dd78217f09f92f64c57f" data-wf-site="58e2dd78217f09f92f64c57e">
<head>
  <meta charset="utf-8">
  <title>Login Page</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize_login.css" rel="stylesheet" type="text/css">
  <link href="css/webflow_login.css" rel="stylesheet" type="text/css">
  <link href="css/login-page-c4b438.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script type="text/javascript">
    WebFont.load({
      google: {
        families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]
      }
    });
  </script>
  <script src="js/modernizr_login.js" type="text/javascript"></script>
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">
</head>
<body class="body">

<?php
session_start();
$_SESSION["loggedin"] = false;
include_once "config.php";

//variables for input data
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 

    $result1 = mysql_query("SELECT username, password FROM users WHERE username = '$username' AND  password = '$password'");

    if(mysql_num_rows($result1) > 0 ) 
    { 
      //Set logged in variable to true
      $_SESSION['loggedin'] = true;
      // Store the users username in a session variable
      $_SESSION['username'] = $username;

      // Get the users userID and store it in a session variable
      $result2 = mysql_query("SELECT userID FROM users WHERE username = '$username'");
      $_SESSION['userID'] = $result2;

      ?>
      <script type="text/javascript">
      window.location.href='browse.php';
      </script>
      <?php 
    }
    else
    {
      ?>
        <script type="text/javascript">
        alert('Incorrect username or password');
        window.location.href='login.php';
        </script>
      <?php 
    }
}
?>

  <div class="container w-container"><img class="image loginimage" src="images/metube.png" width="260">
  </div>
  <div>
    <div class="form-wrapper w-form">
      <form action="login.php" method="post" class="loginform" data-name="Email Form" id="email-form" name="email-form">
        <input class="logininput w-input" data-name="username" id="username" maxlength="256" name="username" placeholder="Username" onchange="if (this.value == '') {this.placeholder = 'Username';}" type="text">
        <input class="logininput w-input" data-name="password" id="password" maxlength="256" name="password" placeholder="Password" onchange="if (this.value == '') {this.placeholder = 'Password';}" required="required" type="password">
        <input class="loginbutton submit-button w-button" data-wait="Submitting..." type="submit" name="submit" value="LOGIN">
        <div>
          <div class="loginaccounttext text-block-2">Don't have a MeTube Account?</div><a class="link loginsignuplink" href="http://people.cs.clemson.edu/~rberber/register.php">Sign Up Now!</a>
        </div>
        <div class="loginaccounttext text-block-3">Or feel free to just</div><a class="link-2 loginbrowselink" href="http://webapp.cs.clemson.edu/~rberber/browse.php">Browse</a>
      </form>
      <div class="w-form-done">
        <div>Thank you! Your submission has been received!</div>
      </div>
      <div class="w-form-fail">
        <div>Oops! Something went wrong while submitting the form</div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
  <script src="js/webflow_login.js" type="text/javascript"></script>
</body>
</html>