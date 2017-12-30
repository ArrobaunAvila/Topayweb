<?php 
include("php/Validacion.php");
include("php/Conexion.php");
require_once("php/Users.php");
       
       if(isset($_POST['submit'])){

        $name=$_POST['name'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $repeatpassword=$_POST['repeatpassword'];
        
   
        $result_validacion=& em_pty_camp($name,$username,
        	$email,$password);

     	if($result_validacion == 0 || !filter_var($email,FILTER_VALIDATE_EMAIL)){
       header("location:formregistro.php?id=incorrecto");
      } else if($result_validacion == 1){
         header("location:formregistro.php?id=correcto");
        $user = new Users($name,$username,$password,$email);
        $id= rand(1000,2000);
        $user->Guardardatos($id,$name,$username,$password,$email);
        
        $user->enviarCorreo($email,$name);

      }

    }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ToPayWeb Account</title>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="icon" href="img/if_cloud_1287533.svg">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
		<link rel="stylesheet" href="alertifyjs/css/alertify.css">
	<link rel="stylesheet" href="alertifyjs/css/themes/default.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
  <link rel="stylesheet" type="text/css" href="css/milligram.css">
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
	<a href="formlogin.php">Back to login-topayweb</a>
</header>
</div>

<div id="app-container">	
<div class="app-body-formregister">
<form action="#" method="POST">
	      <h2 class="title-log">TopayWeb</h2>
	      <h3 id="subtitle-log"> Create your account</h3>

	      <div class="container-appregister">
	      <div class="column-one">
	      <input class="app-input-register" type="text" name="name" placeholder="Name"  >
	      <input class="app-input-register" type="text" name="username" placeholder="Username" >
	      </div>

	      <div class="column-two">
	      <input class="app-input-register" type="text" name="email" placeholder="Email" >
	      <input class="app-input-register" type="password" name="password" placeholder="Password"  id="password"> 
	       <input class="app-input-register" type="password" name="repeatpassword" placeholder="Confirm Password" > 
	      </div>
	      </div>
	      <div class="get-started">
		<input class="button" type="submit" name="submit" value="Create Account">
        </div>
	</form>

</div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js">
</script>
<script type="text/javascript">
	 $(document).ready(function() {

    var password = $('.app-input-register').find('input');
     var object=password.eq(3).val();

      var repeatpassword = $('.app-input-register').find('input');
     var object2=password.eq(4);

     console.log(object);

	 $('.get-started')
	 	.find('.button').on("click",function() {
	 	  
	 	})
	 	
	 })
</script>
</body>
</html>