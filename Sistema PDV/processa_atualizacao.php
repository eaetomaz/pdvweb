<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername='localhost';
    $username='root';
    $password='masterkey';
    $dbname='pdv';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

$id = $_POST['id'];
$produto = $_POST['produto'];
$qtde = $_POST['qtde'];
$precocusto = $_POST['precocusto'];
$perclucro = $_POST['perclucro'];
$precovenda = $_POST['precovenda'];

$sql="update testoque set produto='$produto', qtde='$qtde', precocusto='$precocusto', perclucro='$perclucro', precovenda='$precovenda' where id='$id'";

    if($conn->query($sql) === TRUE) {
        echo "Dados atualizados com sucesso";
        header('location: estoque.php');

    } else {
        echo "Erro na atualização: " . $conn->connect_error;
    }

$conn->close();

} else {
    echo "Método incorreto no envio dos dados!";

}
?>
