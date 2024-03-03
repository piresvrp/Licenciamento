new Vue({
	el: '#dadosUsuario',
	data() {
		return {
			Usuario: {},
			Senha: ''
		}
	},
	async mounted() {
		await this.getDados();
	},
	methods: {
		async getDados() {
			this.Usuario = await vmGlobal.getController('Login/getUsuario');
			this.Senha = '';
		},
		async checkForm() {
			if (this.Senha.length < 6) {
				vmGlobal.showMessage('A senha deve ter no mínimo 6 dígitos!', 'error', 'Senha inválida!');
			} else {
				await this.salvar();
			}
		},
		async salvar() {
			if (this.Senha != '') {
				resp = await vmGlobal.getController('Seguranca/MeusDados/update', {Senha: this.Senha});
				if (resp.status) {
					vmGlobal.showMessage(resp.result);
					this.Senha = '';
				} else if (resp.result) {
					vmGlobal.showMessage(resp.result, 'error', 'Erro!');
				} else {
					vmGlobal.showMessage('Ocorreu um erro inesperado! Tente novamente.', 'error', 'Erro!');
				}
			}
		}
	},
});