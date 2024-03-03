const vmMenus = new Vue({
	el: '#menus-acesso',
	data: {
		listaArea: [
			{
				ID: 1,
				Perfil: 1,
				Url: 'Seguranca',
				Area: 'Segurança',
				Icone: 'fas fa-user-circle'
			},
			{
				ID: 2,
				Perfil: 1,
				Url: 'Questionario',
				Area: 'Questionário',
				Icone: 'fas fa-file-contract'
			},
			{
				ID: 3,
				Perfil: 2,
				Url: 'Competencia',
				Area: 'Competência',
				Icone: 'fas fa-check-circle'
			},
		],
		listaMenu: [
			{
				Area: 1,
				Url: 'Usuarios',
				Menu: 'Manter Usuários'
			},
			{
				Area: 2,
				Url: 'Perguntas',
				Menu: 'Manter Perguntas'
			},
			{
				Area: 2,
				Url: 'Respostas',
				Menu: 'Consultar Respostas'
			},
			{
				Area: 3,
				Url: 'Questionario',
				Menu: 'Responder Questionário'
			},
		]
	},
	methods: {
		filtrarArea(ID) {
			return this.listaArea.filter(x => (x.Perfil == ID));
		},
		filtrarMenu(ID) {
			return this.listaMenu.filter(x => (x.Area == ID));
		}
	}
});