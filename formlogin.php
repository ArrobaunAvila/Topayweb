<?php 
  include("php/Login.php");
  if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(!empty($_POST["username"] && !empty($_POST["password"]))){
            $username=$_POST['username'];
            $password=$_POST['password'];
        $admin = new login($username,$password);
        $admin->verificarLogueo();             
      } else{
      	header("location:formlogin.php?error=campos_vacios");
      }
}
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
    <meta name="description" content="ToPayWeb">
      <meta name="author" content="@Dan5erv3r-Daniel avila">
	<title>ToPayWeb</title>
	<link rel="icon" href="img/if_cloud_1287533.svg">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" href="alertifyjs/css/alertify.css">
	<link rel="stylesheet" href="alertifyjs/css/themes/default.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
  <link rel="stylesheet" type="text/css" href="css/milligram.css">
  <link rel="stylesheet" type="text/css" href="fonts/css/font-awesome.css">
</head>
<style type="text/css">
	body{
		background: url('img/titanium.jpg');
	    overflow: hidden;
	}
</style>
<body>

<div class="payweb-container-header">
<header class="app-header-login">
	<a href="index.php">Back to ToPayWeb.com</a>
</header>
</div>

<div id="app-container">	
<div class="app-body-form">
<form action="#" method="POST">
	      <h2 class="title-log">TopayWeb</h2>
	      <h3 id="subtitle-log">Admin Login</h3>
	      <input class="app-input" type="text" name="username" placeholder="Username" required="">
	      <input  class="app-input" type="password" name="password" placeholder="password" required="">
	      <input class="button app-button" type="submit" value="Login"
	      name="submit">
	</form>
</div>
</div>

<?php include('php/footer.php');?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="alertifyjs/alertify.js"></script>
</body>
</html>







