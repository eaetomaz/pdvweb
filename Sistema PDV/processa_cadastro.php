<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = 'localhost';
    $user = 'root';
    $password = 'masterkey';
    $dbname = 'pdv';
    
    $conn = new mysqli($servername, $user, $password, $dbname);
 
    
    if($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

$produto=$_POST["produto"];
$qtde=$_POST["qtde"];
$precocusto=$_POST["precocusto"];
$perclucro=$_POST["perclucro"];
$precovenda=$_POST["precovenda"];

$sql="INSERT INTO testoque (produto, qtde, precocusto, perclucro, precovenda) VALUES ('$produto', $qtde, $precocusto, $perclucro, $precovenda)";

if($conn->query($sql) === TRUE) {
    echo "Produto incluso com sucesso";
    header("Location: estoque.php");
    
} else {

    echo ("Erro na atualização: " . $conn->connect_error);
}

    echo ("Erro na inclusão");

}
?>   