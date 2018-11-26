<?php 
$nume="";
$prenume="";
$email="";
$nationality="";
$gender="";
$birthdate="";
$countryofbirth="";
$phonenumber="";
$linkfb="";
$Marimetricou="";
$edit_state=false;
$db=mysqli_connect("localhost","root","","exercitiu"); 
	 if(isset($_GET['edit']))
{
	$id=$_GET['edit'];
	$rec=mysqli_query($db,"SELECT * FROM participanti WHERE id=$id");
	$edit_state= true;
	$record=mysqli_fetch_array($rec);
	$nume=$record['nume'];
	$prenume=$record['prenume'];
	$email=$record['email'];
	$nationality=$record['nationality'];
	$gender=$record['gender'];
	$birthdate=$record['birthdate'];
	$countryofbirth=$record['countryofbirth'];
	$phonenumber=$record['phonenumber'];
	$linkfb=$record['linkfb'];
	$marimetricou=$record['marimetricou'];
	//$id=$record['id'];
	
}

$results=mysqli_query($db,"SELECT * FROM participanti  ORDER BY nume");

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	mysqli_query($db, "DELETE FROM participanti WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: admin.php');
}

if (isset($_GET['insert'])) {
echo "completeaza formularul de mai jos";
	header('location: admin.php');
}


?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style_table.css">
</head>
<body>
<table class="table"> 
		<thead>
				<tr>
					<th>Nume</th>
					<th>Prenume</th>
					<th>Email</th>
					<th>Nationality</th>
					<th>Gender</th>
					<th>Birth date</th>
					<th>Country of birth</th>
					<th>Phone number</th>
					<th>Link fb</th>
					<th>Marime tricou</th>
					<th colspan="2">Action</th>
				</tr>
		</thead>
		<tbody>
			<?php while($row=mysqli_fetch_array($results,MYSQLI_ASSOC)){?>
				<tr>
					<td><?php echo $row['nume'];?></td>
					<td><?php echo $row['prenume'];?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php echo $row['nationality'];?></td>
					<td><?php echo $row['gender'];?></td>
					<td><?php echo $row['birthdate'];?></td>
					<td><?php echo $row['countryofbirth'];?></td>
					<td><?php echo $row['phonenumber'];?></td>
					<td><?php echo $row['linkfb'];?></td>
					<td><?php echo $row['marimetricou'];?></td>
					<td><a href="admin.php?edit=<?php echo $row['id']; ?>" class="btn" >Edit</a></td>
					<td><a href="admin.php?delete=<?php echo $row['id']; ?>" class="btn" >Delete</a></td>
				</tr>
			<?php } ?>
				
		</tbody>
</table>
<form action="procesare.php" method="post" >
			<table class="alb aliniere">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div >
			
				<tr>
					<td >Name:</td>
					<td><input id="nume" type="text" name="nume" value="<?php echo $nume;?>"><br /></td>
				</tr>
				
				<tr>
					<td>Surname:</td>
					<td><input id="prenume" type="text" name="prenume" value="<?php echo $prenume;?>"><br /></td>
				</tr>
				
				<tr>
					<td>Email:</td>
					<td><input id="email" type="text" name="email" value="<?php echo $email;?>"><br /></td>
				</tr>
				
				<tr>
					<td>Nationality:</td>
					<td><input id="nationality" type="text" name="nationality" value="<?php echo $nationality;?>"><br /></td>
				</tr>
				
				<tr>
					<td>Gender:</td>
					<td><input type="radio" name="gender" value="male" checked> Male<br>
					<input type="radio" name="gender" value="female"> Female<br>
					<input type="radio" name="gender" value="other"> Other<br /></td>
				</tr>
				
				<tr>
					<td>Birth date:</td>
					<td><input id="data" type="date" name="birthdate" value="<?php echo $birthdate;?>"><br /></td>
				</tr>
				
				<tr>
					<td>Country of birth:</td>
					<td><input id="countryofbirth" type="text" name="countryofbirth"><br /></td>
				</tr>
				
				<tr>
					<td>Phone number:</td>
					<td><input id="phonenumber" type="tel" name="phonenumber" value="<?php echo $phonenumber;?>""><br /></td>
				</tr>
				
				<tr>
					<td>Link facebook:</td>
					<td><input id="linkfb" type="url" name="linkfb" value="<?php echo $linkfb;?>"><br /></td>
				</tr>
				
				<tr>
					<td>Marime tricou</td>
					<td><select name="Marimetricou">
							<optgroup label="Female">
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
							</optgroup>
							<optgroup label="Male">
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
							</optgroup>
						</select><br /></td>
				</tr>
				
			
				
				<tr></tr>
				</div></table>	
					<?php if($edit_state==false):?>	
					<input type="submit" name="salveaza"  value="Trimite">
					<?php else: ?>
					<input type="submit" name="edit" value="Trimite">				
					<?php endif ?>
			
		</form> 
		
	
</body>
</html>