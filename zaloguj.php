<?php

require_once "connect.php";
$polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);

if($polaczenie->connect_errno!=false)
{
    echo "Error:".$polaczenie->connect_errno."Opis: ". $polaczenie->connect_error;
}
else{
$login = $_POST['login'];
$haslo = $_POST['haslo'];

$sql = "SELECT * FROM uzytkownicy WHERE user='$login' AND pass='haslo'";
if($rezultat = @$polaczenie->query($sql))
{
    $ilu_userow=$rezultat->num_rows;


if($ilu_userow>0)
{
    $wiersz = $rezultat->fetch_assoc();
    $_SESSION['user'] = $wiersz['user'];
    $rezultat->free_result();
    header('Location: gra.php');

}else{

}
}

}

?>