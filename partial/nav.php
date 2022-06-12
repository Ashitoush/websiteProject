<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  $loggedin = true;
}
else{
  $loggedin = false;
}

echo'
<header class="mt-3 ml-3">
        <div>
            <img src="img/logo.png" class="logo">
            <h3 class="">Sunkoshi Rural Municipality</h3>
            <p>बागमती प्रदेश "हामी सबैको शान, समृद्ध सुनकोशी हाम्रो अभियान"
            </p>
        </div>
        <!-- navigation -->
        <!-- taken from: https://getbootstrap.com/docs/4.0/components/navbar/ -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link text-dark" href="index.php">Home</a>
                </li>
                
                <li class="nav-item ">
                  <a class="nav-link text-dark ms-5" href="about.php">About Us</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link text-dark ms-5" href="services.php">Our Services</a>
                  </li>

                <li class="nav-item ">
                  <a class="nav-link text-dark ms-5" href="news.php">News</a>
                </li>  

                <li class="nav-item ">
                    <a class="nav-link text-dark ms-5" href="contact.php">Contact Us</a>
                  </li>';
                if(!$loggedin){
                  echo'
                  <li class="nav-item ">
                    <a class="nav-link text-dark ms-5" href="login.php">Login</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-dark ms-5" href="signup.php">Signup</a>
                </li>';
              }
                if($loggedin){
                  echo'<li class="nav-item ">
                    <a class="nav-link text-dark ms-5" href="newsList.php">News List</a>
                    </li>
                    <li class="nav-item ">
                    <a class="nav-link text-dark ms-5" href="logout.php">Logout</a>
                </li>';
              }
           echo'</ul>
          </nav>
    </header>';

  ?>