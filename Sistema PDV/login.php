<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form id='loginForm' method='POST' action='verificalogin.php'>
        <label for='loginUsername'>Usuário:</label>
        <input type='text' id='loginUsername' name='loginUsername' placeholder='Digite seu usuário...' required><br>
        <label for='loginPassword'>Senha</label>
        <input type='password' id='loginPassword' name='loginPassword' placeholder='Digite sua senha...' required><br>
        <input type='submit' value='Entrar'>
    </form>

</body>
</html>