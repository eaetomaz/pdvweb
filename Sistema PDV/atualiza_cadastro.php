<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {

$servername = 'localhost';
$user = 'root';
$password = 'masterkey';
$dbname = 'pdv';

$conn = new mysqli($servername, $user, $password, $dbname);

if($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM testoque WHERE id = $id"; 

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

    echo '<form action="processa_atualizacao.php" method="post">
    <input type="hidden" name="id" value="'.$row["id"].'">
    Produto: <input type="text" name="produto" value="'.$row["produto"].'"><br>
    Qtde: <input type="text" name="qtde" value="'.$row["qtde"].'"><br>
    Preço de custo: <input type="text" name="precocusto" value="'.$row["precocusto"].'"><br>
    Perc. lucro: <input type="text" name="perclucro" value="'.$row["perclucro"].'"><Br>
    Preço de venda: <input type="text" name="precovenda" value="'.$row["precovenda"].'"><br>
    <input type="submit" value="Atualizar">
  </form>';
  
} else {
    echo "Id do produto não foi encontrado";
}

$conn->close();
} else {
    echo "Id do produto não fornecido";
}

?>
    
</body>
</html>

