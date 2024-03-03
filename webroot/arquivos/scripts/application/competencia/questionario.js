new Vue({
	el: '#questionario',
	data: {
		Perguntas: [],
		Questionario: null,
		Empreendimento: '',
		renovaPerguntas: true,
	},
	async mounted() {
		await this.getPerguntas();
	},
	methods: {
		async getPerguntas() {
			this.Perguntas = await vmGlobal.getController('Competencia/Questionario/lista');
			if (this.Perguntas.length == 0)
				window.location.href = base_url;
			for (i = 0; i < this.Perguntas.length; i++) {
				if (this.Questionario == null)
					this.Questionario = this.Perguntas[i].Questionario;
				this.Perguntas[i].Visivel = (this.Perguntas[i].Dependencia == 0);
				this.Perguntas[i].Valor = '';
			}
		},
		async Responde(P, val) {
			P.Valor = val;
			this.renovaPerguntas = false;
			await this.$nextTick(function(){
				for (i = 0; i < this.Perguntas.length; i++) {
					if (this.Perguntas[i].Dependencia == P.Numero) {
						this.Perguntas[i].Visivel = (P.Visivel && P.Valor != '' && P.Valor != P.Federal);
						this.Responde(this.Perguntas[i], '');
					}
				}
				this.renovaPerguntas = true;
			});
		},
		async checkForm() {
			if (this.Empreendimento == '') {
				vmGlobal.showMessage('Informe o Empreendimento ou Atividade!', 'error', 'Resposta inválida!');
				return;
			}
			var Itens = [];
			var Compete = 'E';
			for (i = 0; i < this.Perguntas.length; i++) {
				if (this.Perguntas[i].Visivel) {
					if (this.Perguntas[i].Valor == '') {
						vmGlobal.showMessage('Responda todas as perguntas!', 'error', 'Resposta inválida!');
						return;
					}
					Itens.push({Pergunta: this.Perguntas[i].ID, Valor: this.Perguntas[i].Valor});
					if (this.Perguntas[i].Federal == this.Perguntas[i].Valor)
						Compete = 'F';
				}
			}
			var Resp = await vmGlobal.getController('Competencia/Questionario/salva', {Questionario: this.Questionario, Empreendimento: this.Empreendimento, Competencia: Compete, Respostas: Itens});
			if (Resp.status) {
				Loading.show();
				window.location.href = base_url + 'Competencia/Questionario/resultado';
			} else if (Resp.result) {
				vmGlobal.showMessage(Resp.result, 'error', 'Erro!');
			} else {
				vmGlobal.showMessage('Ocorreu um erro inesperado! Tente novamente.', 'error', 'Erro!');
			}
		},
	},
});