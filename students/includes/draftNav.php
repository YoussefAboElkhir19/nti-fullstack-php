<?php

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Page</title>
    
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <!-- Font Awesome CDN (latest version as of 2025) -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
/>

  <body>
    
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid p-4">
            <a class="navbar-brand fw-bold" href="studentTable.php" > 
            <?php echo isset($_SESSION['name']) ? "Welcome , ". $_SESSION['name'] : "Student App" ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="student/home">All Student</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="class/show">All Class</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="auth/register">Register</a>
                    </li>
                    
                    <?php
                        if (isset($_SESSION['name'])) {
                            echo '
                                <li class="nav-item">
                                    <a class="nav-link btn btn-danger" aria-current="page" href="auth/logout">Logout</a>
                                </li>';
                        } else {
                            echo '
                                <li class="nav-item">
                                    <a class="nav-link btn btn-success" aria-current="page" href="auth/login">Login</a>
                                </li>';
                               }

                               if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
                                    session_unset();
                                    session_destroy();
                                    header("location:login.php?logged_out=true");
                                    exit;
}
?>

                  
                    
                   
                    
                  
                  
            </div>
        </div>
    </nav>
