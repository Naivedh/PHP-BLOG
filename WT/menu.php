<?php
if (isset($user_name))
    $path = "update.php";
else
    $path = "registration.html";

?>    
    
    <nav class="navbar  navbar-light text-white "style="z-index:9999;background-color: #69747c;">
        <a class="navbar-brand" href="#" style="color:white; font-size: 25px;">Blog</a>
        <button class="navbar-toggler d-xl" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul ul class="nav navbar-nav side ">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php" style="color:white;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html" style="color:white;">About</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto" >
               
                   <?php 
                  
                    if (!isset($user_name))
                    { 
                        echo'<li class="nav-item">
                        <a class="nav-link" style="color:white;" href="signup.html">
                        Sign Up
                        </a></li>';
                    }
                    else 
                    {
                        echo'<li class="nav-item">
                        <a class="nav-link" style="color:white;" href="addpost.php">
                        New Post
                        </a></li>';
                    
                        echo'<li class="nav-item">
                        <a class="nav-link" style="color:white;" href="mypost.php">
                        My Post
                        </a></li>';
                    }
                  ?>

                   <li class="nav-item">
                    <a class="nav-link" style="color:white;" href="login.php">
                    <?php 
                        if (isset($user_name))
                            echo "Logout";
                        else
                            echo "Login";
                        
                        ?>
                    </a>
                </li>
            </ul>
        </div>
    </nav>