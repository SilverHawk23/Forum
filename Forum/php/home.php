<?php


print_r(PDO::getAvailableDrivers());


$dbhost = "localhost";
$database = "test";
$user = "Sylvianne";
$wachtwoord = "Kaask0ekje";




try {
    $conn = new PDO("mysql:host=$dbhost;dbname=$database", $user, $wachtwoord);
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo"<br>verbinding gemaakt!<br>";

}
catch (PDOException $e){
    $message = $e ->getMessage();
    echo $message;
}

//$query = "INSERT INTO testusers (user, wachtwoord) VALUES (?,?)";
//$insert = $conn -> prepare($query);
//$data = array("Sylvianne", "Kaask0ekje");
//

//try{$insert -> execute($data);
//    echo"Gebruiker aangemaakt";
//}
//
//catch (PDOException $e){
//    echo $e ->getMessage();
//    echo "Gebruiker niet aangemaakt";
//}


$query = "SELECT * FROM testusers WHERE user = ?";
$select = $conn -> prepare($query);
$data = array("Sylvianne");
$select -> execute($data);
$select -> setFetchMode(PDO::FETCH_ASSOC);
var_dump($select);
?>