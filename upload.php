<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 10 2017 23:19:30 GMT+0000 (UTC)  -->
<html data-wf-page="58e687f42d4b024f59c1201d" data-wf-site="58e2dd78217f09f92f64c57e">
<head>
  <meta charset="utf-8">
  <title>Upload Page</title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize_upload.css" rel="stylesheet" type="text/css">
  <link href="css/webflow_upload.css" rel="stylesheet" type="text/css">
  <link href="css/upload-page-c4b438.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script type="text/javascript">
    WebFont.load({
      google: {
        families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]
      }
    });
  </script>
  <script src="js/modernizr_upload.js" type="text/javascript"></script>
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">
</head>
<body class="body">

<?php 
session_start();
include_once "config.php";

if(isset($_POST['submit'])){

$mediaTitle = $_POST['mediaTitle'];
$uploadCategory = $_POST['uploadCategory'];
//$username = $_POST['username'];
$description = $_POST['description'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $uploadOk = 1;
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
  if (file_exists($target_file)) {
    $uploadOk = 0;
    ?>
      <script type="text/javascript">
      alert('Sorry, file already exists.');
      </script>
    <?php
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    $uploadOk = 0;
    ?>
      <script type="text/javascript">
      alert('Sorry, your file is too large.');
      </script>
    <?php
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

        //Get the categoryID
        $categoryID = mysql_query("SELECT categoryID FROM category WHERE name = '$uploadCategory'");

        //Get username from userID
        $username = mysql_query("SELECT username FROM users WHERE userID = '{$_SESSION['userID']}'");

        //$_SESSION['upload'] = ["fileToUpload"]["name"];
        $pathName = "~/public_html/uploads/";
        $pathName1 = $pathName.$_SESSION['username'];
        $pathName2 = $pathName1."/";
        $path = $pathName2.$_FILES["fileToUpload"]["name"];

        //SQL STUFF GOES HERE
        $result = mysql_query("INSERT INTO `media`(`title`, `path`, `description`, `categoryID`, `userID`) VALUES ('$mediaTitle','$path','$description','$categoryID','{$_SESSION['userID']}')");
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>


  <div class="container w-container"><img class="image loginimage" src="images/metube_upload.png" width="260">
  </div>
  <div>
    <div class="form-wrapper w-form">
      <form action="upload.php" class="loginform" data-name="Email Form" id="email-form" method="post" name="email-form" enctype="multipart/form-data">
        <input class="uploadfilename w-input" data-name="fileToUpload" id="fileToUpload" maxlength="256" name="fileToUpload" placeholder="username" type="file" required="required">
        <textarea class="title uploadtextarea w-input" data-name="mediaTitle" id="mediaTitle" maxlength="5000" name="mediaTitle" placeholder="Give your media a Title..." required="required"></textarea>
        <div class="div-block">
          <div class="text-block-4">Give your media some keywords</div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox" id="checkbox" name="checkbox" type="checkbox">
            <label class="w-form-label" for="checkbox">TV and Film</label>
          </div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox 20" id="checkbox-20" name="checkbox-20" type="checkbox">
            <label class="w-form-label" for="checkbox-20">Comedy</label>
          </div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox 19" id="checkbox-19" name="checkbox-19" type="checkbox">
            <label class="w-form-label" for="checkbox-19">Science</label>
          </div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox 2" id="checkbox-2" name="checkbox-2" type="checkbox">
            <label class="w-form-label" for="checkbox-2">Tutorials</label>
          </div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox 18" id="checkbox-18" name="checkbox-18" type="checkbox">
            <label class="w-form-label" for="checkbox-18">Hip Hop</label>
          </div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox 17" id="checkbox-17" name="checkbox-17" type="checkbox">
            <label class="w-form-label" for="checkbox-17">Rock</label>
          </div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox 16" id="checkbox-16" name="checkbox-16" type="checkbox">
            <label class="w-form-label" for="checkbox-16">Pop</label>
          </div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox 15" id="checkbox-15" name="checkbox-15" type="checkbox">
            <label class="w-form-label" for="checkbox-15">Football</label>
          </div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox 14" id="checkbox-14" name="checkbox-14" type="checkbox">
            <label class="w-form-label" for="checkbox-14">Basketball</label>
          </div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox 13" id="checkbox-13" name="checkbox-13" type="checkbox">
            <label class="w-form-label" for="checkbox-13">Baseball</label>
          </div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox 11" id="checkbox-11" name="checkbox-11" type="checkbox">
            <label class="w-form-label" for="checkbox-11">Soccer</label>
          </div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox 10" id="checkbox-10" name="checkbox-10" type="checkbox">
            <label class="w-form-label" for="checkbox-10">Animated</label>
          </div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox 9" id="checkbox-9" name="checkbox-9" type="checkbox">
            <label class="w-form-label" for="checkbox-9">Beauty</label>
          </div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox 8" id="checkbox-8" name="checkbox-8" type="checkbox">
            <label class="w-form-label" for="checkbox-8">Dogs</label>
          </div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox 7" id="checkbox-7" name="checkbox-7" type="checkbox">
            <label class="w-form-label" for="checkbox-7">Cats</label>
          </div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox 6" id="checkbox-6" name="checkbox-6" type="checkbox">
            <label class="w-form-label" for="checkbox-6">Fashion</label>
          </div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox 5" id="checkbox-5" name="checkbox-5" type="checkbox">
            <label class="w-form-label" for="checkbox-5">Cars</label>
          </div>
          <div class="checkbox-field w-checkbox w-clearfix">
            <input class="checkbox w-checkbox-input" data-name="Checkbox 4" id="checkbox-4" name="checkbox-4" type="checkbox">
            <label class="w-form-label" for="checkbox-4">Food</label>
          </div>
        </div>
        <textarea class="description uploadtextarea w-input" data-name="Field 3" id="field-3" maxlength="5000" name="description" placeholder="Describe your media..." required="required"></textarea>
        <select class="uploadcategory w-select" data-name="uploadCategory" id="uploadCategory" name="uploadCategory" required="required">
          <option value="">Choose a category...</option>
          <option value="arts">Arts</option>
          <option value="animals">Animals</option>
          <option value="educational">Educational</option>
          <option value="entertainment">Entertainment</option>
          <option value="health">Health</option>
          <option value="kids and family">Kids and Family</option>
          <option value="music">Music</option>
          <option value="sports">Sports</option>
          <option value="society and culture">Society and Culture</option>
          <option value="technology">Technology</option>
        </select>
        <input class="submit-button uploadbutton w-button" data-wait="Please wait..." type="submit" name="submit" value="UPLOAD">
        <div><a class="link-3" href="http://webapp.cs.clemson.edu/~rberber/browse.php">Or cancel and return Home</a>
        </div>
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
  <script src="js/webflow_upload.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
