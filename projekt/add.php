<?php
include "Connect.php";
session_start();
if($_SESSION['loged']!="yes"){
    header("Location: main.php");
}
else{
    $conn=new Connect();
    if(isset($_POST['wyslij'])){
        $specja = $_POST['specja'];
        $dolegliwosci = $_POST['dolegliwosci'];
        $conn = new Connect();
        $conn->addWizytaOcz($_SESSION['pid'],$specja,$dolegliwosci);
    }
}
?>
<head>
    <title>Panel klienta</title>
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
            <a class="navbar-brand text-dark" href="main.php">
                <img alt="Dom zdrowia" src="./images/logo.png" style="width: 250px; height: 50px">
            </a>
            <a href="soon.php" class="btn btn-default text-light">Najbliższe wizyty</a>
            <a href="all.php" class="btn btn-default text-light">Wszystkie wizyty</a>
            <a href="add.php" class="btn btn-default text-light fw-bold">Umów wizytę</a>
            <a href="uwizocz.php" class="btn btn-default text-light">Wizyty oczekujace</a>
        </div>
        <div class="btn-group ms-auto mb-2 mb-lg-0" role="group" aria-label="...">
            <span class="btn text-light disabled">
                <?php
                $state = $conn->getName($_SESSION['log']);
                while ($row=$state->fetch(PDO::FETCH_ASSOC)) {
                    echo "Witaj ".$row['imie'];
                }
                ?>
            </span>
            <a href="index.php" class="btn btn-default text-light">Wyloguj</a>
        </div>
    </div>
    </div>
</nav>
<div class="container">
    <form method="post" action="#" class="form-horizontal" role="form">
        <h2>Umawianie wizyt</h2>
        <div class="form-group">
            <label for="specja" class="col-sm-3 control-label">Wybierz specjalizację lekarza</label>
            <div class="col-sm-9">
                <select class="form-control" name="specja" id="specja" required>
                    <?php
                    $conn = new Connect();
                    $state = $conn->getAllSpec();
                    while ($row=$state->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option>'.$row['specjalizacja'].'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="dolegliwosci" class="col-sm-3 control-label">Opisz swoje dolegliwosci</label>
            <div class="col-sm-9">
                <textarea class="form-control" id="dolegliwosci" name="dolegliwosci" rows="3"></textarea>
            </div>
        </div>
        <div class="d-flex justify-content-evenly m-2">
            <button type="submit" name="wyslij" class="btn btn-primary btn-block">Wyślij prośbę o zarejestrowanie na wizytę</button>
        </div>
    </form>
</div>
</body>