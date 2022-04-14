<?php
include "Connect.php";
$conn=new Connect();
session_start();
if($_SESSION['logged']!="yes"){
    header("Location: main.php");
}
else{
    $conn=new Connect();
    if(isset($_POST['wyslij'])){
        $lekarz_id = $_POST['lekarz'];
        $pacjent_id = $_POST['pacjent'];
        $data_wizyty = $_POST['datawiz'];
        if(date("Y-m-d")<=$data_wizyty)
        {
            $godzina_wizyty = $_POST['godzina'];
            $conn = new Connect();
            $conn->addWizytyOcz($pacjent_id,$lekarz_id,$data_wizyty,$godzina_wizyty,$_SESSION['wiz']);
        }
        else{
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Niepoprawna data wizyty, musi być ona zaplanowana na dzisiaj lub na późniejszy dzień.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
}
?>
<html>
<head>
    <title>Umawianie wizyt</title>
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
            <a href="padmin.php" class="btn btn-default text-light">Podusmowanie</a>
            <a href="ladmin.php" class="btn btn-default text-light">Lekarze</a>
            <a href="uadmin.php" class="btn btn-default text-light">Pacjenci</a>
            <a href="wadmin.php" class="btn btn-default text-light">Wizyty</a>
            <a href="radmin.php" class="btn btn-default text-light fw-bold">Rejestracja</a>
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

<div class="container">
    <form method="post" action="#" class="form-horizontal" role="form">
        <h2>Umawianie wizyt</h2>
        <div class="form-group">
            <label for="lekarz" class="col-sm-3 control-label">Lekarz</label>
            <div class="col-sm-9">
                <select class="form-control" name="lekarz" id="lekarz" required>
                    <?php
                        $conn = new Connect();
                    $state = $conn->getLekarzeSpec($_SESSION['spec']);
                    while ($row=$state->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option label="'.$row['imie'].' '.$row['nazwisko'].' - '.$row['specjalizacja'].'">'.$row['id'].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="pacjent" class="col-sm-3 control-label">Pacjent</label>
            <div class="col-sm-9">
                <select class="form-control" name="pacjent" id="pacjent" required>
                    <?php
                    $conn = new Connect();
                    $state = $conn->getPacjent($_SESSION['pacjent']);
                    while ($row=$state->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option label="'.$row['pesel'].'; '.$row['imie'].' '.$row['nazwisko'].'" selected>'.$row['id'].'</option>';
                    };
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="datawiz" class="col-sm-3 control-label">Data wizyty </label>
            <div class="col-sm-9">
                <input type="date" id="datawiz" name="datawiz" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label for="godzina" class="col-sm-3 control-label">Godzina rozpoczecia</label>
            <div class="col-sm-9">
                <input type="time" id="godzina" name="godzina" class="form-control" required>
            </div>
        </div>
        <div class="d-flex justify-content-evenly m-2">
            <button type="submit" name="wyslij" class="btn btn-primary btn-block">Dodaj</button>
        </div>
    </form>
</div>
</body>
</html>
