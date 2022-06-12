<?php 
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
}

include "partial/dbConnect.php";

$newsID = $_GET['GetID'];
$sql = "SELECT * FROM news WHERE id='".$newsID."'";
$result = mysqli_query($conn, $sql);

while($row=mysqli_fetch_assoc($result))
{
    $newsID = $row["id"];
    $newsHeading = $row["news-heading"];
    $newsBody = $row["news-body"];
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
    <title>Update News - Sunkoshi Rural Municipality</title>
</head>
<body>
<?php require 'partial/nav.php' ?>

<section>
<div class="container my-3">
<div class="alert alert-success" role="alert">
  </div>
      <h1 class="text-center">Update News Details</h1>
      <form action="update.php?ID=<?php echo $newsID ?>" method="post">
  <div class="form-group">
    <label for="news-heading">News Heading</label>
      <input type="text" class="form-control" id="news-heading" name="news-heading" value="<?php echo $newsHeading ?>">
    
  </div>
  <div class="form-group">
    <label for="news-body">News Description</label>
    <textarea class="form-control" id="news-body" name="news-body"><?php echo $newsBody ?></textarea>
  </div>

  <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>
    </div>
    <footer>
      <h6 class="text-center">Copyright	&#169; 2022 </h6>
    </footer>




</body>
</html>

