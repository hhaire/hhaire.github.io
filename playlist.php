<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Tue Apr 11 2017 17:35:43 GMT+0000 (UTC)  -->
<html data-wf-page="58ed10bf001a3752f2b3ce3f" data-wf-site="58ed05dd5710f07cd0a365db">
<head>

  <style>
    .box {
      width:1000px;
      background-color:#d9d9d9;
      position:fixed;
      margin-left:-500px;
      top:25%;
      left:50%;
    }

    th{
      font-size: 18px;
      padding: 20px;
      text-align: left;
      font-family: 'Open Sans', sans-serif;
      border: 2px solid rgba(0, 0, 0, .3);
    }

    td {
      border: 1px solid rgba(0, 0, 0, .3);
      text-align: left;
      padding: 8px;
      font-family: 'Open Sans', sans-serif;
    }

    tr:nth-child(even) {
      background-color: rgba(246, 103, 51, .5);
    }
  </style>

  <meta charset="utf-8">
  <title>Playlist</title>
  <meta content="playlist" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/home-page-e27a24.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script type="text/javascript">
    WebFont.load({
      google: {
        families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic"]
      }
    });
  </script>
  <script src="js/modernizr.js" type="text/javascript"></script>
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">
</head>
<body class="body-4">
  <div class="navbar w-nav" data-animation="default" data-collapse="medium" data-duration="400">
    <div class="container-2 w-container">
      <a class="w-nav-brand" href="#">
        <div><img src="images/metube_new.png" width="139">
        </div>
      </a>
      <nav class="w-nav-menu" role="navigation"><a class="nav-link profilemessages w-nav-link" href="favorites.php" id="profile">Favorites</a><a class="nav-link profilemessages w-nav-link" href="playlist.php" id="profile">Playlist</a><a class="nav-link profilemessages w-nav-link" href="profile.php" id="profile">Profile</a><a class="messageshome nav-link w-nav-link" href="messages.php">Messages</a><a class="nav-link uploadhome w-nav-link" href="http://webapp.cs.clemson.edu/~rberber/upload.php">Upload</a><a class="nav-link w-nav-link" href="browse.php" id="browse">Home</a><a class="logouthome nav-link w-nav-link" href="http://webapp.cs.clemson.edu/~rberber/login.php">Logout</a>
      </nav>
      <div class="w-nav-button">
        <div class="w-icon-nav-menu"></div>
      </div>
    </div>
  </div
  <div class="w-embed">
    <table class="box">
      <tr>
        <th>Media Type</th>
        <th>Title</th>
        <th>User</th>
      </tr>
      <tr>
        <td>Video</td>
        <td>Clemson Tigers Win The Natty</td>
        <td>User1</td>
      </tr>
      <tr>
        <td>Video</td>
        <td>Clemson Tigers Win The Natty</td>
        <td>User1</td>
      </tr>
      <tr>
        <td>Video</td>
        <td>Clemson Tigers Win The Natty</td>
        <td>User1</td>
      </tr>
    </table>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>