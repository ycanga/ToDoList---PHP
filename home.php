<?php 
	require "route/settings.php";
	error_reporting(0);
	date_default_timezone_set('Europe/Istanbul');
	$date = date("H:i");  
	$allNote = $pdo->query("SELECT * FROM notes");
	$_SESSION['error'] = 0;
	$_SESSION['login'] = false;
	session_start();
	if ($_SESSION['login'] == true) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link href='https://css.gg/trash.css' rel='stylesheet'>
	<link href='https://css.gg/logout.css' rel='stylesheet'>
	<link href='https://css.gg/format-strike.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<title>ToDoList</title>
</head>
<body class="bg-dark">
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <!-- Navbar content -->
  <div class="container-fluid text-center">
  	<h2 class="container p-2">ToDoList</h1>
  </div>
</nav>
<div class="mt-5 container d-flex justify-content-center text-white">
  	<b style="text-transform: uppercase"><img src="assets/img/user.png" style="width:30px;"> <?php echo "Welcome, ".$_SESSION['user']." !"; ?></b>
</div>
<div class="mt-3 container d-flex justify-content-center">
	<button class="btn btn-outline-danger  deletenote" data-id="all" data-toggle="modal" data-target="#logoutmodal"><img src="assets/img/logout.png" style="width: 30px;"> Logout</button>
</div>
<?php 
	if($_SESSION['error'] == 1){ 
 ?>
		<div class="alert alert-danger container mt-3 text-center" role="alert">
		  <b>Uppsss...There is a problem. !</b>
		</div>
<?php 
		$_SESSION['error'] = 0;
		header("Refresh: 2;");
	}
?>
<div class="container py-5">
<form action="route/addnote.php" method="Post">
	<input type="hidden" name="date" value="<?php echo $date; ?>">
	<div class="input-group">
	  <input type="search" class="form-control rounded" placeholder="Your Note" aria-label="Search" name="note" aria-describedby="search-addon" />
	</div>
	<button type="submit" name="add" class="form-control btn btn-outline-success mt-3">Add Note</button>
</form>
<button class="form-control btn btn-outline-danger mt-3 deletenote" data-id="<?php echo "all?".$_SESSION['id']; ?>" data-toggle="modal" data-target="#exampleModalCenter">Delete All</button>
<hr>
<div class="table p-3">
	<table class="table table-striped table-dark">
  <thead>
    <tr  class="text-center">
      <th scope="col">#</th>
      <th scope="col">Note</th>
      <th scope="col">Date</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php 
	    $count = 0; 
	    foreach ($allNote as $allNote) {
	    $count++;
	    if($_SESSION['id'] == $allNote["user_id"]){
	  ?>
		  <tr>
	      <th scope="row" class="text-center"><?php echo $count; ?></th>
	      	<td>
	      		<?php 
		  			$note = $allNote["note"];
						$string = $password;
						$encrypt_method = 'AES-256-CBC';
						$secret_key = '11*_33';
						$secret_iv = '22-=**_';
						$key = hash('sha256', $secret_key); 
						$iv = substr(hash('sha256', $secret_iv), 0, 16);
		  			$note = openssl_decrypt($note,$encrypt_method, $key, false, $iv);
		  			if ($allNote["active"] == 1) {
		  				echo $note;
		  			}
		  			else{
		  				echo "<del>".$note."</del>";
		  			}
	  		 ?>
	  		</td>


	      <td class="text-center"><?php echo $allNote["note_date"] ?></td>
	      <td>
	      	<div class="row ">
	      		<form action="route/process.php" method="Post">
	      			<input type="hidden" name="active" value="<?php echo $allNote["id"]; ?>">
		      		<div class="col-6">
		      			<button type="submit" name="updateactive" class="btn btn-outline-success" id="deneme" style="height:30px;"><i class="gg-format-strike"></i></button>
		      		</div>
	      		</form>
	      		<div class="col-6">
	      			<button class="btn btn-outline-danger deletenote" data-id="<?php echo $allNote["id"]; ?>" data-toggle="modal" data-target="#exampleModalCenter"><i class="gg-trash"></i></button>
	      		</div>
	      	</div>
	      </td>
	    </tr>
	<?php }} ?>
  </tbody>
</table>
</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete this note ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b class="text-danger">Ths action cannot be undone. !</b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="route/deletenote.php" method="Post">
        	<input type="hidden" name="id" id="delid">
        	<button type="submit" id="btndelete" name="deleteNote" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Logout modal -->
<div class="modal fade" id="logoutmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to log out?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b class="text-warning">If you log out, you will have to log in again. !</b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="route/logout.php" method="Post">
        	<button type="submit" id="btndelete" name="deleteNote" class="btn btn-danger">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- logout modal -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
	$('.deletenote').click(function (event) {
        var id = $(this).attr("data-id");
        $("#delid").val(id);
    })
	var deneme = document.getElementById('deneme');
	
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
<?php } ?>
