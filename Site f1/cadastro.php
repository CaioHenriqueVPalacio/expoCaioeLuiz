<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // senha criptografada
    $cpf   = $_POST['cpf'];

    $sql = "INSERT INTO usuarios (nome, email, senha, cpf) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nome, $email, $senha, $cpf);

    if ($stmt->execute()) {
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Erro no cadastro: " . $stmt->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro - Fórmula 1</title>
  <style>
    body { font-family: Arial, sans-serif; background:#121212; color:#fff;
           display:flex; justify-content:center; align-items:center; height:100vh; margin:0; }
    .container { background:#1e1e1e; padding:30px; border-radius:10px; width:350px; text-align:center; }
    h1 { color:#e10600; }
    input,button { width:100%; padding:10px; margin:8px 0; border:none; border-radius:5px; }
    button { background:#e10600; color:#fff; cursor:pointer; }
    button:hover { background:#b00500; }
    a { color:#e10600; text-decoration:none; font-size:14px; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Cadastro</h1>
    <form method="POST" action="">
      <input type="text" name="nome" placeholder="Nome completo" required>
      <input type="email" name="email" placeholder="E-mail" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <input type="text" name="cpf" placeholder="CPF" required>
      <button type="submit">Cadastrar</button>
    </form>
    <p>Já tem conta? <a href="login.php">Faça login</a></p>
    <p><a href="index.html">← Voltar ao início</a></p>
  </div>
</body>
</html>
