<?php 

session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  $loggedin = true;
}
else{
  $loggedin = false;
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
    <title>Data Collect - Sunkoshi Rural Municipality</title>
</head>
<body>
<?php require 'partial/nav.php' ?>

    <section>
        <h2 class="mx-3 text-center">Enter your Details</h2><br>
        <form action="" method="post" class="text-center">
            <label for="">Name</label><br>
            <input type="text" name="name"><br><br>

            <label for="">Address</label><br>
            <input type="text" name="address"><br><br>

            <label for="">Profession</label><br>
            <input type="text" name="profession"><br><br>

            <label for="">Date of Birth</label><br>
            <input type="date" name="dateOfBirth"><br><br>

            <label for="">Sector Type</label><br>
            <label><input type="radio" name="governmental"> Governmental Sector</label><br>
            <label><input type="radio" name="educational"> Educational Sector</label><br>
            <label><input type="radio" name="hospital"> Hospital Sector</label><br>
            <label><input type="radio" name="private"> Private Sector</label><br><br> 

            <input type="submit" name="submit" value="Add Details">
        </form>
 

    </section>
    <footer>
      <h6 class="text-center">Copyright	&#169; 2022 </h6>
    </footer>




</body>
</html>
