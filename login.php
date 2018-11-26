

<?php include 'login_process.php';?>
<html>
<script>
function validare()
{
	
var x3=document.getElementById("email").value;
var e= /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; 
if(!x3.match(e))
    {document.getElementById("email").style= "color:red";
	return false;}
return true;}
</script>
<body>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<div id="get-touch">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6 col-md-offset-1">
      <h2 class="field">Login</h2>
		<form action="login_process.php" method="post">
			<table class="field">
			<div>
				<tr>
					<td >Utilizator:</td>
					<td><input type="text" name="username" placeholder="Username" class="txt" required /><br /></td>
				</tr>			
				
				<tr>
					<td >Introdu parola:</td>
					<td><input type="password" name="password" placeholder="Password" class="txt" value="Login" required /><br /></td>
				</tr>
				
				<tr>
					<td> <input type="submit" name="sub" class="btn btn-custom btn-lg"  value="Trimite" required> </td>
					<td> <input type="reset" value="Sterge" onclick="stergere()" class="btn btn-custom btn-lg"  align="center"> </td>
				</tr>
			</div></table>	
		</form>
 
      </div>
     
    </div>
  </div>
</div>
</body>
</html>
