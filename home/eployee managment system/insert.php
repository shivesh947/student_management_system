<?php
$name=$_POST['anam'];
$roll=$_POST['aroln'];
$clas=$_POST['acls'];
$pno=$_POST['apno'];

$con=mysqli_connect('localhost','id7134286_root2','root123','id7134286_demo'); //change this line
$sql="INSERT INTO `student`(`name`, `rno`, `class`, `pno`) VALUES ('$name','$roll','$clas','$pno')";
$run=mysqli_query($con,$sql);
?>
<?php
    error_reporting(0);
    // Report runtime errors
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    // Report all errors
    error_reporting(E_ALL);
    // Same as error_reporting(E_ALL);
    ini_set("error_reporting", E_ALL);
    // Report all errors except E_NOTICE
    error_reporting(E_ALL & ~E_NOTICE);
session_start();
if($_SESSION['uid'])
{
    header('location:Dealer detail/detail.php');
}
?>
