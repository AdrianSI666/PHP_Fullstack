<?php
include "Connect.php";
$conn=new Connect();
session_start();
if($_SESSION['logged']!="yes"){
    header("Location: main.php");
}
else{
    $conn=new Connect();
    if($_SESSION['welcome']=="yes"){
        echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                Zalogowano
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        $_SESSION['welcome']="no";
    }
}
?>
<html>
<head>
    <title>Podsumowanie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body style='font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
font-weight: 800;
line-height: 1.2;
 background: #00d4ff;
'>
<nav class="navbar navbar-default bg-primary bg-gradient font-size-base">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand text-dark" href="padmin.php">
                <img alt="Dom zdrowia" src="./images/logo.png" style="width: 250px; height: 50px">
            </a>
            <a href="padmin.php" class="btn btn-default text-light fw-bold">Podusmowanie</a>
            <a href="ladmin.php" class="btn btn-default text-light">Lekarze</a>
            <a href="uadmin.php" class="btn btn-default text-light">Pacjenci</a>
            <a href="wadmin.php" class="btn btn-default text-light">Wizyty</a>
            <a href="radmin.php" class="btn btn-default text-light">Rejestracja</a>
        </div>
        <div class="btn-group ms-auto mb-2 mb-lg-0" role="group" aria-label="...">
           <span class="btn text-light disabled">
                <?php
                    echo "Witaj ".$_SESSION['log'];
                ?>
            </span>
            <a href="index.php" class="btn btn-default text-light">Wyloguj</a>
        </div>
    </div>
    </div>
</nav>
<div class="d-flex justify-content-center">
    <div>
        <h1>Panel administratora</h1>
    </div>

</div>
    <div class="d-flex justify-content-evenly" style="text-align: center">
        <div class="">
            <h3>Lekarzy</h3>
            <h4>
                <?php
                $state = $conn->getCountLekarze();
                while ($row=$state->fetch(PDO::FETCH_ASSOC)) {
                    echo "".$row['licz_lekarzy'];
                }
                ?>
            </h4>
        </div>
        <div class="">
            <h3>Pacjentów</h3>
            <h4>
                <?php
                $state = $conn->getCountPacjenci();
                while ($row=$state->fetch(PDO::FETCH_ASSOC)) {
                    echo "".$row['licz_pacjentow'];
                }
                ?>
            </h4>
        </div>
        <div class="">
            <h3>Oczekujace wizyty</h3>
            <h4>
                <?php
                $state = $conn->getCountWizOcz();
                while ($row=$state->fetch(PDO::FETCH_ASSOC)) {
                    echo "".$row['licz_wiz'];
                }
                ?>
            </h4>
        </div>
    </div>

</body>
</html>
