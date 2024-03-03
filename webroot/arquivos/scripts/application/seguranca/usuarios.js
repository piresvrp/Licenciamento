new Vue({
	el: '#usuarios',
	data: {
		Usuario: {},
		mostrarAdd: false,
		listaUsuarios: [],
		errors: [],
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
		async insertUsuarios() {
			if (this.Usuario.Senha == '') {
				delete this.Usuario.Senha;
			}
			var resp = {};
			if (this.Usuario.ID) {
				resp = await vmGlobal.getController('Seguranca/Usuarios/update', this.Usuario);
			} else {
				delete this.Usuario.ID;
				resp = await vmGlobal.getController('Seguranca/Usuarios/insert', this.Usuario);
			}
			if (resp.status) {
				vmGlobal.showMessage(resp.result);
				this.mostrarAdd = false;
				this.getUsuarios();
			} else if (resp.result) {
				vmGlobal.showMessage(resp.result, 'error', 'Erro!');
			} else {
				vmGlobal.showMessage('Ocorreu um erro inesperado! Tente novamente.', 'error', 'Erro!');
			}
		},
		async Status(usuario) {
			var resp = await vmGlobal.getController('Seguranca/Usuarios/status', {ID : usuario});
			if (resp.status) {
				vmGlobal.showMessage(resp.result);
				this.getUsuarios();
			} else if (resp.result) {
				vmGlobal.showMessage(resp.result, 'error', 'Erro!');
			} else {
				vmGlobal.showMessage('Ocorreu um erro inesperado! Tente novamente.', 'error', 'Erro!');
			}
		},
		async checkFormUsuario() {
			this.errors = [];
			if (!this.Usuario.Perfil) {
				this.errors.push('Perfil é obrigatório.');
			}
			if (!this.Usuario.Nome) {
				this.errors.push('Nome é obrigatório.');
			}
			if (!this.Usuario.Email) {
				this.errors.push('E-mail é obrigatório.');
			} else {
				this.Usuario.Email = this.Usuario.Email.trim();
				if (!vmGlobal.validarEmail(this.Usuario.Email)) {
					this.errors.push('E-mail inválido.');
				}
				$mailDomain = this.Usuario.Email.split('@')[1];
				if ($mailDomain != 'dnit.gov.br') {
					this.errors.push('E-mail DEVE ser "@dnit.gov.br".');
				}
			}
			if (!this.Usuario.ID && !this.Usuario.Senha) {
				this.errors.push('Senha é obrigatória.');
			}
			if (this.Usuario.Senha && this.Usuario.Senha.length < 6) {
				this.errors.push('Senha deve ter no mínimo 6 dígitos.');
			}
			if (this.errors.length == 0) {
				await this.insertUsuarios();
			}
		},
	}
});