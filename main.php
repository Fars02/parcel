<?PHP
session_start();

include("database.php");
if( !verifyStudent($con) ) 
{
	header( "Location: index.php" );
	return false;
}
?>
<?PHP
$SQL_view 	= " SELECT * FROM `student` WHERE `username` =  '". $_SESSION["username"] ."'";
$result 	= mysqli_query($con, $SQL_view);
$data		= mysqli_fetch_array($result);
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
body,h1,h2,h3,h4,h5,h6 {font-family: "Alata", sans-serif}

a:link {
  text-decoration: none;
}

body, html {
  height: 100%;
  line-height: 1.2;
}

/* Full height image header */
.bgimg-1 {
  background-position: top;
  background-size: cover;
  background-image: url("images/banner.jpg");
  background-color: rgba(255, 255, 255, 0.786);
  background-blend-mode: overlay;
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>

<body class="">

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-large" >
    <div class=" w3-padding-16 w3-right w3-hover-text-yellow w3-text-white" ><a href="logout.php"><i class="fa fa-sign-out w3-padding  fa-lg"></i></a></div>
  </div>
</div>

<div class="bgimg-1">



<div class="w3-teal w3-topx" style="z-index:-0; border-bottom-left-radius: 80px 80px;">
	<div class="w3-center w3-padding-24">
		<img class="w3-center" src="logo.png" width="200px">
	</div>
</div>

<div class="w3-container w3-padding" id="contact">
    <div class="w3-content w3-container w3-round" style="max-width:600px">
		<div class="w3-paddingx">
			
			<div class="w3-padding-16"></div>
			<div class="w3-text-green w3-large w3-padding">Parcel Arrived</div>
			
			<div class="w3-card w3-round-large w3-padding">
			
			 <input class="w3-input w3-border w3-padding" type="text" id="search" placeholder="Search for names or tracking no...">
			 
			 <?PHP
				$SQL_parcel = "SELECT * FROM parcel WHERE `status` <> 'Claimed' ORDER BY id_parcel DESC ";
				$rst_parcel = mysqli_query($con, $SQL_parcel) ;
				while ( $data = mysqli_fetch_array($rst_parcel) )
				{
			 ?>
					
			  <ul class="w3-ul w3-margin-top" id="myUL">
				<li class="w3-light-gray w3-round-large"><span class="w3-text-indigo"><?PHP echo $data["name"]; 
				?></span><br><span class="w3-text-green"><?PHP echo $data["tracking_no"]; 
				?></span><br><span class="w3-text-green"><?PHP echo $data["location"]; 
				?></span><span class="w3-small w3-right w3-text-green"><?PHP echo $data["date"]; ?></span></li>
				<br>
			  </ul>
			
			<?PHP } ?>
			  
			</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#search').keyup(function(){
			search_table($(this).val());
		});
		function search_table(value){
			$('#myUL li').each(function(){
				var found = 'false';
				$(this).each(function(){
					if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0)
					{
						found='true';
					}

				});
				if(found=='true'){
					$(this).show();
				}
				else{
					$(this).hide();
				}
			});
		}
	});
</script>
			
			</div>
			
			
		</div>
    </div>
</div>

<div class="w3-padding-32"></div>
</div>



</body>
</html>
