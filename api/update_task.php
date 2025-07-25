<?php
require_once __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['status'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  if ($id <= 0) {
    echo "ID inválido!";
    exit;
  }
  $query = "UPDATE tasks SET status = '$status' WHERE id = $id";
  if (mysqli_query($conn, $query)) {
    echo "Tarefa atualizada com sucesso!";
  } else {
    echo "Erro ao atualizar a tarefa: " . mysqli_error($conn);
  }
} else {
  echo "Dados não recebidos corretamente!";
}

mysqli_close($conn);
