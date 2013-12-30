<?php

/*-------------------------------------------------------+
| Content Management System 
| http://www.phphelptutorials.com/
+--------------------------------------------------------+
| Author: David Carr  Email: dave@daveismyname.co.uk
+--------------------------------------------------------+*/

 require('../includes/config.php'); 
if(logged_in()) {header('Location: '.DIRADMIN);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITETITLE;?> Admin Login</title>
<link rel="stylesheet" href="../style/login.css" type="text/css" />
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background-image: url(images/noise.jpg);
}
</style>
</head>
<body>
<?php error_reporting(0);?>
<div class="lwidth">
	<div class="page-wrap">
		<div class="content">
		
		<?php 
		if($_POST['submit']) {
			login($_POST['username'], $_POST['password']);
		}
		?>

<div class="form">
	<img src="images/logo.png" width="90%" height="90%" style="align-self:center"/>
	<p><?php echo messages();?></p>    
    <div class="alert alert-warning alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Warning!</strong> There are bound to be bugs, this is still a beta Admin Panel. Contact Matt for the login!
    </div>   
	<form method="post" action="">
	<div class="form-group">
        <label for="exampleInputPassword1">Username</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="username" placeholder="Username">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
    </div>
	<p><br /><input type="submit" name="submit" class="btn btn-primary" value="Login" /></p>                       
	</form>	
</div>
		
		</div>	
		<div class="clear"></div>		
	</div>
</div>
</body>
</html>