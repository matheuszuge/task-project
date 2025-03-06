$(document).ready(function () {
	console.log('Script carregado!');

	// Delegação de eventos para capturar o clique no botão de exclusão
	$(document).on('click', '.delete-task', function () {
		// Obtém o ID da tarefa a partir do atributo data-id
		const taskId = $(this).data('id');

		// Confirmação antes de excluir
		if (confirm('Tem certeza que deseja excluir esta tarefa?')) {
			// Envia a requisição AJAX para o PHP
			$.ajax({
				url: 'tasks/delete_task.php', // Arquivo que processa a exclusão
				method: 'POST',
				data: {
					id: taskId, // ID da tarefa a ser excluída
				},
				success: function (response) {
					// Exibe a resposta do PHP (mensagem de sucesso ou erro)
					console.log(response);

					// Remove a linha da tabela dinamicamente
					$(`a[data-id="${taskId}"]`).closest('tr').remove();
				},
				error: function (xhr, status, error) {
					alert('Erro ao excluir a tarefa');
				},
			});
		}
	});
});
