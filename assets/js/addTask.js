$(document).ready(function () {
	// Captura o evento de envio do formulário
	$('#add-task-form').on('submit', function (event) {
		event.preventDefault(); // Impede o envio tradicional do formulário

		// Coleta os dados do formulário
		const formData = {
			title: $('#titulo').val(),
			description: $('#description').val(),
			taskDate: $('#taskDate').val(),
			taskTime: $('#taskTime').val(),
			status: 'pendente', // Status padrão
		};

		// Envia os dados via AJAX
		$.ajax({
			url: 'tasks/add_task.php', // URL do script PHP que processa os dados
			method: 'POST', // Método HTTP
			data: formData, // Dados do formulário
			success: function (response) {
				// Converte a resposta JSON para um objeto JavaScript
				const data = JSON.parse(response);

				if (data.success) {
					// Exibe uma mensagem de sucesso
					alert(data.message);

					// Fecha o modal e remove o backdrop
					$('#addTaskModal').modal('hide');
					$('.modal-backdrop').remove();

					// Limpa o formulário
					$('#add-task-form')[0].reset();

					// Adiciona a nova tarefa à tabela dinamicamente
					const newRow = `
            <tr>
							<td class="text-center"><span class="dot" style="background-color: #ffc107;"></span></td>					
              <td class="text-center">
                <select id="statusTask-${data.id}" name="status" class="form-select" aria-label="Status da Tarefa">
                  <option value="pendente" selected>Pendente</option>
                  <option value="concluida">Concluída</option>
                  <option value="em Andamento">Em Andamento</option>
                </select>
              </td>
              <td class="text-center">${formData.title}</td>
              <td class="text-center">${formData.description}</td>
              <td class="text-center">${formData.taskDate}</td>
              <td class="text-center">${formData.taskTime}</td>
              <td class="text-center">
                <div class="d-flex justify-content-center align-items-center">
                  <a href="#" class="text-primary text-decoration-none mx-2">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <a href="#" data-id="${data.id}" class="delete-task text-danger text-decoration-none mx-2">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                </div>
              </td>
            </tr>
          `;

					// Adiciona a nova linha à tabela
					$('#tasks-table tbody').append(newRow);

					setTimeout(function () {
						// Reverte o overflow para "auto", permitindo rolar a página novamente
						$('body').css('overflow', 'auto');
					}, 500); // Ajuste o tempo se necessário
				} else {
					alert(data.message); // Exibe uma mensagem de erro
				}
			},
			error: function (xhr, status, error) {
				// Exibe uma mensagem de erro
				alert('Erro ao adicionar tarefa: ' + error);
				console.error(xhr.responseText); // Exibe o erro no console
			},
		});
	});
});
