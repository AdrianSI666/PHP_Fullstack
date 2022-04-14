<?php
include "Connect.php";
$profile_viewer_uid = $_COOKIE['profile_viewer_uid'];

if (isset($_POST['submit'])){

     if($profile_viewer_uid==1){

     }else {
         $conn = new Connect();
         $email = $_POST['email'];
         $row = $conn->match($email);
         $a=0;
         while($row->fetch(PDO::FETCH_ASSOC)){
             $a++;
         }
         if($a>0){
             echo "
            <div class='alert alert-dangert alert-dismissible fade show' role='alert'>
                Taki adres email, jest już zarejestrowany w naszej przychodni.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
         }
         else{
             $haslo = $_POST['haslo'];
             $imie = $_POST['imie'];
             $nazwisko = $_POST['nazwisko'];
             $data_ur = $_POST['data_ur'];
             $pesel = $_POST['pesel'];
             $miasto = $_POST['miasto'];
             $adres = $_POST['adres'];
             $_SESSION['added'] = "yes";
             $conn->addUser($email, $haslo, $imie, $nazwisko, $data_ur, $pesel, $miasto, $adres);
         }
     }

}
?>
<head>
    <title>Registration </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href='http://fonts.googleapis.com/css?family=Bodoni+Moda&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="forms.js"></script>
<body>
<section id="kontakt" class="vh-100 bg-image" style="background-image: url('images/test2.jpg'); background-size: cover; font-family: Bodoni Moda, sans-serif;">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
    <form method=POST onsubmit="return checkForm();">
        <fieldset>
            <legend class="text-uppercase text-center mb-5">Registration</legend>

            <label for="contactEmail">Email</label>
            <input name="email" type="text" id="contactEmail" class="form-control" onblur="onbluremail()"/>
            <div class="invalid-feedback">
                <span id="errorEmail" class="hide">You need to provide Email</span>
                <span id="errorFormaEmail" class="hide">Wrong Email format</span>
            </div>


            <label for="contactPassw">Password</label>
            <input name="haslo" type="password" id="contactPassw" class="form-control" onblur="onblurpassw()"/>
            <div class="invalid-feedback">
                <span id="errorPassw" class="hide">You need to provide Password</span>
                <span id="errorFormaPassw" class="hide">Password is too weak, you need to have alteast one small letter, big letter, nubmer and special character</span>
            </div>

            <label for="contactName">Name</label> <input name="imie" type="text" id="contactName" class="form-control" onblur="onblurimie()"/>
            <div class="invalid-feedback">
                <span id="errorName" class="hide">You need to provide Name</span>
            </div>


            <label for="contactSurName">Surname</label> <input name="nazwisko" type="text" id="contactSurName" class="form-control" onblur="onblurnazwisko()"/>
            <div class="invalid-feedback">
                <span id="errorSurName" class="hide">You need to provide Surname</span>
            </div>


            <label for="contactBirth">Birth Day</label> <input name="data_ur" type="date" id="contactBirth" class="form-control" required onchange="onblurBirth()"/>
            <div class="invalid-feedback">
                <span id="errorBirth" class="hide">You need to provide Birthday</span>
                <span id="errorBirthForm" class="hide">You need to provide date that isn't from the future</span>
            </div>

            <label for="contactPesel">Pesel</label> <input name="pesel" type="number" id="contactPesel" class="form-control" onblur="onblurPesel()"/>
            <div class="invalid-feedback">
                <span id="errorPesel" class="hide">You need to provide Pesel</span>
                <span id="errorPesel2" class="hide">Wrong Pesel format, required 11 nubmers</span>
            </div>

            <label for="contactCity">City</label> <input name="miasto" type="text" id="contactCity" class="form-control" onblur="onblurCity()"/>
            <div class="invalid-feedback">
                <span id="errorCity" class="hide">You need to provide your city name</span>
            </div>

            <label for="contactAdress">Adress</label> <input name="adres" type="text" id="contactAdress" class="form-control" onblur="onblurAdress()"/>
            <div class="invalid-feedback">
                <span id="errorAdress" class="hide">You need to provide your city name</span>
            </div>
            <input type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body mt-3" value="SEND" name="submit" onclick="checkForm()">
        </fieldset>
    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>