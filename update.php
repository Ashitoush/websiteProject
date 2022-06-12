<?php
include "partial/dbConnect.php";

if(isset($_POST['update']))
{
    $newsID = $_GET['ID'];
    $newsHeading = $_POST['news-heading'];
    $newsBody = $_POST['news-body'];

    $sql = "update `news` set `news-heading`= '".$newsHeading."', `news-body`='".$newsBody."' where id='".$newsID."'";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        header("location: newsList.php");
    }
}
else
{
    header("location: updateNews.php");
}

?>