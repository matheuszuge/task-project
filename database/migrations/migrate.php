<?php
require_once __DIR__ . '/../../config/database.php';


$sql = "CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    due_date DATE NOT NULL,
    due_time TIME NOT NULL,
    status ENUM('pendente', 'concluido', 'em andamento', 'em atraso') DEFAULT 'pendente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if (mysqli_query($conn, $sql)) {
  echo "Migração executada com sucesso. Tabela 'tasks' criada ou já existente.";
} else {
  echo "Erro ao executar migração: " . mysqli_error($conn);
}

mysqli_close($conn);
