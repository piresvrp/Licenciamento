new Vue({
	el: '#questionario',
	data: {
		Perguntas: [],
		Questionario: {
			ID: null,
			Federal: '',
			Estadual: '',
			Descricao: '',
		},
		renovaPerguntas: true,
	},
	async mounted() {
		await this.getPerguntas();
		CKEDITOR.replace('Descricao', {height: '200px', width: '100%'});
	},
	methods: {
		async getPerguntas() {
			var Result = await vmGlobal.getController('Questionario/Perguntas/lista');
			this.Questionario = Result.Questionario;
			this.Perguntas = Result.Perguntas;
			if (!this.Perguntas.length)
				this.Adiciona();
		},
		async Adiciona() {
			this.renovaPerguntas = false;
			await this.$nextTick(function(){
				var num = this.Perguntas.length + 1;
				this.Perguntas.push({ID: null, Questionario: this.Questionario.ID, Numero: num, Enunciado: '', Dependencia: 0, Federal: 'S'});
				this.renovaPerguntas = true;
			});
		},
		async Remove(num) {
			this.renovaPerguntas = false;
			await this.$nextTick(function(){
				for (i = num; i < this.Perguntas.length; i++) {
					if (this.Perguntas[i].Dependencia > num)
						this.Perguntas[i].Dependencia--;
					if (this.Perguntas[i].Dependencia == this.Perguntas[i].Numero)
						this.Perguntas[i].Dependencia = 0;
					this.Perguntas[i].Numero--;
					this.Perguntas[(i - 1)] = this.Perguntas[i];
				}
				this.Perguntas.pop();
				if (!this.Perguntas.length)
					this.Adiciona();
				this.renovaPerguntas = true;
			});
		},
		async checkForm() {
			if ((this.Questionario.Descricao = CKEDITOR.instances['Descricao'].getData()) == '') {
				vmGlobal.showMessage('Preencha o Texto de Apresentação do Questionário!', 'error', 'Texto inválido!');
				return;
			}
			if (this.Questionario.Federal == '') {
				vmGlobal.showMessage('Preencha a Mensagem de Resposta para Licenciamento de Competência Federal!', 'error', 'Texto inválido!');
				return;
			}
			if (this.Questionario.Estadual == '') {
				vmGlobal.showMessage('Preencha a Mensagem de Resposta para Licenciamento de Competência Estadual ou Municipal!', 'error', 'Texto inválido!');
				return;
			}
			for (i = 0; i < this.Perguntas.length; i++) {
				if (this.Perguntas[i].Enunciado == '') {
					vmGlobal.showMessage('Preencha Todas as Perguntas!', 'error', 'Texto inválido!');
					return;
				}
			}
			var Resp = await vmGlobal.getController('Questionario/Perguntas/salva', {Questionario: this.Questionario, Perguntas: this.Perguntas});
			if (Resp.status) {
				await this.getPerguntas();
				vmGlobal.showMessage(Resp.result);
			} else if (Resp.result) {
				vmGlobal.showMessage(Resp.result, 'error', 'Erro!');
			} else {
				vmGlobal.showMessage('Ocorreu um erro inesperado! Tente novamente.', 'error', 'Erro!');
			}
		},
	},
});