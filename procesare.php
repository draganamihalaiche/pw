<html>
<head></head>
<body>

<?php 
//print_r($_POST);
if(isset($_POST['salveaza']))
{$con=mysqli_connect("localhost","root","","exercitiu");
 $valori="INSERT INTO participanti (nume,prenume,email,nationality,gender,birthdate,countryofbirth,phonenumber,linkfb,marimetricou) 
 VALUES ('$_POST[nume]','$_POST[prenume]','$_POST[email]','$_POST[nationality]','$_POST[gender]','$_POST[birthdate]','$_POST[countryofbirth]','$_POST[phonenumber]','$_POST[linkfb]','$_POST[Marimetricou]')";
 mysqli_query($con,$valori);
 header('location: completare.php');
}

else
	{$edit_state=false;
	 if(isset($_POST['edit']))
	 $con=mysqli_connect("localhost","root","","exercitiu");{	
	 $nume=mysqli_real_escape_string($con,$_POST['nume']);
	 $prenume=mysqli_real_escape_string($con,$_POST['prenume']);
	 $email=mysqli_real_escape_string($con,$_POST['email']);
	 $nationality=mysqli_real_escape_string($con,$_POST['nationality']);
	 $gender=mysqli_real_escape_string($con,$_POST['gender']);
	 $birthdate=mysqli_real_escape_string($con,$_POST['birthdate']);
	 $countryofbirth=mysqli_real_escape_string($con,$_POST['countryofbirth']);
	 $phonenumber=mysqli_real_escape_string($con,$_POST['phonenumber']);
	 $linkfb=mysqli_real_escape_string($con,$_POST['linkfb']);
	 $marimetricou=mysqli_real_escape_string($con,$_POST['Marimetricou']);
	 $id=mysqli_real_escape_string($con,$_POST['id']);
	 mysqli_query($con, "UPDATE participanti SET nume='$nume',prenume='$prenume',email='$email',nationality='$nationality',gender='$gender',birthdate='$birthdate',countryofbirth='$countryofbirth',phonenumber='$phonenumber',linkfb='$linkfb',marimetricou='$marimetricou' WHERE id=$id");
	 header('location: admin.php');
	}
	}

?>


<div style="margin-top:50px;">
Languages:
<a href=?lang=en"></a>
<a href=?lang=ro"></a>
</div>

</body>
</html>