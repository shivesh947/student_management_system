<?php
   $con=mysqli_connect('localhost','id7134286_root2','root123','id7134286_demo'); //change this line

   $oldno=$_POST['oldno'];
   $roll=$_POST['newrolno'];
   $nnam=$_POST['newnam']; 
   $nclas=$_POST['newclas']; 
   $npno=$_POST['newpno']; 

   $sql = "UPDATE `student` SET `name`='$nnam',`rno`=$roll ,`class`=$nclas,`pno`=$npno  WHERE rno=$oldno ";
   $run=mysqli_query($con,$sql);
?>
