<?php 

require('../includes/config.php'); 

//make sure user is logged in, function will redirect use if not logged in
login_required();

//if logout has been clicked run the logout function which will destroy any active sessions and redirect to the login page
if(isset($_GET['logout'])){
	logout();
}

//run if a page deletion has been requested
if(isset($_GET['delpage'])){
		
	$delpage = $_GET['delpage'];
	$delpage = mysql_real_escape_string($delpage);
	$sql = mysql_query("DELETE FROM pages WHERE pageID = '$delpage'");
    $_SESSION['success'] = "Page Deleted"; 
    header('Location: ' .DIRADMIN);
   	exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SITETITLE;?> Admin</title>
<link href="../style/style.css" rel="stylesheet" type="text/css" />
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../style/tables.css" rel="stylesheet" type="text/css" />

<script language="JavaScript" type="text/javascript">
	function delpage(id, title)
	{
	   if (confirm("Are you sure you want to delete '" + title + "'"))
	   {
		  window.location.href = '<?php echo DIRADMIN;?>?delpage=' + id;
	   }
	}
</script>
</head>
<body>

<div id="wrapper">

<div id="logo"><a href="<?php echo DIRADMIN;?>"><img src="images/logo.png" alt="<?php echo SITETITLE;?>" border="0" /></a></div>
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

<?php 
	//show any messages if there are any.
	messages();
?>
<div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Warning!</strong> This was a custom Administrator system written from scratch, that is bound to have many bugs and problems. If you run into these please email me the issue when you get the chance! <strong>Version 0.8 (We're Very Much In Beta Still)</strong>
</div>
<h1>Manage Pages</h1>

<table>
<tr>
	<th><strong>Title</strong></th>
	<th><strong>Action</strong></th>
</tr>

<?php
$sql = mysql_query("SELECT * FROM pages ORDER BY pageID");
while($row = mysql_fetch_object($sql)) 
{
	echo "<tr>";
		echo "<td>$row->pageTitle</td>";
		if($row->pageID == 1){ //home page hide the delete link
			echo "<td><a href=\"".DIRADMIN."editpage.php?id=$row->pageID\">Edit</a></td>";
		} else {
			echo "<td><a href=\"".DIRADMIN."editpage.php?id=$row->pageID\">Edit</a> | <a href=\"javascript:delpage('$row->pageID','$row->pageTitle');\">Delete</a></td>";
		}
		
	echo "</tr>";
}
?>
</table>

<p><a href="<?php echo DIRADMIN;?>addpage.php" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add Page</a></p>
</div>

<div id="footer">	
		<div class="copy">&copy; Matthew Reck 2012-2014 </div>
</div><!-- close footer -->
</div><!-- close wrapper -->

</body>
</html>