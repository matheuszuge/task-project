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
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/index.js"></script>
  <script src="./assets/js/addTask.js"></script>
  <script src="./assets/js/deleteTask.js"></script>
  <script src="./assets/js/updateTask.js"></script>
  <title>Task project</title>

<body>
  <header>
    <section class="navigation-menu py-5 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand text-primary" href="#">Task project</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                  <li class="nav-item">
                    <a href="#home" class="nav-link">Home</a>
                  </li>
                  <li class="nav-item">
                    <a href="#how-to-use" class="nav-link">Como usar</a>
                  </li>
                  <li class="nav-item">
                    <a href="#task-project" class="nav-link">Gerencie Suas Tasks</a>
                  </li>
                  <li class="nav-item">
                    <a href="#contact" class="nav-link">Contato</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
      <hr>
    </section>
  </header>




  <main class="bg-light">

    <section id="home" class="content home-section py-5 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h2 class="fw-bold mb-4">Sobre Nós</h2>
            <p class="text-muted mb-4">
              O <strong>Task project</strong> foi desenvolvido para revolucionar a forma como você e sua empresa gerenciam tarefas. Com uma abordagem inovadora, oferecemos ferramentas poderosas para aumentar a produtividade, simplificar processos e garantir que nada seja esquecido. Experimente uma nova era de organização e eficiência!
            </p>
            <a href="#task-project" class="btn btn-primary btn-lg start-now">
              <i class="fas fa-tasks me-2"></i> Comece Agora
            </a>
          </div>
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
            <h2 class="fw-bold mb-4">Como Usar o Task project</h2>
            <p class="lead mb-5">
              Aprenda a utilizar o Task project de forma eficiente para gerenciar suas tarefas e aumentar sua produtividade.
            </p>
          </div>
        </div>
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
      </div>
    </section>

    <section id="task-project" class="content task-project-section py-5 bg-white">
      <div class="container">
        <div class="row">
          <div class="col-12 text-end mb-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTaskModal">
              <i class="fas fa-plus"></i> Adicionar Nova Tarefa
            </button>
          </div>
          <div class="col-12">
            <h2 class="fw-bold mb-4">Lista de Tarefas</h2>
            <div class="d-none d-md-block">
              <table id="dataTable" class="table table-striped table-bordered w-100" style="width:100%">
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
                  <?php if (!empty($tasks)): ?>
                    <?php foreach ($tasks as $task):


                    ?>

                      <tr>
                        <td class="text-center">
                          <?php
                          $dotColor = match ($task['status']) {
                            'pendente' => 'background-color: #ffc107;',
                            'em andamento' => 'background-color: #0dcaf0;',
                            'em atraso' => 'background-color: #dc3545;',
                            default => 'background-color: #198754;',
                          };
                          ?>
                          <span class="dot" style="<?php echo $dotColor; ?>"></span>
                        </td>
                        <td class="text-center">
                          <select id="statusTask-<?php echo $task['id']; ?>" name="status" class="form-select">
                            <option value="pendente" <?php echo ($task['status'] == 'pendente') ? 'selected' : ''; ?>>Pendente</option>
                            <option value="concluido" <?php echo ($task['status'] == 'concluido') ? 'selected' : ''; ?>>Concluído</option>
                            <option value="em andamento" <?php echo ($task['status'] == 'em andamento') ? 'selected' : ''; ?>>Em Andamento</option>
                            <option value="em atraso" <?php echo ($task['status'] == 'em atraso') ? 'selected' : ''; ?>>Em Atraso</option>
                          </select>
                        </td>
                        <td class="text-center"><?php echo htmlspecialchars($task['title']); ?></td>
                        <td class="text-center"><?php echo htmlspecialchars($task['description']); ?></td>
                        <td class="text-center"><?php echo date('d/m/Y', strtotime($task['due_date'])); ?></td>
                        <td class="text-center"><?php echo date_format(date_create($task['due_time']), 'H:i'); ?></td>

                        <td class="text-center">
                          <div class="d-flex justify-content-center align-items-center">
                            <a href="#" data-id="<?php echo $task['id']; ?>" class="delete-task text-danger text-decoration-none mx-2">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="7" id="warning" class="text-center text-muted my-4">
                        <strong>Não há tarefas cadastradas.</strong>
                      </td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>

            <div class="d-block d-md-none">
              <div class="row" id="task-cards-container">
                <?php if (!empty($tasks)): ?>
                  <?php foreach ($tasks as $task): ?>
                    <div id="task-card-<?= $task['id'] ?>" class="col-12 col-sm-6 col-md-4 mb-4 task-card">
                      <div class="card">
                        <div class="card-header">
                          <span class="dot" id="mobile-<?= $task['id'] ?>" style="background-color: <?php
                                                                                                    echo match ($task['status']) {
                                                                                                      'pendente' => '#ffc107',
                                                                                                      'em andamento' => '#0dcaf0',
                                                                                                      'em atraso' => '#dc3545',
                                                                                                      default => '#198754',
                                                                                                    };
                                                                                                    ?>"></span>
                          <span class="ms-2"><?php echo htmlspecialchars($task['title']); ?></span>
                        </div>
                        <div class="card-body">
                          <p class="card-text"><?php echo htmlspecialchars($task['description']); ?></p>
                          <p class="card-text"><strong>Data de Entrega:</strong> <?php echo date('d/m/Y', strtotime($task['due_date'])); ?></p>
                          <p class="card-text"><strong>Hora de Entrega:</strong> <?php echo date_format(date_create($task['due_time']), 'H:i'); ?></p>
                        </div>
                        <div class="card-footer text-end">
                          <select id="statusTask-<?php echo $task['id']; ?>" name="status" class="form-select d-inline-block w-auto">
                            <option value="pendente" <?php echo ($task['status'] == 'pendente') ? 'selected' : ''; ?>>Pendente</option>
                            <option value="concluido" <?php echo ($task['status'] == 'concluida') ? 'selected' : ''; ?>>Concluído</option>
                            <option value="em andamento" <?php echo ($task['status'] == 'em andamento') ? 'selected' : ''; ?>>Em Andamento</option>
                            <option value="em atraso" <?php echo ($task['status'] == 'em atraso') ? 'selected' : ''; ?>>Em Atraso</option>
                          </select>
                          <a href="#" data-id="<?php echo $task['id']; ?>" class="delete-task text-danger text-decoration-none mx-2">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <div class="col-12">
                    <p class="text-center text-muted"><strong>Não há tarefas cadastradas.</strong></p>
                  </div>
                <?php endif; ?>
              </div>

              <!-- Controles de Paginação -->
              <div class="row mt-3">
                <div class="col-12 text-center">
                  <nav aria-label="Paginação de Tarefas">
                    <ul class="pagination justify-content-center" id="pagination">
                      <li class="page-item">
                        <a class="page-link" href="#" id="prev-page">Anterior</a>
                      </li>
                      <!-- Os números de página serão inseridos aqui via JavaScript -->
                      <li class="page-item">
                        <a class="page-link" href="#" id="next-page">Próxima</a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
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

  <footer class="bg-dark text-white text-center py-4">
    <section class="container">
      <p class="mb-0">&copy; 2025 Desenvolvido por <a href="https://www.linkedin.com/in/matheusrobertozuge-6b6ab1182/">Matheus Roberto Züge</a>.</p>
    </section>
  </footer>

</body>

</html>