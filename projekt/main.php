<?php
session_start();
if($_SESSION['welcome']=="yes"){
    echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                Zalogowano
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    $_SESSION['welcome']="no";
}
?>
<head>
    <title>Główna strona</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="main.css">
    <script src="main.js"></script>
</head>
<iframe type="text/html" id="rick" width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1&mute=1&enablejsapi=1" allow='autoplay' frameborder="0" allowfullscreen style="width: 100%; height: 100%" ></iframe>
<body style='font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
font-weight: 800;
line-height: 1.2;
 background: rgb(2,0,36);
background: linear-gradient(180deg, rgba(2,0,36,1) 0%, rgba(28,110,150,0.5998600123643207) 40%, rgba(0,212,255,1) 100%);
'
      id="conteiner">
<nav class="navbar navbar-default bg-primary bg-gradient font-size-base">
      <div class="container-fluid">
        <div class="navbar-header">
              <a class="navbar-brand text-dark" href="main.php">
                  <img alt="Dom zdrowia" src="./images/logo.png" style="width: 250px; height: 50px">
              </a>
            <a href="main.php" class="btn btn-default text-light fw-bold">Informacje dla pacjentów</a>
            <a href="uslugi.php" class="btn btn-default text-light">Usługi</a>
        </div>
          <div class="btn-group ms-auto mb-2 mb-lg-0" role="group" aria-label="...">

              <?php
              if($_SESSION['loged']=="yes"){
                  echo '
                    <a href="soon.php" class="btn btn-default text-light">Panel pacjenta</a>
                    <a href="index.php" class="btn btn-default text-light">Wyloguj</a>
                 ';
              }
              else{
                  echo '
                    <a href="loging.php" class="btn btn-default text-light">Logowanie</a>
                    <a href="registration.php" class="btn btn-default text-light">Rejestracja</a>
                ';
              }
              ?>
          </div>
        </div>
      </div>
</nav>
<header class="masthead">
                <img src="images/lounge.jpg" height="400px" width="100%" class="m-0 p-0">
</header>

<div class="container px-4 px-lg-5 mt-3 ">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            <div class="post-preview">
                <a href="#!" onclick="roll()">
                    <h2 class="post-title">Czwarta fala nadchodzi</h2>
                    <h4 class="post-subtitle">Ludzie nadal nie noszą maseczek ani nie szczepią się</h4>
                </a>
                <p class="post-meta">
                    W dniu 24.12.2021
                </p>

            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Post preview-->
            <div class="post-preview">
                <a href="#!" onclick="roll()"><h2 class="post-title">Coraz więcej ludzi po przyjęciu trzeciej dawki ma skutki uboczne</h2></a>
                <p class="post-meta">
                    W dniu 18.12.2021
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
        </div>
    </div>
</div>
</body>