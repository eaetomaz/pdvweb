<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
</head>
<body>

    <?php
        include 'menu.html'; 
        
    // Conexão com o banco de dados
        $servername='localhost';
        $username='root';
        $password='masterkey';
        $dbname='pdv';

        $conn = new mysqli($servername, $username, $password, $dbname);

         if($conn->connect_error) {
            echo ('Erro na conexão: ' . $conn->connect_error);
        }

        ?>
        <center><table>
            <tr>
                <td><a href='cadastro.php'>Incluir</a></td>
            </tr>

            <tr>
                    <td>Id</td>
                    <td>Produto</td>
                    <td>Qtde</td>
                    <td>Preço de custo</td>
                    <td>Perc. lucro</td>
                    <td>Preço de venda</td>
                    <td></td>
                    <td></td>
                </tr>

        </table></center>


        <?php

        $consulta='select * from testoque';
        $result=$conn->query($consulta);

        if($result->num_rows > 0) {
            echo "<center><table border=1>";

            while($row = $result->fetch_assoc()) {
                echo "
                    <tr>

                    <td>{$row["id"]}</td>
                    <td>{$row["produto"]}</td>
                    <td>{$row["qtde"]}</td>
                    <td>{$row["precocusto"]}</td>
                    <td>{$row["perclucro"]}</td>
                    <td>{$row["precovenda"]}</td>
                    <td><a href='atualiza_cadastro.php?id={$row["id"]}'>Atualizar</a></td>
                    <td><a href='excluir_cadastro.php?{$row["id"]}' onclick=\"return confirm(' Tem certeza que deseja excluir {$row["produto"]}?'); return false;\">
                    Excluir
                    </tr>
                ";

            }
            echo "</table></center>";
} else {
    echo "Nenhum produto encontrado";
}

    $conn->close();
    ?>

</body>
</html>