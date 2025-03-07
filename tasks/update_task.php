<?php
require_once __DIR__ . '/../config/database.php';

// Verifica se os dados necessários foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['status'])) {

  // Obtém os dados enviados do formulário ou via AJAX
  $id = mysqli_real_escape_string($conn, $_POST['id']); // Protege contra injeção de SQL
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  // Verifica se o ID é válido
  if ($id <= 0) {
    echo "ID inválido!";
    exit;
  }
  // Query para atualizar o status da tarefa
  $query = "UPDATE tasks SET status = '$status' WHERE id = $id";

  // Executa a query de atualização
  if (mysqli_query($conn, $query)) {
    // Se a atualização for bem-sucedida
    echo "Tarefa atualizada com sucesso!";
  } else {
    // Caso ocorra algum erro
    echo "Erro ao atualizar a tarefa: " . mysqli_error($conn);
  }
} else {
  // Se os parâmetros não foram enviados corretamente
  echo "Dados não recebidos corretamente!";
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
