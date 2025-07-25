<?php
require_once __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
  $id = intval($_POST['id']); // Converte o ID para um número inteiro

  if ($id <= 0) {
    echo "ID inválido!";
    exit;
  }

  $query = "DELETE FROM tasks WHERE id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    echo "Tarefa excluída com sucesso!";
  } else {
    echo "Erro ao excluir a tarefa: " . $stmt->error;
  }

  $stmt->close();
} else {
  echo "Dados não recebidos corretamente!";
}

mysqli_close($conn);
