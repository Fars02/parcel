<?PHP
include("database.php");

$act 		= (isset($_POST['act'])) ? trim($_POST['act']) : '';	
$name		= (isset($_POST['name'])) ? trim($_POST['name']) : '';
$student_id	= (isset($_POST['student_id'])) ? trim($_POST['student_id']) : '';
$username	= (isset($_POST['username'])) ? trim($_POST['username']) : '';
$password	= (isset($_POST['password'])) ? trim($_POST['password']) : '';


$error = "";
$success = false;

if($act == "register")
{	
	$SQL_insert = " 
	
	INSERT INTO `student`(`name`, `username`, `password`, `student_id`) 
				VALUES ('$name', '$username', '$password', '$student_id') ";	
										
	$result = mysqli_query($con, $SQL_insert);
	$success = true;
}
?>
<!DOCTYPE html>
<html>
<title>Parcel Management</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alata">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
a:link {
  text-decoration: none;
}

body,h1,h2,h3,h4,h5,h6 {font-family: "Alata", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/*image header */
.bgimg-1 {
  background-position: top;
  background-size: cover;
  background-image: url("images/banner.jpg");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}

</style>

<body class="w3-teal">

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-large" style="max-width:1200px;margin:auto">
    <div class=" w3-padding-16 w3-left" ><a href="index.php"><i class="fa fa-chevron-left w3-padding  fa-lg"></i></a></div>
    <div class="w3-right w3-padding w3-padding-16">&nbsp;</div>
	<div class="w3-center w3-padding-16"></div>
  </div>
</div>

<div class="bgimg-1" >

	
<div class="w3-padding-32"></div>


<div class="w3-container w3-padding-12" id="contact">
    <div class="w3-content w3-container " style="max-width:400px">
		<div class="w3-center">
		<img class="w3-center" src="logo.png" width="200px">
		
		</div>
		<div class="w3-center w3-xlarge">
		UMP Parcel Management
		</div>
	
		<div class="w3-padding-24"></div>
	
	<?PHP if($error) { ?>
		<div class="w3-container w3-padding-32" id="contact">
			<div class="w3-content w3-container w3-white w3-text-red w3-round-xxlarge w3-card" style="max-width:600px">
				<div class="w3-padding w3-center">
				<div class="w3-large">Error! Invalid login</div>
				Please try again...
				</div>
			</div>
		</div>	
	<?PHP } ?>
	
	<div class="w3-padding-12"></div>

<?PHP if($success) { ?>
<div class="w3-panel w3-center w3-text-yellow w3-display-container w3-animate-zoom">
  <h3>Congratulation!</h3>
  <p>Your registration has been successful!<br>You can now <a href="index.php">Login.</a> </p>
</div>

<div class="w3-padding-24"></div>

<?PHP  } else { ?>
	
	<form action="" method="post" class="">
			
			  <div class="w3-section" >
				<label class="w3-medium">Name *</label>
				<input class="w3-input w3-border w3-round" type="text" name="name" required>
			  </div>

			  <div class="w3-section" >
				<label class="w3-medium">Cubaan Nama *</label>
				<input class="w3-input w3-border w3-round" type="text" name="name" required>
			  </div>

			  <div class="w3-section" >
				<label class="w3-medium">Student ID *</label>
				<input class="w3-input w3-border w3-round" type="text" name="student_id" required>
			  </div>
			  
			  <div class="w3-section" >
				<label class="w3-medium">Username *</label>
				<input class="w3-input w3-border w3-round" type="text" name="username" required>
			  </div>

			  <div class="w3-section">
				<label class="w3-medium">Password *</label>
				<input class="w3-input w3-border w3-round" type="password" name="password" required>
			  </div>
			  
			  <div class="w3-padding-16"></div>
			  
			  <div class="w3-center">
			  <input name="act" type="hidden" value="register">
			  <button type="submit" class="w3-wide w3-button w3-block w3-margin-bottom w3-round w3-indigo"><b>SIGN UP</b></button>
			  </div>
			</form> 

<?PHP  }  ?>
			
			<div class="w3-center ">Already register? <a href="index.php" >Log in here.</a></div>
			
		
		
    </div>
</div>

<div class="w3-padding-32"></div>

<!--
<div class="w3-center w3-small w3-padding-24 w3-text-white">demo ver by BelajarPHP.com</div>
-->
</div>
	


</body>
</html>
