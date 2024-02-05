<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponto de Venda</title>
    <!-- Inclua o jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    <?php
        include 'menu.html';
    ?>

    <form id="formPesquisa">
        <input type="text" id="termoPesquisa" placeholder="DIGITE SUA BUSCA">
        <input type="button" value="Pesquisar" onclick="realizarPesquisa()">
    </form>

    <div id="resultados"></div>

    <script>
        function realizarPesquisa() {
            // Obtenha o termo de pesquisa
            var termoPesquisa = $('#termoPesquisa').val();

            // Use AJAX para enviar o termo de pesquisa para o script de processamento
            $.ajax({
                type: 'POST',
                url: 'processa_pesquisa.php',
                data: { termo_pesquisa: termoPesquisa },
                success: function(resultados) {
                    // Exiba os resultados abaixo do input
                    $('#resultados').html(resultados);
                }
            });
        }
    </script>
</body>
</html>
