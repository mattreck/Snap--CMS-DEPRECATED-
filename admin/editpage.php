<?php 
/*-------------------------------------------------------+
| Content Management System 
| http://www.phphelptutorials.com/
+--------------------------------------------------------+
| Author: David Carr  Email: dave@daveismyname.co.uk
+--------------------------------------------------------+*/

require('../includes/config.php'); 

if(!isset($_GET['id']) || $_GET['id'] == ''){ //if no id is passed to this page take user back to previous page
	header('Location: '.DIRADMIN); 
}

if(isset($_POST['submit'])){

	$title = $_POST['pageTitle'];
	$content = $_POST['pageCont'];
	$pageID = $_POST['pageID'];
	
	$title = mysql_real_escape_string($title);
	$content = mysql_real_escape_string($content);
	
	mysql_query("UPDATE pages SET pageTitle='$title', pageCont='$content' WHERE pageID='$pageID'");
	$_SESSION['success'] = 'Page Updated';
	header('Location: '.DIRADMIN);
	exit();

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITETITLE;?></title>
<link href="../style/style.css" rel="stylesheet" type="text/css" />
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="ckeditor/ckeditor.js"></script>
</head>
<body>
<div id="wrapper">

<div id="logo"><a href="<?php echo DIR;?>"><img src="images/logo.png" alt="<?php echo SITETITLE;?>" title="<?php echo SITETITLE;?>" border="0" /></a></div><!-- close logo -->
<?php error_reporting(0);?>
<!-- NAV -->
<div class="navbar navbar-default" role="navigation">
	<ul class="nav navbar-nav">
		<li><a href="<?php echo DIRADMIN;?>"><i class="glyphicon glyphicon-home"></i>  Admin Home</a></li>		
		<li><a href="<?php echo DIR;?>" target="_blank"><i class="glyphicon glyphicon-eye-open"></i>  View Website</a></li>
		<li><a href="<?php echo DIRADMIN;?>?logout"><i class="glyphicon glyphicon-user"></i>  Logout</a></li>
	</ul>
</div>
<!-- END NAV -->

<div id="content">

<h1>Edit Page</h1>

<?php
$id = $_GET['id'];
$id = mysql_real_escape_string($id);
$q = mysql_query("SELECT * FROM pages WHERE pageID='$id'");
$row = mysql_fetch_object($q);
?>


<form action="" method="post">
<input type="hidden" name="pageID" value="<?php echo $row->pageID;?>" />
<p>Title:<br /> <input name="pageTitle" type="text" class="form-control" value="<?php echo $row->pageTitle;?>" size="103" />
</p>
<p>Page Editor:<br /><textarea name="pageCont" cols="100" rows="20"><?php echo $row->pageCont;?></textarea>
</p>
			<script>
                CKEDITOR.replace( 'pageCont' );
            </script>
<p><input type="submit" name="submit" value="Save Changes" class="btn btn-success" /></p>
</form>
<br /><br />

</div>

<div id="footer">	
		<div class="copy">&copy; Matthew Reck 2012-2014 </div>
</div><!-- close footer -->
</div><!-- close wrapper -->

</body>
</html>