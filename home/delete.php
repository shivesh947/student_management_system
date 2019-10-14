<?php
$val=$_POST['del'];
$con=mysqli_connect('localhost','id7134286_root2','root123','id7134286_demo'); //change this line
$sql="DELETE FROM `student` WHERE rno=$val";
$run=mysqli_query($con,$sql);
?>