<?php

// Conexão com o banco de dados
$servername = 'localhost';
$username = 'root';
$password = 'masterkey';
$dbname = 'pdv';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Erro na conexão: ' . $conn->connect_error);
}

// Inicialize a variável de resultados
$resultados = '';

// Obtenha o termo de pesquisa do formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $termo_pesquisa = $_POST['termo_pesquisa'];

    // Consulta SQL com a cláusula WHERE para filtrar os resultados
    $consulta = "SELECT * FROM testoque WHERE id LIKE '%$termo_pesquisa%'";
    $result = $conn->query($consulta);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <td>Id</td>
                    <td>Produto</td>
                    <td>Qtde</td>
                    <td>Preço de custo</td>
                    <td>Perc. lucro</td>
                    <td>Preço de venda</td>
                </tr>";
    
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row["id"]}</td>
                    <td>{$row["produto"]}</td>
                    <td>{$row["qtde"]}</td>
                    <td>{$row["precocusto"]}</td>
                    <td>{$row["perclucro"]}</td>
                    <td>{$row["precovenda"]}</td>
                  </tr>";
        }
    
        echo "</table>";
    
    } else {
        $resultados = 'Nenhum resultado encontrado.';
    }
    
}

$conn->close();

// Retorne os resultados
echo $resultados;
?>
