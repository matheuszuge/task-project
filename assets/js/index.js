let dataTableInstance = null;
document.addEventListener('DOMContentLoaded', function () {
	const cardsPerPage = 5; // Número de cards por página
	const taskCards = document.querySelectorAll('.task-card');
	const totalPages = Math.ceil(taskCards.length / cardsPerPage);
	const maxVisiblePages = 5; // Número máximo de páginas visíveis
	let currentPage = 1;

	// Função para mostrar os cards da página atual
	function showPage(page) {
		const start = (page - 1) * cardsPerPage;
		const end = start + cardsPerPage;

		taskCards.forEach((card, index) => {
			if (index >= start && index < end) {
				card.style.display = 'block';
			} else {
				card.style.display = 'none';
			}
		});
	}

	// Função para atualizar os controles de paginação
	function updatePagination() {
		const pagination = document.getElementById('pagination');
		pagination.innerHTML = ''; // Limpa os números de página existentes

		// Botão "Anterior"
		const prevButton = `<li class="page-item ${
			currentPage === 1 ? 'disabled' : ''
		}">
															<a class="page-link" href="#" id="prev-page">Anterior</a>
													</li>`;
		pagination.innerHTML += prevButton;

		// Reticências no início (se necessário)
		if (currentPage > Math.ceil(maxVisiblePages / 2)) {
			pagination.innerHTML += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
		}

		// Números de página
		let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
		let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

		for (let i = startPage; i <= endPage; i++) {
			const pageItem = `<li class="page-item ${
				i === currentPage ? 'active' : ''
			}">
																<a class="page-link" href="#" data-page="${i}">${i}</a>
														</li>`;
			pagination.innerHTML += pageItem;
		}

		// Reticências no final (se necessário)
		if (endPage < totalPages) {
			pagination.innerHTML += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
		}

		// Botão "Próximo"
		const nextButton = `<li class="page-item ${
			currentPage === totalPages ? 'disabled' : ''
		}">
															<a class="page-link" href="#" id="next-page">Próxima</a>
													</li>`;
		pagination.innerHTML += nextButton;

		// Adiciona eventos de clique aos números de página
		document.querySelectorAll('.page-link[data-page]').forEach((link) => {
			link.addEventListener('click', function (e) {
				e.preventDefault();
				currentPage = parseInt(this.getAttribute('data-page'));
				showPage(currentPage);
				updatePagination();
			});
		});
	}

	// Evento para a página anterior
	document.getElementById('pagination').addEventListener('click', function (e) {
		if (e.target.id === 'prev-page') {
			e.preventDefault();
			if (currentPage > 1) {
				currentPage--;
				showPage(currentPage);
				updatePagination();
			}
		}
	});

	// Evento para a próxima página
	document.getElementById('pagination').addEventListener('click', function (e) {
		if (e.target.id === 'next-page') {
			e.preventDefault();
			if (currentPage < totalPages) {
				currentPage++;
				showPage(currentPage);
				updatePagination();
			}
		}
	});

	// Inicialização
	showPage(currentPage);
	updatePagination();

	// Desativa avisos
	dataTableInstance = $('#dataTable').DataTable({
		language: {
			url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json',
		},
	});

	const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

	navLinks.forEach((link) => {
		link.addEventListener('click', function (e) {
			e.preventDefault();

			const targetId = this.getAttribute('href').substring(1);
			const targetSection = document.getElementById(targetId);

			targetSection.scrollIntoView({
				behavior: 'smooth',
			});
		});
	});

	const startNow = document.querySelector('.start-now');

	startNow.addEventListener('click', function (e) {
		e.preventDefault();

		const targetId = this.getAttribute('href').substring(1);
		const targetSection = document.getElementById(targetId);

		targetSection.scrollIntoView({
			behavior: 'smooth',
		});
	});

	const today = new Date().toISOString().split('T')[0];
	const taskdate = document.getElementById('taskDate');

	taskdate.setAttribute('min', today);

	taskdate.addEventListener('change', function () {
		const selectedDate = taskdate.value;

		if (selectedDate === today) {
			const now = new Date();
			const hours = String(now.getHours()).padStart(2, '0');
			const minutes = String(now.getMinutes()).padStart(2, '0');
			const currentTime = hours + ':' + minutes;
			document.getElementById('taskTime').setAttribute('min', currentTime);
		} else if (selectedDate > today) {
			document.getElementById('taskTime').removeAttribute('min');
		}
	});
});
