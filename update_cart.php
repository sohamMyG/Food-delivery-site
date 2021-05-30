<?php include ( "inc/connect.inc.php" ); ?>
<?php 

ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	header("location: login.php");
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($conn,"SELECT * FROM user WHERE id='$user'");
}


if (isset($_GET['cid'])) {
		$cid = mysqli_real_escape_string($conn,$_GET['cid']);
		if(mysqli_query($conn,"DELETE FROM cart WHERE pid='$cid' AND uid='$user'")){
		header('location: mycart.php?uid='.$user.'');
	}else{
		header('location: index.php');
	}
}
if (isset($_GET['aid'])) {
		$aid = mysqli_real_escape_string($conn,$_GET['aid']);
		$result = mysqli_query($conn,"SELECT * FROM cart WHERE pid='$aid'");
		$get_p = mysqli_fetch_assoc($result);
		$num = $get_p['quantity'];
		$num += 1;

		if(mysqli_query($conn,"UPDATE cart SET quantity='$num' WHERE pid='$aid' AND uid='$user'")){
		header('location: mycart.php?uid='.$user.'');
	}else{
		header('location: index.php');
	}
}
if (isset($_GET['sid'])) {
		$sid = mysqli_real_escape_string($conn,$_GET['sid']);
		$result = mysqli_query($conn,"SELECT * FROM cart WHERE pid='$sid'");
		$get_p = mysqli_fetch_assoc($result);
		$num = $get_p['quantity'];
		$num -= 1;
		if ($num <= 0){
			$num = 1;
		}
		if(mysqli_query($conn,"UPDATE cart SET quantity='$num' WHERE pid='$sid' AND uid='$user'")){
		header('location: mycart.php?uid='.$user.'');
	}else{
		header('location: index.php');
	}
}


?>