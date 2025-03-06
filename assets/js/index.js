document.addEventListener('DOMContentLoaded', function () {
	const navLinks = document.querySelectorAll('.nav-link');
	const mainContainer = document.querySelector('main');

	const sections = {
		home: document.getElementById('home'),
		'how-to-use': document.getElementById('how-to-use'),
		'task-manager': document.getElementById('task-manager'),
		contact: document.getElementById('contact'),
	};

	// Garante que apenas a seção "Home" seja visível inicialmente
	Object.values(sections).forEach((section) => {
		if (section.id !== 'home') {
			mainContainer.removeChild(section);
		}
	});

	// Adiciona um evento de clique para cada link do menu
	navLinks.forEach((link) => {
		link.addEventListener('click', function (event) {
			event.preventDefault();

			// Remove a classe "active" de todos os links
			navLinks.forEach((link) => link.classList.remove('active'));

			// Adiciona a classe "active" ao link clicado
			this.classList.add('active');

			// Obtém o ID da seção correspondente a partir do ID do link
			const linkId = this.id;
			const sectionId = linkId.replace('-link', '');

			// Remove todas as seções do DOM
			Object.values(sections).forEach((section) => {
				if (mainContainer.contains(section)) {
					mainContainer.removeChild(section);
				}
			});

			// Adiciona a seção correspondente de volta ao DOM
			const targetSection = sections[sectionId];
			if (targetSection) {
				mainContainer.appendChild(targetSection);
			}
		});
	});

	$('#tasks-table').DataTable({
		language: {
			url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json', // Tradução para português
		},
	});
});
