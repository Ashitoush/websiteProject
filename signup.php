<?php
  $showAlert = false;
  $showError = false;
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    include "partial/dbConnect.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    
    
    $existSql = "SELECT * FROM `admin` WHERE username='$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);

    if($numExistRows > 0){
      //$exists = true;
      $showError = "Username Already Exists";
    }else{
      
      if($password == $cpassword){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `admin` ( `username`, `password`) VALUES 
        ('$username', '$hash');";
      
        $result = mysqli_query($conn, $sql);
        if($result){
          $showAlert = true;
          header("location: login.php");
        }
      }else{
        $showError = "Passwords do not Match";
      }
    }
  }
   
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>SignUp - Sunkoshi Rural Municipality</title>
</head>
<body>
<?php require 'partial/nav.php' ?>

<?php
if($showAlert){
  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account is now created and you can login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($showError){
  echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> '. $showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

<div class="container">
      <h1 class="text-center">Create an Account</h1>
      <form action="signup.php" method="post">
  <div class="form-group">
    <label for="username">Username</label>
      <input type="text" maxlength="50" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" maxlength="50" class="form-control" id="password" name="password">
  </div>
  <div class="form-group">
    <label for="cpassword">Confirm Password</label>
    <input type="password" maxlength="50" class="form-control" id="cpassword" name="cpassword">
    <small id="emailHelp" class="form-text text-muted">Make sure to type the same password.</small>
  </div>
  <button type="submit" class="btn btn-primary">SignUp</button>
</form>
    </div>
    <footer>
      <h6 class="text-center">Copyright	&#169; 2022 </h6>
    </footer>
</body>
</html>
