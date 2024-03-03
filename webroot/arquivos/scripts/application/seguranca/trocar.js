new Vue({
	el: '#usuarios',
	data: {
		listaUsuarios: []
	},
	async mounted() {
		await this.getUsuarios();
	},
	methods: {
		async getUsuarios() {
			$("#listaUsuarios").DataTable().destroy();
			this.listaUsuarios = await vmGlobal.getController('Seguranca/Usuarios/lista');
			vmGlobal.montaDatatable('#listaUsuarios');
		},
		async Login(email) {
			var resp = await vmGlobal.getController('Seguranca/Usuarios/login', {Email : email});
			if (resp.status) {
				window.location.href = base_url;
			} else if (resp.result) {
				vmGlobal.showMessage(resp.result, 'error', 'Erro!');
				this.getUsuarios();
			} else {
				vmGlobal.showMessage('Ocorreu um erro inesperado! Tente novamente.', 'error', 'Erro!');
			}
		},
	}
});