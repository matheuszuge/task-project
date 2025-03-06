$(document).ready(function () {
	console.log('Script carregado!');

	// Captura o valor antigo quando o select ganha foco
	$(document).on('focus', 'select[id^="statusTask-"]', function () {
		const oldStatus = $(this).val(); // Obtém o valor atual (status antigo)
		$(this).data('old-status', oldStatus); // Armazena o valor antigo em um atributo data
	});

	// Delegação de eventos para capturar o change em qualquer select com ID que começa com "statusTask-"
	$(document).on('change', 'select[id^="statusTask-"]', function () {
		console.log('Evento change capturado!');

		// Obtém o status antigo armazenado no atributo data
		const oldStatus = $(this).data('old-status');

		if (oldStatus != 'em atraso') {
			// Obtém o ID da tarefa a partir do ID do select
			const taskId = $(this).attr('id').split('-')[1]; // Extrai o ID da tarefa (ex: "statusTask-1" -> "1")

			// Obtém o novo status selecionado
			const newStatus = $(this).val();

			// Envia a requisição AJAX para o PHP
			$.ajax({
				url: 'tasks/update_task.php', // O arquivo que processa a atualização
				method: 'POST',
				data: {
					id: taskId, // ID da tarefa
					status: newStatus, // Novo status selecionado
				},
				success: function (response) {
					// Exibe a resposta do PHP (mensagem de sucesso ou erro)
					alert(response);

					// Atualiza a cor da bolinha dinamicamente
					const dotElement = $(`#statusTask-${taskId}`)
						.closest('tr')
						.find('.dot');
					if (newStatus == 'pendente') {
						dotElement.css('background-color', '#ffc107'); // Amarelo
					} else if (newStatus == 'em andamento') {
						dotElement.css('background-color', '#0dcaf0'); // Azul claro
					} else if (newStatus == 'em atraso') {
						dotElement.css('background-color', '#dc3545'); // Vermelho
					} else if (newStatus == 'concluido') {
						dotElement.css('background-color', '#198754'); // Verde
					}
				},
				error: function (xhr, status, error) {
					alert('Erro ao atualizar a tarefa');
				},
			});
		} else {
			// Impede a alteração e define o valor de volta para "em atraso"
			$(this).val('em atraso');
			alert('Para alterar o status, altere a data.');
		}
	});
});
