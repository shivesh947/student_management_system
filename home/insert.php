<?php
$name=$_POST['anam'];
$roll=$_POST['aroln'];
$clas=$_POST['acls'];
$pno=$_POST['apno'];

$con=mysqli_connect('localhost','id7134286_root2','root123','id7134286_demo'); //change this line
$sql="INSERT INTO `student`(`name`, `rno`, `class`, `pno`) VALUES ('$name','$roll','$clas','$pno')";
$run=mysqli_query($con,$sql);
?>