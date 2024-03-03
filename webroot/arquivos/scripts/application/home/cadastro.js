const vmUsuarios = new Vue({
	el: '#usuario',
	data: {
		Usuario: {},
		errors: [],
	},
	async mounted() {
	},
	methods: {
		async insertUsuarios() {
			var resp = await vmGlobal.getController('Login/insert', this.Usuario);
			if (resp.status) {
				Loading.show();
				window.location.href = base_url;
			} else if (resp.result) {
				vmGlobal.showMessage(resp.result, 'error', 'Erro!');
			} else {
				vmGlobal.showMessage('Ocorreu um erro inesperado! Tente novamente.', 'error', 'Erro!');
			}
		},
		async checkForm() {
			this.errors = [];
			if (!this.Usuario.Nome) {
				this.errors.push('Nome é obrigatório.');
			}
			if (!this.Usuario.Email) {
				this.errors.push('E-mail é obrigatório.');
			} else {
				this.Usuario.Email = this.Usuario.Email.trim();
				if (!vmGlobal.validarEmail(this.Usuario.Email)) {
					this.errors.push('E-mail inválido.');
				} else {
					$mailDomain = this.Usuario.Email.split('@')[1];
					if ($mailDomain != 'dnit.gov.br') {
						this.errors.push('E-mail DEVE ser "@dnit.gov.br".');
					}
				}
			}
			if (!this.Usuario.Senha) {
				this.errors.push('Senha é obrigatória.');
			} else if (this.Usuario.Senha.length < 6) {
				this.errors.push('Senha deve ter no mínimo 6 dígitos.');
			}
			if (this.errors.length == 0) {
				await this.insertUsuarios();
			}
		},
	}
});