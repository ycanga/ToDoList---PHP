<?php 
  error_reporting(0);
  $_SESSION['error'] = 0;
  $_SESSION['error_time'] = 0;
  session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>Log in</title>
</head>
<body class="container bg-dark">
<?php if ($_SESSION['error'] != 0){?>
<div class="alert alert-<?php echo $_SESSION["alert"]; ?> mt-2 text-center" role="alert">
  <b><?php echo $_SESSION['error_message']; ?></b>
</div>
<?php 
$_SESSION["error"] = 0;
header("Refresh: ".$_SESSION['error_time']."; url=".$_SESSION['error_url']."");
}
?>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100 ">
    <div class="row justify-content-center align-items-center h-100 ">
      <div class="col-12 col-lg-9 col-xl-7 ">
        <div class="card shadow-2-strong card-registration " style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5 ">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Sign up for ToDoList</h3>
            <form action="route/process.php" method="Post">
              <div class="row">
                <div class="col-md-12 mb-4">
                  <div class="form-outline">
                    <input type="text" id="Name" name="name" placeholder="Name *" class="form-control form-control-lg" required />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">
                  <div class="form-outline datepicker w-100">
                    <input type="text" name="job" placeholder="Job *" class="form-control form-control-lg" id="Job" required/>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <h6 class="mb-2 pb-1">Gender * : </h6>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                      value="1" />
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="maleGender"
                      value="0" checked />
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <input type="email" name="email" id="emailAddress" placeholder="Email *" class="form-control form-control-lg" required/>
                  </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <input type="tel" name="tel" id="phoneNumber" placeholder="Phone Number" class="form-control form-control-lg" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mb-4 pb-2">
                  <div class="form-outline">
                    <input type="Password" name="pass1" id="emailAddress" placeholder="Password *" class="form-control form-control-lg" required/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mb-4 pb-2">
                  <div class="form-outline">
                    <input type="Password" name="pass2" id="emailAddress" placeholder="Password again *" class="form-control form-control-lg" required/>
                  </div>
                </div>
              </div>
              <div class="mt-4 pt-2">
                <input class="form-control btn btn-success" name="signup" type="submit" value="Sign Up" />
                <a href="index.php" class="mt-3 form-control btn btn-secondary"/>LogIn</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
