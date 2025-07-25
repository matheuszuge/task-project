<?php
require_once __DIR__ . '/../config/database.php';

$query = "SELECT * FROM tasks";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $current_date = date('Y-m-d');
  $current_time = date('H:i:s');

  foreach ($tasks as $task) {

    if ($task['due_date'] < $current_date || ($task['due_date'] == $current_date && $task['due_time'] < $current_time)) {
      $updateQuery = "UPDATE tasks SET status = 'em atraso' WHERE id = ?";
      $stmt = $conn->prepare($updateQuery);
      $stmt->bind_param("i", $task['id']);
      $stmt->execute();
      $stmt->close();
    }
  }
} else {
  $tasks = [];
}
