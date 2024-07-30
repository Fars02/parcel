<?PHP
session_start();

include("database.php");
if( !verifyAdmin($con) ) 
{
	header( "Location: index.php" );
	return false;
}
?>
<?PHP
$act 		= (isset($_REQUEST['act'])) ? trim($_REQUEST['act']) : '';	
$id_parcel	= (isset($_REQUEST['id_parcel'])) ? trim($_REQUEST['id_parcel']) : '';	

if($act == "del")
{
	$SQL_delete = " DELETE FROM `parcel` WHERE `id_parcel` =  '$id_parcel' ";
	$result = mysqli_query($con, $SQL_delete) or die("Error in query: ".$SQL_delete."<br />".mysqli_error($con));
	
	print "<script>self.location='a-main.php';</script>";
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

<link href="table.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
<style>
a {
  text-decoration: none;
}

body,h1,h2,h3,h4,h5,h6 {font-family: "Alata", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

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

<body class="w3-light-gray">

<?PHP include("menu-admin.php"); ?>

<div class="w3-teal w3-topx" style="z-index:-0; border-bottom-left-radius: 80px 80px;">
	<div class="w3-center w3-padding-24">
		<img class="w3-center" src="logo.png" width="200px">
	</div>
</div>


<div class="w3-container w3-padding" id="contact">
    <div class="w3-content w3-container w3-round" style="max-width:600px">
		<div class="w3-paddingx">
			
		
		  <div class="w3-padding-16">

			  <div class="w3-card w3-round w3-white">
				<div class="w3-container w3-padding"> 
				  
				  <h4>Parcel List (Claimed)</h4>
				  <hr class="w3-clear1">
				  
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTablex" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Parcel</th>
							<th></th>	
						</tr>
					</thead>
					<tbody>
					
					<?PHP
					$bil = 0;

					$SQL_parcel = "SELECT * FROM `parcel` WHERE `status` <> 'Unclaim' ORDER BY id_parcel DESC";

					$result = mysqli_query($con, $SQL_parcel) or die("Error in query: ".$SQL_parcel."<br />".mysqli_error($con));

					while ( $data	= mysqli_fetch_array($result) )
					{
						$bil++;
					?>
						<tr>
							<td><span class="w3-text-indigo"><?PHP echo $data["name"]; ?></span><br>
							<span class="w3-text-green"><?PHP echo $data["tracking_no"]; ?></span><br>
							<span class="w3-text-green"><?PHP echo $data["location"]; ?></span></td>
							<td>
							
							<a href="#" onclick="document.getElementById('idClaim<?PHP echo $bil;?>').style.display='block'"  class=""><i class="fa fa-fw fa-lg fa-search"></i> </a>
							
							<a onclick="return confirm('Are you sure ?');" href="?act=del&id_parcel=<?PHP echo $data["id_parcel"]; ?>" class="w3-text-red"><i class="fa fa-fw fa-lg fa-trash"></i> </a>

							</td>
						</tr>

<div id="idClaim<?PHP echo $bil; ?>" class="w3-modal" style="z-index:20;">
	<div class="w3-modal-content w3-round-large w3-card-4 w3-animate-zoom" style="max-width:600px;">
	  <header class="w3-container "> 
		<span onclick="document.getElementById('idClaim<?PHP echo $bil; ?>').style.display='none'" 
		class="w3-button w3-display-topright w3-round-large">&times;</span>
		<h4>Parcel Claimed</h4>
	  </header>
	  <hr>
		<div class="w3-padding w3-margin">
		
			<div class="w3-section" >
				<label>Name *</label>
				<input class="w3-input w3-border w3-round" type="text" name="name" value="<?PHP echo $data["name"]; ?>" disabled>
			</div>
			
			<div class="w3-section" >
				<label>Tracking No *</label>
				<input class="w3-input w3-border w3-round" type="text" name="tracking_no" value="<?PHP echo $data["tracking_no"]; ?>" disabled>
			</div>

			<div class="w3-section" >
				<label>Location *</label>
				<input class="w3-input w3-border w3-round" type="text" name="location" value="<?PHP echo $data["location"]; ?>" disabled>
			</div>
			
			<div class="w3-section" >
				<label>Date Claim *</label>
				<input class="w3-input w3-border w3-round" type="date" name="date_claim" value="<?PHP echo date("Y-m-d"); ?>" disabled>
			</div>
			
			<div class="w3-section" >
				<label>Claim By *</label>
				<input class="w3-input w3-border w3-round" type="text" name="name" value="<?PHP echo $data["name"]; ?>" disabled>
			</div>

			<hr class="w3-clear">
		
		</div>
	</div>
</div>	
					<?PHP				
					}
					?>

					</tbody>
				</table>
				
				 <p>&nbsp;</p>
			</div>
				  

				</div>
			  </div>

		  </div>
		  
		 


		</div>
    </div>
</div>
	
	<div class="w3-padding-24"></div>
	
</div>


<div id="idAdd" class="w3-modal" style="z-index:10;">
	<div class="w3-modal-content w3-round-large w3-card-4 w3-animate-zoom" style="max-width:600px;">
	  <header class="w3-container "> 
		<span onclick="document.getElementById('idAdd').style.display='none'" 
		class="w3-button w3-display-topright w3-round-large">&times;</span>
		<h4>Add Parcel</h4>
	  </header>
	  <hr>
		<div class="w3-padding w3-margin">
		<form method="post" action=""  >
			<div class="w3-section" >
				<label>Name *</label>
				<input class="w3-input w3-border w3-round" type="text" name="name" value="" required>
			</div>
			
			<div class="w3-section" >
				<label>Tracking No *</label>
				<input class="w3-input w3-border w3-round" type="text" name="tracking_no" value="" required>
			</div>
			
			<hr class="w3-clear">
			<input type="hidden" name="act" value="add" >
			<button type="submit" class="w3-button w3-wide w3-teal w3-text-white w3-margin-bottom w3-round">SUBMIT</button>

		</form>
		</div>
	</div>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {

  
	$('#dataTable').DataTable( {
		paging: true,
		
		searching: true
	} );
		
	
});
</script>


<script>

var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

function w3_close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>
