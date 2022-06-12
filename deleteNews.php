<?php

    include "partial/dbConnect.php";

    if(isset($_GET['Del']))
    {
        $newsID = $_GET['Del'];
        $sql = "delete from `news` where id='".$newsID."'";
        $result = mysqli_query($conn, $sql);
        
        if($result)
        {
            header("location: newsList.php");
        }
        else
        {
            echo 'Please Check your Query';
        }

    }

?>