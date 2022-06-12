<?php 
$showAlert = false;
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  $loggedin = true;
}
else{
  $loggedin = false;
}
// include "partial/dbConnect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    include "partial/dbConnect.php";
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactNumber'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $sql = "Insert into `contact` ( `name`, `email`, `contact_number`, `subject`, `message`) values ('$name', '$email', '$contactNumber', '$subject', '$message')";
    $result = mysqli_query($conn, $sql);
    
    if($result){
      $showAlert = true;
    }
}

?>

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
    <title>Contact - Sunkoshi Rural Municipality</title>
</head>
<body>
    <?php require 'partial/nav.php' ?>

    <section>
    <?php if($showAlert){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> Your Messsage has been submitted.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
        <div class="container">
      <h2 class="text-center">Contact Us</h2>
      <form action="contact.php" method="post">
  <div class="form-group">
    <label for="username">Name</label>
      <input type="text" maxlength="50" class="form-control" id="name" name="name" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
  <label for="email">Email</label>
      <input type="email" maxlength="50" class="form-control" id="email" name="email" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="contactNumber">Contact Number</label>
    <input type="text" maxlength="10" class="form-control" id="contactNumber" name="contactNumber">
  </div>
  <div class="form-group">
    <label for="subject">Subject</label>
    <input type="text" maxlength="50" class="form-control" id="subject" name="subject">
  </div>
  <div class="form-group">
    <label for="message">Message</label>
    <input type="text" maxlength="400" class="form-control" id="message" name="message">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</section>
    <footer>
      <h6 class="text-center">Copyright	&#169; 2022 </h6>
    </footer>




</body>
</html>
