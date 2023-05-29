<?php 
session_start();

function site_header() {
    $header_code = "
    <!DOCTYPE html>
        <html lang='en'>

        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Video Player</title>
            <link rel='stylesheet' href='./assets/fontawesome/css/all.min.css'>
            <link rel='stylesheet' href='./assets/bootstrap/css/bootstrap.min.css'>
            <link rel='stylesheet' href='./assets/css/styles.css'>
    
            <script src='./assets/fontawesome/js/all.min.js'></script>

            <script src='./assets/js/jquery-3.6.0.min.js'></script>
            <script src='./assets/js/script.js'></script>
            <!-- <script src='./assets/js/popper.min.js'></script>-->


            <script src='./assets/bootstrap/js/bootstrap.min.js'></script>
        </head>
        <body>
    ";
    echo $header_code;
}

function site_footer() {
    $footer_code = "
    </body>
    </html>
    ";
    echo $footer_code;
}

function nav_bar() {
    $nav_code = "
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark '>
    <div class='container-fluid '>
      <a class='navbar-brand' href='dashboard.php'>Video Player</a>
      <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarSupportedContent'>
        <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
          <li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
              " . $_SESSION['username'] . "
            </a>
            <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
              <li><a class='dropdown-item' href='logout.php'>Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>  
    ";
    echo $nav_code;
}