<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<style type="text/css">
	#main
	{
		height: 100vh;
		width: 70vw;
		margin-left: 15vw;
		background-color: lightblue;
		border-radius: 30px;
		border:4px solid hsla(0, 30%, 30%, 0.7);
	}

	.adinp
	{
		width: 13vw;
		height: 5vh;
		font-size: 3vh;
	}
	#dataupdate
	{
		display: none;
	}
	label
	{
		width: 20vw;
		font-size: 3vw;
	}
	#edi,#delte
	{
    width: 11vw;
    font-style: bold;
	}
	#dataview
	{
		border: 2px solid black;
	}
	tr
	{
		height: 10px;
	}
</style>
<script>
	function viewme(){
            $(document).ready(function() {
                setTimeout(function() {  // set Interval function to carry out same operation in the time specified
                    $('#datashow').load('index.php #datashow > *'); // Reloads 'seminar-overview.php' table every 6 seconds as <div> tag is specified and closed after table
            }, 1);
               });
            showdata();
        }
    </script>
<body background="background.jpg" style="background-size: cover;">
	<section id="main">
		<center><h1>College Managment System</h1></center>
	<div id="dataupdate" style="position: absolute; height: 100vh;width: 100vw;">
		<form style="background-color: pink; width: 70vw;" method="post" action="update.php" id="dataupto" onsubmit="return updateformme()">
			<input type="hidden" name="oldno" id="oldrolno">
			<label>College Rollnumber:</label> <input class="adinp" type="text" id="newrolno" name="newrolno"><br><br>
			<label>Student Name:</label><input class="adinp" type="text" id="newnam" name="newnam"><br>
			<label>Passing Year:</label><input class="adinp" type="text" id="newclas" max="4" name="newclas"><br>
			<label>Phone number:</label><input class="adinp" type="text" id="newpno" max="10" name="newpno"><br>
			<input class="adinp" type="submit" name="" value="update" onclick="viewme()">
			<input class="adinp" type="button" name="" value="Cancle" onclick="showdata()">
		</form>	
	</div>
	<script type="text/javascript">
     function updateformme()
     {
      $.ajax({
        type: 'POST',
        url: 'update.php',
        data: $('#dataupto').serialize(),
      });
      var form=document.getElementById('dataupto').reset();
      return false;
     }
    </script>
	<script type="text/javascript">
		function showdata()
		{
			document.getElementById('dataupdate').style.display="none"
		}
	</script>

	<form method="post" action="insert.php" id="foadd" onsubmit="return formsubmit()">
		<center>
			<input class="adinp" type="text" name="anam" placeholder="Student Name" required>
			<input class="adinp" type="text" name="aroln" placeholder="College Rollnumber" required>
			<input class="adinp" type="text" name="acls" placeholder="Passing Year" max="4" required>
			<input class="adinp" type="text" name="apno" placeholder="Phone number" max="10" required>
			<input class="adinp" type="submit" name="" value="Add" onclick="viewme()">
		</center>
	</form>
	<script type="text/javascript">
     function formsubmit()
     {
      $.ajax({
        type: 'POST',
        url: 'insert.php',
        data: $('#foadd').serialize(),
      });
      var form=document.getElementById('foadd').reset();
      return false;
     }
    </script>

		<hr>
		<div id="datashow">

			<table border="3px" id="dataview" style="width: 70vw; height: 100%; font-size: 35px;">
				<thead>
					<tr>
					<td><b>College Rollnumber</b></td>
					<td><b>Student Name</b></td>
					<td><b>Passing Year</b></td>
					<td colspan="2"><b>Phone number</b></td>
				   </tr>
			   </thead>
<?php

         $con=mysqli_connect('localhost','id7134286_root2','root123','id7134286_demo'); //change this line
          $query="SELECT * FROM `student` ORDER BY sno DESC  ";
          $run=mysqli_query($con,$query);
          $data=mysqli_fetch_assoc($run); 
          if($run=mysqli_query($con,$query))
            {
               ?>
               <tr><?php
               while($data=mysqli_fetch_assoc($run))
               {
                ?>
                  <td><?php echo $data['name'];?></td>
                  <td><?php echo $data['rno'];?></td>
                  <td><?php echo $data['class'];?></td>
                  <td><?php echo $data['pno'];?></td>
                  <td style="width: 10.5vw;">
                  
                  	<input type="button" id="edi" value="Edit" onclick="updat(<?php echo $data['rno'];?>,'<?php echo $data['name'];?>','<?php echo $data['class'];?>',<?php echo $data['pno'];?>)">


                  <form method="post" action="delete.php" id="delform" onsubmit="return deleteform()">
                  	<input  type="hidden"  name="del" value="<?php echo $data['rno'];?>" name="">
                  	<input  type="submit" id="delte" name="" value="Delete" onclick="viewme()"></form></td></tr>
                <?php
                }
           }
          else echo"wrong";
?>
			</table>

	</section>
	<script type="text/javascript">
     function deleteform()
     {
      $.ajax({
        type: 'POST',
        url: 'delete.php',
        data: $('#delform').serialize(),
      });
      var form=document.getElementById('delform').reset();
      return false;
     }
    </script>


<script type="text/javascript">
	function updat(rval,rnam,rcls,rpno)
	{
		document.getElementById('dataupdate').style.display="block";
		document.getElementById('oldrolno').value=rval;
		document.getElementById('newrolno').value=rval;
		document.getElementById('newnam').value=rnam;
		document.getElementById('newclas').value=rcls;
		document.getElementById('newpno').value=rpno;
	}
</script>	
</body>
</html>