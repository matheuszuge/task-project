$(document).ready(function () {
	console.log('Script carregado!');

	$(document).on('change', 'select[id^="statusTask-"]', function () {
		console.log('Evento change capturado!');

		const taskId = $(this).attr('id').split('-')[1];

		const newStatus = $(this).val();

		$.ajax({
			url: 'tasks/update_task.php',
			method: 'POST',
			data: {
				id: taskId,
				status: newStatus,
			},
			success: function (response) {
				alert(response);

				// Verifica se é mobile ou desktop
				let dotElement;

				//configura o dot para ficar no mobile ou no
				if ($(window).width() <= 768) {
					dotElement = $(`#mobile-${taskId}`);
				} else {
					dotElement = $(`#statusTask-${taskId}`).closest('tr').find('.dot');
				}

				if (newStatus == 'pendente') {
					dotElement.css('background-color', '#ffc107');
				} else if (newStatus == 'em andamento') {
					dotElement.css('background-color', '#0dcaf0');
				} else if (newStatus == 'em atraso') {
					dotElement.css('background-color', '#dc3545');
				} else if (newStatus == 'concluido') {
					dotElement.css('background-color', '#198754');
				}
			},
			error: function (xhr, status, error) {
				alert('Erro ao atualizar a tarefa');
			},
		});
	});
});
