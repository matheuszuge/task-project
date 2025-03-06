<?php
require_once __DIR__ . '/../../config/database.php';


// Criar a tabela "tasks" se não existir
$sql = "CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    due_date DATE NOT NULL,
    due_time TIME NOT NULL,
    status ENUM('pendente', 'concluida', 'em andamento', 'em atraso') DEFAULT 'pendente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

// Executa a query
if (mysqli_query($conn, $sql)) {
  echo "Migração executada com sucesso. Tabela 'tasks' criada ou já existente.";
} else {
  echo "Erro ao executar migração: " . mysqli_error($conn);
}

// Fecha a conexão
mysqli_close($conn);
