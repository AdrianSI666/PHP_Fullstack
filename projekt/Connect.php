<?php

    Class Connect{
        private $host;
        private $user;
        private $password;
        private $dbname;
        private $pdo;
        public function __construct(){
            $this->host = 'localhost';
            $this->user = 'root';
            $this->password = '';
            $this->dbname = 'projekt_php';
            try {
                $dsn = 'mysql:host=' . $this->host . '; dbname=' . $this->dbname;
                $this->pdo = new PDO($dsn, $this->user, $this->password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->pdo;
            } catch (Exception $error) {
                echo "error: " . $error;
            }
        }
        public function start()
        {
            try {
                return $this->pdo;
            } catch (Exception $error) {
                echo "error: " . $error;
            }
        }
        public function addUser($email,$haslo,$imie,$nazwisko,$data_ur,$pesel,$miasto,$adres){

            $sql= 'insert into konto(email,haslo,imie,nazwisko,data_ur,pesel,miasto,adres)values (?,?,?,?,?,?,?,?)';
            //values (select CAST($email as varchar(30)),select CAST($haslo as varchar(40)),select CAST($imie as varchar(30)),select cast($nazwisko as varchar(30)),select cast($data_ur as date),select cast($pesel as int(11)),select cast($miasto as varchar(20)),select cast($adres as varchar(50)));
            $haslo = md5($haslo);//encrypt the password before saving in the database
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute([$email,$haslo,$imie,$nazwisko,$data_ur,$pesel,$miasto,$adres]);
            session_start();
            $_SESSION['added']="yes";

            header("Location: loging.php");
        }
        public function loggin($mail,$passw){
            $sql = "SELECT id,email,haslo FROM konto WHERE email = ? and haslo= ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$mail,md5($passw)]);
            return $stmt;
        }
        public function match($mail){
            $sql = "SELECT email FROM konto WHERE email = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$mail]);
            return $stmt;
        }
        public function getName($mail){
            $sql = "SELECT imie FROM konto WHERE email = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$mail]);
            return $stmt;
        }
        public function loggina($mail,$passw){
            $sql = "SELECT login,password FROM admin WHERE login = ? and password= ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$mail,$passw]);
            return $stmt;
        }
        public function getCountLekarze(){
            $sql = "SELECT count(*) as licz_lekarzy FROM lekarz";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function getCountPacjenci(){
            $sql = "SELECT count(*) as licz_pacjentow FROM konto";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function getPacjenci(){
            $sql = "SELECT * FROM konto";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function deletePacjent($id){
            $sql= 'delete from konto where id=?';
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute([$id]);
            session_start();
            $_SESSION['deleted']="yes";
            header("Location: uadmin.php");
        }
        public function getCountWizOcz(){
            $sql = "SELECT count(*) as licz_wiz FROM wizyta_oczekujaca";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function getLekarze(){
            $sql = "SELECT * FROM lekarz";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function getLekarzeSpec($spec){
            $sql = "SELECT * FROM lekarz where specjalizacja = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$spec]);
            return $stmt;
        }
        public function addLekarz($imie,$nazwisko,$specjalizaca,$telefon,$gabinet){
            $sql= 'insert into lekarz(imie,nazwisko,specjalizacja,telefon,gabinet)values (?,?,?,?,?)';
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute([$imie,$nazwisko,$specjalizaca,$telefon,$gabinet]);
            session_start();
            $_SESSION['addedd']="yes";

            header("Location: ladmin.php");
        }
        public function deleteLekarz($id){
            $sql= 'delete from lekarz where id=?';
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute([$id]);
            session_start();
            $_SESSION['deleted']="yes";

            header("Location: ladmin.php");
        }
        public function getWizytyOcz(){
            $sql = "SELECT wizyta_oczekujaca.id as wizyta_id, pacjent_id,specjalizacja,dolegliwosc,konto.id,konto.email,konto.imie,konto.nazwisko,konto.data_ur,konto.pesel,konto.miasto,konto.adres FROM wizyta_oczekujaca join konto on pacjent_id=konto.id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function deleteWizytyOcz($id){
            $sql= 'delete from wizyta_oczekujaca where id=?';
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute([$id]);
            session_start();
            $_SESSION['deleted']="yes";
            header("Location: radmin.php");
        }
        public function addWizytyOcz($pacjent_id,$lekarz_id,$data_wizyty,$godzina_wizyty,$id_wiz){
            $sql= 'insert into wizyty_przyszle(pacjent_id,lekarz_id,date,hour)values (?,?,?,?)';
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute([$pacjent_id,$lekarz_id,$data_wizyty,$godzina_wizyty]);
            $sql= 'delete from wizyta_oczekujaca where id=?';
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute([$id_wiz]);
            $_SESSION['addedd']="yes";
            header("Location: wadmin.php");
        }
        public function getPacjent($id){
            $sql = "SELECT konto.id as id,pesel,imie,nazwisko FROM konto join wizyta_oczekujaca on pacjent_id=konto.id WHERE pacjent_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $stmt;
        }
        public function getWizytyPrzysz(){
            $sql = "SELECT wizyty_przyszle.id as wizyta_id,date,hour,lekarz.imie as l_imie,lekarz.nazwisko as l_nazwisko,specjalizacja,gabinet,konto.imie as p_imie,konto.nazwisko as p_nazwisko,konto.pesel,konto.miasto FROM wizyty_przyszle join konto on konto.id=pacjent_id join lekarz on lekarz.id=lekarz_id WHERE current_date<=date order by date,hour asc;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function getWizytyPrzeszle(){
            $sql = "SELECT wizyty_przyszle.id as wizyta_id,date,hour,lekarz.imie as l_imie,lekarz.nazwisko as l_nazwisko,specjalizacja,gabinet,konto.imie as p_imie,konto.nazwisko as p_nazwisko,konto.pesel,konto.miasto FROM wizyty_przyszle join konto on konto.id=pacjent_id join lekarz on lekarz.id=lekarz_id WHERE current_date>date order by date,hour desc;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function deleteWizytyPrzyszle($id){
            $sql= 'delete from wizyty_przyszle where id=?';
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute([$id]);
            session_start();
            $_SESSION['deleted']="yes";
            header("Location: wadmin.php");
        }
        public function getWizytyPrzyszPacj($id){
            $sql = "SELECT wizyty_przyszle.id as wizyta_id,date,hour,lekarz.imie as l_imie,lekarz.nazwisko as l_nazwisko,specjalizacja,gabinet FROM wizyty_przyszle join konto on konto.id=pacjent_id join lekarz on lekarz.id=lekarz_id WHERE current_date<=date AND pacjent_id=? order by date,hour asc;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $stmt;
        }
        public function getWizytyPrzeszPacj($id){
            $sql = "SELECT wizyty_przyszle.id as wizyta_id,date,hour,lekarz.imie as l_imie,lekarz.nazwisko as l_nazwisko,specjalizacja,gabinet FROM wizyty_przyszle join konto on konto.id=pacjent_id join lekarz on lekarz.id=lekarz_id WHERE current_date>date AND pacjent_id=? order by date,hour asc;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $stmt;
        }
        public function getAllSpec(){
            $sql = "SELECT specjalizacja FROM lekarz";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
        public function addWizytaOcz($id,$specjalizacja,$dolegliwosc){
            $sql= 'insert into wizyta_oczekujaca(pacjent_id,specjalizacja,dolegliwosc) values (?,?,?)';
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute([$id,$specjalizacja,$dolegliwosc]);
            $_SESSION['addedd']="yes";
            header("Location: uwizocz.php");
        }
        public function getWizytaOczPac($id){
            $sql = "SELECT wizyta_oczekujaca.id as wizyta_id, pacjent_id,specjalizacja,dolegliwosc FROM wizyta_oczekujaca where pacjent_id=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);
            return $stmt;
        }
        public function deleteWizytyOczPac($id){
            $sql= 'delete from wizyta_oczekujaca where id=?';
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute([$id]);
            session_start();
            $_SESSION['deleted']="yes";
            header("Location: uwizocz.php");
        }
        public function getLekarzeBySpec(){
            $sql = "SELECT specjalizacja FROM lekarz group by specjalizacja";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt;
        }
    }
?>
