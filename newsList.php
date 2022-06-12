<?php 

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location: login.php");
  exit;
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
    <title>Admin Panel - Sunkoshi Rural Municipality</title>
</head>
<body>
    <?php require 'partial/nav.php' ?>

    <div class="container my-3">
        <div class="alert alert-success" role="alert">
            <h5 class="alert-heading">Welcome <?php echo($_SESSION['username']); ?></h5>
        </div>
    </div>
    <div class="container my-3">
        <div class="alert alert-primary" role="alert">
        <a href="addNews.php" class="btn btn-primary">Add News</a>
        </div>
    </div>
    <div class="container my-3">
        <?php 
        include "partial/dbConnect.php";
        $sql = "SELECT * FROM `news`";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            echo'<div class="card">
                <div class="card-body">
                    <h5 class="card-title">' . $row["news-heading"] . '</h5>
                    <p class="card-text">' . $row["news-body"] . '</p>
                    <a href="updateNews.php?GetID='.$row["id"].'" class="btn btn-primary">Edit</a>
                    <a href="deleteNews.php?Del='.$row["id"].'" class="btn btn-danger">Delete</a>
                </div>
            </div>';
        }
        ?>
    </div>
    <footer>
      <h6 class="text-center">Copyright	&#169; 2022 </h6>
    </footer>
</body>
</html>
