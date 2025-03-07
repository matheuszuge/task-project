//Codigo para adicioanr uma nova tarefa
$(document).ready(function () {
	$('#add-task-form').on('submit', function (event) {
		event.preventDefault();

		const formData = {
			title: $('#titulo').val(),
			description: $('#description').val(),
			taskDate: $('#taskDate').val(),
			taskTime: $('#taskTime').val(),
			status: 'pendente',
		};

		//Inicia o AJAX envio para o tasks/add_task.php
		$.ajax({
			url: 'tasks/add_task.php',
			method: 'POST',
			data: formData,
			success: function (response) {
				const data = JSON.parse(response);

				if (data.success) {
					alert(data.message);

					//Remove o modal e o backdrop que estava atrapalhando o layout
					$('#addTaskModal').modal('hide');
					$('.modal-backdrop').remove();
					$('#add-task-form')[0].reset();

					// Adiciona a linha nova na tabela de tasks
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

					//Instancia o datatables para adicionar uma linha.
					if (
						typeof dataTableInstance !== 'undefined' &&
						dataTableInstance !== null
					) {
						dataTableInstance.row.add($(newRow)).draw();
					} else {
						$('#tasks-table tbody').append(newRow);
					}

					if (dataTableInstance) {
						dataTableInstance.destroy();
					}

					dataTableInstance = $('#dataTable').DataTable({
						language: {
							url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json',
						},
					});

					//adiciona um timeout no overflow.
					setTimeout(function () {
						$('body').css('overflow', 'auto');
					}, 500);
				} else {
					alert(data.message);
				}
			},
			error: function (xhr, status, error) {
				alert('Erro ao adicionar tarefa: ' + error);
				console.error(xhr.responseText);
			},
		});
	});
});
