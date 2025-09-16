<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "f1loja";

// Conectar ao banco
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// Receber os dados do formulário
$nome = $_POST['nome'];
$produto = $_POST['produto'];
$quantidade = $_POST['quantidade'];

// Inserir no banco
$sql = "INSERT INTO compras (nome, produto, quantidade) VALUES ('$nome', '$produto', $quantidade)";

if ($conn->query($sql) === TRUE) {
  echo "Compra registrada com sucesso!";
} else {
  echo "Erro ao salvar a compra: " . $conn->error;
}

$conn->close();
?>
