<?php
$servername = "localhost";
$username = "workshop2";
$password = "coderslab";
$baseName = "workshop2";
// Tworzymy nowe połączenie
$conn = new mysqli($servername, $username, $password,
$baseName);
// Sprawdzamy czy połączcenie się udało
if ($conn->connect_error) {
die("Polaczenie nieudane. Blad: " . $conn->connect_error);
}
echo "Polaczenie udane.";
var_dump($conn);
//Niszczymy połączenie
//$conn->close();
var_dump($conn);
$pass = '098765qq';
$options=['cost'=>10,'salt'=>mcrypt_create_iv(22,MCRYPT_DEV_URANDOM),];
$hashedPas= password_hash($pass,PASSWORD_BCRYPT,$options);
echo "Hashed pass".$hashedPas;
$hashedPas = mysqli_escape_string("$2y$10$IYEOo8JrhEV2EIoG1uiW9.r4c29YGjD9Ddav/fWRybWpKb47oUfSm");
echo "Eksperyment". $hashedPas;

if (password_verify("098765qq", $hashedPas)) {
        echo " Password is correct";
}else echo "Wrong password";

echo "<hr>";
echo mysqli_real_escape_string($conn, 'pawel.pl\'usa@op.pl')
        ?>