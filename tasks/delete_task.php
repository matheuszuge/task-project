<?php
require_once __DIR__ . '/../config/database.php';

// Verifica se o ID da tarefa foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
  $id = intval($_POST['id']); // Converte o ID para um número inteiro

  // Verifica se o ID é válido
  if ($id <= 0) {
    echo "ID inválido!";
    exit;
  }

  // Query para excluir a tarefa
  $query = "DELETE FROM tasks WHERE id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $id);

  // Executa a query de exclusão
  if ($stmt->execute()) {
    echo "Tarefa excluída com sucesso!";
  } else {
    echo "Erro ao excluir a tarefa: " . $stmt->error;
  }

  $stmt->close();
} else {
  // Se o ID não foi enviado corretamente
  echo "Dados não recebidos corretamente!";
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
