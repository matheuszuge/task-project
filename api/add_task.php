<?php
require_once __DIR__ . '/../config/database.php';

date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $titulo = mysqli_real_escape_string($conn, $_POST['title']);
  $descricao = mysqli_real_escape_string($conn, $_POST['description']);
  $taskDate = mysqli_real_escape_string($conn, $_POST['taskDate']);
  $taskTime = mysqli_real_escape_string($conn, $_POST['taskTime']);
  $status = 'pendente';
  $created_at = date('Y-m-d H:i:s');

  $sql = "INSERT INTO tasks (title, description, due_date, due_time, status, created_at) 
            VALUES ('$titulo', '$descricao', '$taskDate', '$taskTime', '$status', '$created_at')";

  if (mysqli_query($conn, $sql)) {
    $taskId = mysqli_insert_id($conn);

    echo json_encode([
      'success' => true,
      'message' => 'Tarefa adicionada com sucesso!',
      'id' => $taskId,
    ]);
  } else {
    echo json_encode([
      'success' => false,
      'message' => 'Erro ao adicionar a tarefa: ' . mysqli_error($conn),
    ]);
  }

  mysqli_close($conn);
} else {
  echo json_encode([
    'success' => false,
    'message' => 'Método inválido!',
  ]);
}
