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
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $specjalizacja = $_POST['specjalizacja'];
        $telefon = $_POST['telefon'];
        $gabinet = $_POST['gabinet'];
        $conn = new Connect();
        $conn->addLekarz($imie, $nazwisko, $specjalizacja, $telefon, $gabinet);
    }
}
?>
<html>
<head>
    <title>Lekarze dodawani</title>
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
            <a href="ladmin.php" class="btn btn-default text-light fw-bold">Lekarze</a>
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

<div class="container">
    <form method="post" action="#" class="form-horizontal" role="form">
        <h2>Rejestracja lekarza</h2>
        <div class="form-group">
            <label for="imie" class="col-sm-3 control-label">Imie</label>
            <div class="col-sm-9">
                <input type="text" id="imie" name="imie" placeholder="Imie" class="form-control" autofocus required>
            </div>
        </div>
        <div class="form-group">
            <label for="nazwisko" class="col-sm-3 control-label">Nazwisko</label>
            <div class="col-sm-9">
                <input type="text" id="nazwisko" name="nazwisko" placeholder="Nazwisko" class="form-control" autofocus required>
            </div>
        </div>
        <div class="form-group">
            <label for="specjalizacja" class="col-sm-3 control-label">Specjalizacja </label>
            <div class="col-sm-9">
                <select class="form-control" name="specjalizacja" id="specjalizacja" required>
                    <option selected=""> Wybierz specjalizację </option>
                    <option>Alergologia</option>
                    <option>Anestezjologia</option>
                    <option>Angiologia</option>
                    <option>Audiologia</option>
                    <option>Balneologia</option>
                    <option>Chirurgia</option>
                    <option>Choroby wewnętrzne</option>
                    <option>Dermatologia</option>
                    <option>Diabetologia</option>
                    <option>Diagnostyka</option>
                    <option>Endokrynologia</option>
                    <option>Epidemiologia</option>
                    <option>Farmakologia </option>
                    <option>Gastroenterologia</option>
                    <option>Geriatria</option>
                    <option>Ginekologia</option>
                    <option>Hematologia</option>
                    <option>Immunologia</option>
                    <option>Intensywna terapia</option>
                    <option>Kardiochirurgia</option>
                    <option>Kardiologia</option>
                    <option>Nefrologia</option>
                    <option>Neurologia</option>
                    <option>Neuropatologia</option>
                    <option>Okulistyka</option>
                    <option>Onkologia</option>
                    <option>Ortopedia</option>
                    <option>Pediatria</option>
                    <option>Psychiatria</option>
                    <option>Radioterapia </option>
                    <option>Reumatologia</option>
                    <option>Seksuologia</option>
                    <option>Urologia</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="telefon" class="col-sm-3 control-label">Telefon</label>
            <div class="col-sm-9">
                <input type="tel" id="telefon" name="telefon" placeholder="Numer telefonu" class="form-control" maxlength="9" minlength="9">
            </div>
        </div>
        <div class="form-group">
            <label for="gabinet" class="col-sm-3 control-label">Gabinet</label>
            <div class="col-sm-9">
                <input type="number" id="gabinet" name="gabinet" placeholder="Gabinet" class="form-control" required>
            </div>
        </div>
        <div class="d-flex justify-content-evenly m-2">
            <button type="submit" name="wyslij" class="btn btn-primary btn-block">Zarejestruj</button>
        </div>
    </form>
</div>
</body>
</html>
