<?php
include "Connect.php";
session_start();
if($_SESSION['loged']!="yes"){
    header("Location: main.php");
}
else{
    $conn=new Connect();
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
            <a href="all.php" class="btn btn-default text-light fw-bold">Wszystkie wizyty</a>
            <a href="add.php" class="btn btn-default text-light">Umów wizytę</a>
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
<div class="d-flex justify-content-center m-3">
    <div>
        <h3>Przyszłe wizyty</h3>
    </div>

</div>
<div class="d-flex justify-content-evenly" style="text-align: center">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
        <tr>
            <th>Data wizyty</th>
            <th>Lekarz</th>
            <th>Specjalizacja</th>
            <th>Gabinet</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $state = $conn->getWizytyPrzyszPacj($_SESSION['pid']);
        while ($row = $state->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
            echo "<td>" . $row['date'] . " " . $row['hour'] . "</td>";
            echo "<td>" . $row['l_imie'] . " " . $row['l_nazwisko'] . "</td>";
            echo "<td>" . $row['specjalizacja'] . "</td>";
            echo "<td>" . $row['gabinet'] . "</td>";
            echo "<tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center m-3">
    <div>
        <h3>Historia wizyt</h3>
    </div>
</div>
<div class="d-flex justify-content-evenly" style="text-align: center">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
        <tr>
            <th>Data wizyty</th>
            <th>Lekarz</th>
            <th>Specjalizacja</th>
            <th>Gabinet</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $state = $conn->getWizytyPrzeszPacj($_SESSION['pid']);
        while ($row = $state->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['date'] . " " . $row['hour'] . "</td>";
            echo "<td>" . $row['l_imie'] . " " . $row['l_nazwisko'] . "</td>";
            echo "<td>" . $row['specjalizacja'] . "</td>";
            echo "<td>" . $row['gabinet'] . "</td>";
            echo "<tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>