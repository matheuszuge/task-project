<?php
require_once __DIR__ . '/../config/database.php';

// Query para buscar todas as tarefas
$query = "SELECT * FROM tasks";
$result = mysqli_query($conn, $query);

// Verifica se há resultados
if (mysqli_num_rows($result) > 0) {
  // Armazenar as tarefas em um array associativo
  $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $current_date = date('Y-m-d');
  $current_time = date('H:i:s');

  foreach ($tasks as $task) {



    // Comparação das datas, já no formato brasileiro
    if ($task['due_date'] < $current_date || ($task['due_date'] == $current_date && $task['due_time'] < $current_time)) {
      // Atualiza o status no banco de dados
      $updateQuery = "UPDATE tasks SET status = 'em atraso' WHERE id = ?";
      $stmt = $conn->prepare($updateQuery);
      $stmt->bind_param("i", $task['id']);
      $stmt->execute();
      $stmt->close();
    }
  }
} else {
  $tasks = []; // Se não houver tarefas, define um array vazio
}
