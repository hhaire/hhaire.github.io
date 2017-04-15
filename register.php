<!DOCTYPE html>
<html data-wf-page="58e15138e0055699301a8047" data-wf-site="58e15138e0055699301a8046">
<head>
  <meta charset="utf-8">
  <title>Register Page</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize_register.css" rel="stylesheet" type="text/css">
  <link href="css/webflow_register.css" rel="stylesheet" type="text/css">
  <link href="css/register-page.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script type="text/javascript">
    WebFont.load({
      google: {
        families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]
      }
    });
  </script>
  <script src="js/modernizr_register.js" type="text/javascript"></script>
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">
</head>
<body class="body-2">

<?php
include_once "config.php";
//variables for input data
if(isset($_POST['submit'])) {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $username = $_POST['username'];
    $passowrd = $_POST['passowrd'];
    
    if( $_POST['passowrd1'] != $_POST['passowrd']) {
        ?>
        <script type="text/javascript">
        alert('Passwords do not match. Try again?');
        window.location.href='register.php';
        </script>
        <?php
    }
    
    else {
    $query = "select * from users where username ='$username'";
    if($result=mysql_query($query)){
        $row = mysql_fetch_assoc($result);
        if($row == 0) {
            $sql_query = "INSERT INTO `users`(`username`, `password`, `firstName`, `lastName`) VALUES ('$username', '$passowrd','$fName','$lName')";
    
            if(mysql_query($sql_query))
            {
                ?>
                <script type="text/javascript">
                alert('Entry Was Inserted Successfully!');
                window.location.href='login.php';
                </script>
                <?php
            }
            else
            {
                ?>
                <script type="text/javascript">
                alert('An error occured while inserting your data.');
                </script>
                <?php
            }
        } else {
            ?>
            <script type="text/javascript">
            alert('That username already exists. Try again?');
            window.location.href='register.php';
            </script>
            <?php
        }
    }
    }
}
?>


  <div class="container w-container">
    <h1 class="heading-2">Register For An Account</h1>
    <div>
      <div class="w-form">
        <form action="register.php" method="post" class="form register w-clearfix" data-name="Email Form" id="email-form" name="email-form">
          <input class="registerinput text-field w-input" maxlength="256" name="fName" placeholder="FIRST NAME" onchange="if (this.value == '') {this.placeholder = 'FIRST NAME';}" required="required" type="text">
          <input class="registerinput text-field w-input" maxlength="256" name="lName" placeholder="LAST NAME" onchange="if (this.value == '') {this.placeholder = 'LAST NAME';}" required="required" type="text">
          <input class="registerinput text-field w-input" maxlength="256" name="username" placeholder="USERNAME" onchange="if (this.value == '') {this.placeholder = 'USERNAME';}" required="required" type="text">
          <input class="registerinput text-field w-input" maxlength="256" name="passowrd" placeholder="PASSWORD" onchange="if (this.value == '') {this.placeholder = 'PASSWORD';}" required="required" type="password">
          <input class="registerinput text-field w-input" maxlength="256" name="passowrd1" placeholder="CONFIRM PASSWORD" onchange="if (this.value == '') {this.placeholder = 'CONFIRM PASSWORD';}" required="required" type="password">
          <input class="registerbutton submit-button w-button" name="submit" data-wait="Submitting" type="submit" value="Register">
          <div class="div-block-3">
            <div class="text-block">Already have an account?</div><a class="link" href="http://webapp.cs.clemson.edu/~rberber/login.php">Login Now!</a>
          </div>
          <div class="text-block-2">Or feel free to just</div><a class="link-2" href="http://webapp.cs.clemson.edu/~rberber/browse.php">Browse</a>
        </form>
        <div class="success-message w-form-done">
          <div>Thank you! You have registered an account with MeTube!</div>
        </div>
        <div class="error-message w-form-fail">
          <div>Oops! Something went wrong while submitting the form</div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
  <script src="js/webflow_register.js" type="text/javascript"></script>
  <?php
  if(isset($register_error))
   {  echo "<div id='passwd_result'> register_error:".$register_error."</div>";}
  ?>
</body>
</html>