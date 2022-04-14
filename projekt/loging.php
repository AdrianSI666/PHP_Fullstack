<?php
include "Connect.php";
$conn=new Connect();
session_start();
$_SESSION['added'];
?>
<head>
    <title>Logging</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</head>
<body style="background-image:url(images/test.jpg); font-family: Bodoni Moda, sans-serif;" >
    <?php
    if($_SESSION['added']=="yes"){
        echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                Your account has been added to the database.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        $_SESSION['added']="no";
    }
    if (isset($_POST['submit']) and isset($_POST['email']) and isset($_POST['passw'])) {
        if ($_POST['email'] != "") {
            if($_POST['passw']!=""){
                $mail=$_POST['email'];
                $passw=$_POST['passw'];
                $a=0;
                if(isset($_POST['admin']))
                {
                    $row = $conn->loggina($mail,$passw);
                    while($row->fetch(PDO::FETCH_ASSOC)){
                        $_SESSION['logged']="yes";
                        $_SESSION['welcome']="yes";
                        $_SESSION['log']=$mail;
                        header("Location: padmin.php");
                        $a++;
                    }
                }
                else{
                    $row = $conn->loggin($mail,$passw);
                    while($state=$row->fetch(PDO::FETCH_ASSOC)){
                        $_SESSION['loged']="yes";
                        $_SESSION['welcome']="yes";
                        $_SESSION['log']=$mail;
                        $_SESSION['pid']=$state['id'];
                        header("Location: main.php");
                        $a++;
                    }
                }
                if($a==0){
                    echo "<div class='alert alert-danger' role='alert'>
                        Wrong email or password!
                        </div>";
                }
            }else{
                echo "<div class='alert alert-danger' role='alert'>
                        Please enter your password
                        </div>";
            }
        }
        else {
            echo "<div class='alert alert-danger' role='alert'>
                        Please enter your email
                        </div>";
        }
    }

    echo '
<section class="ftco-section">
            <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
            <div class="wrap bg-light bg-opacity-10">
                <div class="img" style="height: 300px;">
                    <img src="images/hosp.jpg" style="height: 100%; width: 100%; object-fit: contain">
                </div>
            <div class="login-wrap p-4 p-md-5">
            <div class="d-flex">
            <div class="w-100">
            <h3 class="mb-4">Logowanie</h3>
            </div>
            </div>
            <form action="" class="signin-form" method="post">
            <div class="form-group mt-3">
                <label class="form-control-placeholder" for="email">Email</label>
                <input type="text" class="form-control" name="email" value="Email" required>
            </div>
            <div class="form-group">
                <label class="form-control-placeholder" for="passw">Hasło</label>
                <input type="password" name="passw" class="form-control" value="Hasło" required>
            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            
            <div class="form-group d-md-flex">
            <div class="w-50 text-left">
                <label class="checkbox-wrap checkbox-primary mb-0" for="admin">Zaloguj jako administrator</label>
                <input type="checkbox" name="admin" value="yes">
                
            </div>
            </div>
            
            <div class="form-group">
                <input type="submit" class="form-control btn btn-primary rounded submit px-3" value="ZALOGUJ" name="submit">
            </div>
            
            </form>
            <p class="text-center">Nie masz jeszcze konta? <a href="registration.php">Stwórz nowe!</a> </p>
            </div>
            </div>
            </div>
            </div>
            </div>
</section>
            ';

    ?>

</body>
