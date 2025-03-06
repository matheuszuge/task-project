<?php require_once 'tasks/get_tasks.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <title>Task Manager</title>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
  </head>

<body>
  <!-- Header -->
  <header class="p-5 bg-primary text-white text-center">
    <section class="container">
      <h1 class="display-4">Task Manager</h1>
      <p class="lead">Gerencie Suas Tarefas de Forma Organizada.</p>
    </section>
  </header>

  <!-- Main Content -->
  <main class="bg-light">
    <section class="navigation-menu py-3 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <nav class="nav nav-pills justify-content-center">
              <a href="#" id="home-link" class="nav-link active m-4">Home</a>
              <a href="#" id="how-to-use-link" class="nav-link m-4">Como usar</a>
              <a href="#" id="task-manager-link" class="nav-link m-4">Gerencie Suas Tasks</a>
              <a href="#" id="contact-link" class="nav-link m-4">Contato</a>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <section id="home" class="content home-section py-5 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <!-- Coluna de Texto -->
          <div class="col-md-6">
            <h2 class="fw-bold mb-4">Sobre Nós</h2>
            <p class="text-muted mb-4">
              O <strong>Task Manager</strong> foi desenvolvido para revolucionar a forma como você e sua empresa gerenciam tarefas. Com uma abordagem inovadora, oferecemos ferramentas poderosas para aumentar a produtividade, simplificar processos e garantir que nada seja esquecido. Experimente uma nova era de organização e eficiência!
            </p>
            <a href="#task-manager" class="btn btn-primary btn-lg">
              <i class="fas fa-tasks me-2"></i> Comece Agora
            </a>
          </div>

          <!-- Coluna de Imagem -->
          <div class="col-md-6 text-center">
            <img src="assets/images/businessman.png" alt="Ilustração de Gerenciamento de Tarefas" class="img-fluid rounded">
          </div>
        </div>
      </div>
    </section>

    <section id="how-to-use" class="content how-to-use-section py-5 bg-white">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
            <h2 class="fw-bold mb-4">Como Usar o Task Manager</h2>
            <p class="lead mb-5">
              Aprenda a utilizar o Task Manager de forma eficiente para gerenciar suas tarefas e aumentar sua produtividade.
            </p>
          </div>
        </div>

        <!-- Passos para usar o sistema -->
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body text-center">
                <i class="bi bi-pencil-square display-4 text-primary mb-3"></i>
                <h4 class="card-title fw-bold">1. Crie uma Tarefa</h4>
                <p class="card-text">
                  No campo "Informe um título", adicione o nome da sua tarefa. Em seguida, descreva as demandas no campo "Informe suas demandas".
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body text-center">
                <i class="bi bi-calendar-check display-4 text-primary mb-3"></i>
                <h4 class="card-title fw-bold">2. Defina Prazos</h4>
                <p class="card-text">
                  Escolha a data e a hora de entrega para sua tarefa. Isso ajudará você a se organizar e cumprir prazos.
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body text-center">
                <i class="bi bi-check-circle display-4 text-primary mb-3"></i>
                <h4 class="card-title fw-bold">3. Acompanhe e Conclua</h4>
                <p class="card-text">
                  Acompanhe o progresso das suas tarefas e marque-as como concluídas quando finalizadas.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center mt-5">
          <div class="col-lg-6 text-center">
            <a href="#task-manager" class="btn btn-primary btn-lg">
              <i class="bi bi-play-circle"></i> Comece Agora
            </a>
          </div>
        </div>
      </div>
    </section>

    <section id="task-manager" class="content task-manager-section py-5 bg-white">
      <div class="container">
        <div class="row">
          <!-- Botão para abrir o modal de adição de tarefas -->
          <div class="col-12 text-end mb-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTaskModal">
              <i class="fas fa-plus"></i> Adicionar Nova Tarefa
            </button>
          </div>

          <!-- Tabela de Tarefas com DataTables -->
          <div class="col-12">
            <h2 class="fw-bold mb-4">Lista de Tarefas</h2>
            <?php if (!empty($tasks)): ?>
              <table id="tasks-table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th class="text-center"></th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Título</th>
                    <th class="text-center">Descrição</th>
                    <th class="text-center">Data de Entrega</th>
                    <th class="text-center">Hora de Entrega</th>
                    <th class="text-center">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($tasks as $task): ?>
                    <tr>
                      <td class="text-center">

                        <?php
                        // Define a cor da bolinha com base no status da tarefa
                        $dotColor = '';
                        if ($task['status'] == 'pendente') {
                          $dotColor = 'background-color: #ffc107;'; // Amarelo
                        } elseif ($task['status'] == 'em andamento') {
                          $dotColor = 'background-color: #0dcaf0;'; // Azul claro
                        } elseif ($task['status'] == 'em atraso') {
                          $dotColor = 'background-color: #dc3545;'; // Vermelho
                        } else {
                          $dotColor = 'background-color: #198754;'; // Verde
                        }
                        ?>
                        <!-- Bolinha colorida -->
                        <span class="dot" style="<?php echo $dotColor; ?>"></span>
                      </td>
                      <td class="text-center">
                        <select id="statusTask-<?php echo $task['id']; ?>" name="status" class="form-select" aria-label="Status da Tarefa">
                          <option value="pendente" <?php echo ($task['status'] == 'pendente') ? 'selected' : ''; ?>>Pendente</option>
                          <option value="concluido" <?php echo ($task['status'] == 'concluida') ? 'selected' : ''; ?>>Concluído</option>
                          <option value="em andamento" <?php echo ($task['status'] == 'em andamento') ? 'selected' : ''; ?>>Em Andamento</option>
                          <option value="em atraso" <?php echo ($task['status'] == 'em atraso') ? 'selected' : ''; ?>>Em Atraso</option>
                        </select>
                      </td>
                      <td class="text-center"><?php echo $task['title']; ?></td>
                      <td class="text-center"><?php echo $task['description']; ?></td>
                      <td class="text-center"><?php echo $task['due_date']; ?></td>
                      <td class="text-center"><?php echo $task['due_time']; ?></td>
                      <td class="text-center">
                        <div class="d-flex justify-content-center align-items-center">
                          <a href="#" class="text-primary text-decoration-none mx-2">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          <a href="#" data-id="<?php echo $task['id']; ?>" class="delete-task text-danger text-decoration-none mx-2">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p class="text-center text-muted my-4">
                    <strong>Não há tarefas cadastradas.</strong>
                  </p>
                <?php endif; ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addTaskModalLabel">Adicionar Nova Tarefa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="add-task-form">
              <div class="mb-3">
                <label for="titulo" class="form-label fw-bold">Título da Tarefa:</label>
                <input type="text" class="form-control" id="titulo" name="title" placeholder="Informe um título" required>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label fw-bold">Descrição:</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Informe suas demandas" required></textarea>
              </div>
              <div class="mb-3">
                <label for="task-date" class="form-label fw-bold">Data de Entrega:</label>
                <input type="date" class="form-control" id="taskDate" name="taskDate" required>
              </div>
              <div class="mb-3">
                <label for="task-time" class="form-label fw-bold">Hora de Entrega:</label>
                <input type="time" class="form-control" id="taskTime" name="taskTime" required>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Adicionar Tarefa</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <section id="contact" class="content contact-section bg-light py-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
            <h2 class="fw-bold mb-4">Entre em Contato</h2>
            <p class="lead mb-5">Tem alguma dúvida ou sugestão? Mande uma mensagem!</p>
            <!-- Links para Redes Sociais -->
            <div class="mt-5">
              <a href="https://www.linkedin.com/in/matheusrobertozuge-6b6ab1182/" target="_blank" class="btn btn-outline-primary btn-lg">
                <i class="bi bi-linkedin"></i> LinkedIn
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>


  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-4">
    <section class="container">
      <p class="mb-0">&copy; 2023 Desenvolvido por <a href="https://www.linkedin.com/in/matheusrobertozuge-6b6ab1182/">Matheus Roberto Züge</a>.</p>
    </section>
  </footer>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/index.js"></script>
  <script src="./assets/js/addTask.js"></script>
  <script src="./assets/js/deleteTask.js"></script>
  <script src="./assets/js/updateTask.js"></script>
</body>

</html>