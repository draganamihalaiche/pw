<?php 
	session_start();
	$username = "";
    $email = "";
    $errors = array();
    $id = "";
    //connect to the registration database
    $db_user = mysqli_connect('localhost','root', '', 'exercitiu');

    
    //if the regiter button is clicked
    if(isset($_POST['sal'])){
        $username = mysqli_real_escape_string($db_user, $_POST['username']);
        $email = mysqli_real_escape_string($db_user, $_POST['email']);
        $password1 = mysqli_real_escape_string($db_user, $_POST['password1']);
        $password2 = mysqli_real_escape_string($db_user, $_POST['password2']);
      
            $password = md5($password1);//encrypt password before stoaring in database
            $sql = "INSERT INTO useri (username, email, password) VALUES ('$username','$email', '$password')";
            mysqli_query($db_user,$sql);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in,";
            header('location: inscriere.php'); //redirect to home page
        
    }

    //log user in from login page
    if(isset($_POST['sub'])){
        $username = mysqli_real_escape_string($db_user, $_POST['username']);
        $password = mysqli_real_escape_string($db_user, $_POST['password']);
        $query = "SELECT * FROM useri WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($db_user, $query);
		
        if(mysqli_num_rows($result) != 0)
			{            
                //log user in
                if(strcmp($username,"admin")==0)
				{
                    $_SESSION['success'] = "Let's do some changes,";
                    $_SESSION['username'] = $username;
                    header('location: admin.php');

                }
				else{
                    $_SESSION['success'] = "Welcome back,";
                    $_SESSION['username'] = $username;
                    header('location: inscriere.php');
					}
            }
		else {
                header('location: inregistrare.php');
				
            }

        
    }
	
	


    //logout
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }
?>